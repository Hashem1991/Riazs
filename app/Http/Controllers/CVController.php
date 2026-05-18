<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\AboutMe;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class CVController extends Controller
{
    // =========================
    // PDF DOWNLOAD
    // =========================
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

    // =========================
    // WORD DOWNLOAD
    // =========================
    public function downloadWord()
    {
        $biography = Biography::with([
            'educations',
            'researches',
            'expertises'
        ])->first();

        $about = AboutMe::first();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // ===== ABOUT =====
        $section->addTitle($about->name ?? '', 1);
        $section->addText($about->title ?? '');
        $section->addText($about->description ?? '');

        $section->addTextBreak(1);

        // ===== CONTACT =====
        $section->addText("Email: " . $about->email);
        $section->addText("Phone: " . $about->phone);
        $section->addText("Address: " . $about->address);

        $section->addTextBreak(1);

        // ===== BIOGRAPHY =====
        $section->addTitle('Biography');
        $section->addText($biography->description ?? '');

        // ===== EDUCATION =====
        $section->addTitle('Education');

        foreach ($biography->educations ?? [] as $edu) {
            $section->addText(
                $edu->degree . ' - ' . $edu->institution . ' (' . $edu->year . ')'
            );
        }

        // ===== EXPERTISE =====
        $section->addTitle('Expertise');

        foreach ($biography->expertises ?? [] as $exp) {
            $section->addText(
                $exp->title . ' (' . $exp->experience . ')'
            );
        }

        // ===== RESEARCH =====
        $section->addTitle('Research');

        foreach ($biography->researches ?? [] as $res) {
            $section->addText(
                $res->title . ' - ' . $res->journal . ' (' . $res->year . ')'
            );
        }

        // ===== DOWNLOAD FILE =====
        $fileName = 'CV.docx';
        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $path = storage_path($fileName);
        $writer->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }
}