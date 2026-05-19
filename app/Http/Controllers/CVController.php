<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\AboutMe;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;

class CVController extends Controller
{
    // ==========================================
    // PDF DOWNLOAD (ব্লেড ভিউ থেকেই রেন্ডার হবে)
    // ==========================================
    public function downloadPDF()
    {
        $biography = Biography::with([
            'educations',
            'researches',
            'expertises'
        ])->first();

        $about = AboutMe::first();

        $data = [
            'about' => $about,
            'biography' => $biography,
        ];

        $pdf = Pdf::loadView('cv.template', $data);

        return $pdf->download('CV.pdf');
    }

    // ==========================================
    // WORD DOWNLOAD (শুধুমাত্র Education-এ টেবিল)
    // ==========================================
    public function downloadWord()
    {
        $biography = Biography::with([
            'educations',
            'researches',
            'expertises'
        ])->first();

        $about = AboutMe::first();

        $phpWord = new PhpWord();
        
        // হেডিং এবং টাইটেল স্টাইল ডিফাইন করা
        $phpWord->addTitleStyle(1, ['name' => 'Arial', 'size' => 22, 'bold' => true, 'color' => '1E293B']);
        $phpWord->addTitleStyle(2, ['name' => 'Arial', 'size' => 14, 'bold' => true, 'color' => '1E293B', 'afterSpacing' => 120]);

        $section = $phpWord->addSection();

        // ===== হেডার অংশ (টেবিল সম্পূর্ণ রিমুভ করা হয়েছে) =====
        // নাম এবং টাইটেল
        $section->addTitle($about->name ?? 'John Doe', 1);
        $section->addText($about->title ?? 'Professional Title', ['size' => 12, 'bold' => true, 'color' => '2563EB']);
        $section->addText($about->description ?? '', ['size' => 10, 'italic' => true]);
        $section->addTextBreak(1);

        // কন্ট্যাক্ট ইনফো এবং ইমেজ পাশাপাশি রাখার জন্য ফ্রেম বা সাধারণ প্যারাগ্রাফ স্টাইল ব্যবহার
        $section->addText("Email: " . ($about->email ?? ''), ['size' => 10]);
        $section->addText("Phone: " . ($about->phone ?? ''), ['size' => 10]);
        $section->addText("Address: " . ($about->address ?? ''), ['size' => 10]);

        // প্রোফাইল পিকচার (কোনো টেবিল ছাড়া সরাসরি রাইট অ্যালাইনমেন্টে যুক্ত করা হয়েছে)
        if (!empty($about->image_url)) {
            $imagePath = public_path($about->image_url);
            if (file_exists($imagePath) && is_file($imagePath)) {
                // টেক্সটের সাথে ছবির পজিশনিং ঠিক রাখতে অ্যাবসোলিউট পজিশন ব্যবহার
                $section->addImage($imagePath, [
                    'width'            => 80,
                    'height'           => 80,
                    'positioning'      => 'absolute',
                    'posHorizontal'    => 'right',
                    'posHorizontalRel' => 'margin',
                    'posVertical'      => 'top',
                    'posVerticalRel'   => 'margin',
                ]);
            }
        }

        $section->addTextBreak(2);

        // ===== BIOGRAPHY =====
        if (!empty($biography->description)) {
            $section->addTitle('Biography', 2);
            $section->addText($biography->description, ['size' => 11]);
            $section->addTextBreak(1);
        }

        // ===== EDUCATION (একমাত্র এই অংশটিই টেবিল আকারে আসবে) =====
        $section->addTitle('Education', 2);

        if (!empty($biography->educations) && count($biography->educations) > 0) {
            
            // টেবিল ও হেডার স্টাইল ডিক্লেয়ারেশন
            $tableStyle = [
                'borderSize'  => 6,
                'borderColor' => 'CBD5E1',
                'cellMargin'  => 120
            ];
            $thStyle = ['bgColor' => 'F1F5F9', 'valign' => 'center'];
            $thTextStyle = ['bold' => true, 'size' => 10, 'color' => '1E293B'];

            $table = $section->addTable($tableStyle);

            // টেবিল হেডার রো (Header Row)
            $table->addRow();
            $table->addCell(2500, $thStyle)->addText('Degree', $thTextStyle);
            $table->addCell(4000, $thStyle)->addText('Institution', $thTextStyle);
            $table->addCell(1500, $thStyle)->addText('Year', $thTextStyle);
            $table->addCell(1500, $thStyle)->addText('Result', $thTextStyle);

            // ডেটা লুপ (Data Rows)
            foreach ($biography->educations as $edu) {
                $table->addRow();
                $table->addCell(2500)->addText($edu->degree, ['bold' => true, 'size' => 10]);
                $table->addCell(4000)->addText($edu->institution, ['size' => 10]);
                $table->addCell(1500)->addText($edu->year, ['size' => 10]);
                $table->addCell(1500)->addText($edu->result, ['size' => 10, 'color' => '64748B']);
            }
        } else {
            $section->addText('No education data available.', ['italic' => true]);
        }

        $section->addTextBreak(1);

        // ===== EXPERTISE =====
        $section->addTitle('Expertise', 2);
        foreach ($biography->expertises ?? [] as $exp) {
            $textRun = $section->addTextRun(['afterSpacing' => 100]);
            $textRun->addText($exp->title . ' ', ['bold' => true, 'size' => 11]);
            $textRun->addText('(' . $exp->experience . ')', ['color' => '64748B', 'size' => 10]);
            
            if (!empty($exp->description)) {
                $section->addText($exp->description, ['size' => 10, 'color' => '475569'], ['afterSpacing' => 150]);
            }
        }

        $section->addTextBreak(1);

        // ===== RESEARCH =====
        $section->addTitle('Research', 2);
        foreach ($biography->researches ?? [] as $res) {
            $textRun = $section->addTextRun(['afterSpacing' => 60]);
            $textRun->addText($res->title . ' ', ['bold' => true, 'size' => 11]);
            $textRun->addText('(' . $res->year . ')', ['color' => '64748B', 'size' => 10]);
            
            $section->addText($res->journal, ['italic' => true, 'size' => 10, 'color' => '2563EB'], ['afterSpacing' => 60]);
            
            if (!empty($res->description)) {
                $section->addText($res->description, ['size' => 10, 'color' => '475569'], ['afterSpacing' => 150]);
            }
        }

        // ===== DOWNLOAD FILE =====
        $fileName = 'CV.docx';
        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $path = storage_path($fileName);
        $writer->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }
}