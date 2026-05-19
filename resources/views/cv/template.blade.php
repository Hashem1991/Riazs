<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CV</title>

    <style>
        /* PDF এবং সাধারণ ব্রাউজারের জন্য মডার্ন স্টাইলিং */
        @page {
            size: A4;
            margin: 20mm 15mm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif; /* ওয়ার্ড ও পিডিএফ উভয়ের জন্য নিরাপদ ফন্ট */
            padding: 20px;
            color: #334155;
            background-color: #ffffff;
            line-height: 1.5;
        }

        /* হেডার লেআউট (ওয়ার্ডে পাশাপাশি রাখার জন্য টেবিল বাধ্যতামুলক) */
        .main-layout {
            width: 100%;
            border: 0;
        }

        h1 {
            font-size: 26px;
            color: #1e293b;
            margin: 0 0 5px 0;
            font-weight: bold;
        }

        h3 {
            font-size: 16px;
            color: #2563eb;
            margin: 0 0 10px 0;
            text-transform: uppercase;
            font-weight: bold;
        }

        .contact-info {
            font-size: 13px;
            color: #64748b;
        }

        .section {
            margin-top: 25px;
            margin-bottom: 25px;
            clear: both;
        }

        h2 {
            font-size: 18px;
            color: #1e293b;
            margin-top: 0;
            margin-bottom: 12px;
            padding-bottom: 4px;
            border-bottom: 2px solid #ef4444; /* আকর্ষনীয় রেড অ্যাকসেন্ট */
            width: 100%;
        }

        p {
            margin: 0 0 10px 0;
            color: #475569;
            font-size: 14px;
        }

        /* এডুকেশন টেবিল - যা পিডিএফ ও ওয়ার্ড দুই জায়গাতেই বর্ডার ও প্যাডিং ধরে রাখবে */
        .edu-table {
            width: 100%;
            margin-top: 10px;
            font-size: 14px;
            border-collapse: collapse; /* পিডিএফ-এর জন্য বর্ডার জোড়া লাগাবে */
        }

        .edu-table th {
            background-color: #f1f5f9; /* হেডার ব্যাকগ্রাউন্ড কালার */
            color: #1e293b;
            font-weight: bold;
        }

        .item {
            margin-bottom: 15px;
        }

        .item-title {
            font-size: 15px;
            font-weight: bold;
            color: #1e293b;
        }

        .muted {
            color: #64748b;
            font-size: 13px;
        }
    </style>
</head>
<body>

{{-- ================= HEADER & ABOUT ================= --}}
<table class="main-layout" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td valign="top" style="padding-right: 20px; border: 0;">
            <h1>{{ $about->name ?? 'Md. Riazul Hoque' }}</h1>
            <h3>{{ $about->title ?? 'Information Security Specialist' }}</h3>
            
            <p>{{ $about->description ?? 'Professional summary text goes here.' }}</p>
            
            <div class="contact-info">
                @if(!empty($about->email)) <span><b>Email:</b> {{ $about->email }}</span><br> @endif
                @if(!empty($about->phone)) <span><b>Phone:</b> {{ $about->phone }}</span><br> @endif
                @if(!empty($about->address)) <span><b>Address:</b> {{ $about->address }}</span> @endif
            </div>
        </td>
        <td valign="top" align="right" style="width: 120px; border: 0;">
            <img src="{{ $about->image_url ?? 'https://via.placeholder.com/120' }}" width="120" height="120" style="border: 1px solid #cbd5e1; display:block;" alt="Profile Picture">
        </td>
    </tr>
</table>

{{-- ================= BIOGRAPHY ================= --}}
@if(!empty($biography->description))
<div class="section">
    <h2>Biography</h2>
    <p>{{ $biography->description }}</p>
</div>
@endif

{{-- ================= EDUCATION (UNIVERSAL TABLE) ================= --}}
<div class="section">
    <h2>Education</h2>

    @if(!empty($biography->educations) && count($biography->educations) > 0)
        <table class="edu-table" border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; border-color: #cbd5e1;">
            <thead>
                <tr style="background-color: #f1f5f9;">
                    <th align="left" style="padding: 8px; border: 1px solid #cbd5e1;">Degree</th>
                    <th align="left" style="padding: 8px; border: 1px solid #cbd5e1;">Institution</th>
                    <th align="left" style="padding: 8px; border: 1px solid #cbd5e1;">Year</th>
                    <th align="left" style="padding: 8px; border: 1px solid #cbd5e1;">Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach($biography->educations as $edu)
                    <tr>
                        <td style="padding: 8px; border: 1px solid #cbd5e1;"><b>{{ $edu->degree }}</b></td>
                        <td style="padding: 8px; border: 1px solid #cbd5e1;">{{ $edu->institution }}</td>
                        <td style="padding: 8px; border: 1px solid #cbd5e1;">{{ $edu->year }}</td>
                        <td class="muted" style="padding: 8px; border: 1px solid #cbd5e1;">{{ $edu->result }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="muted">No education data available</p>
    @endif
</div>

{{-- ================= EXPERTISE ================= --}}
<div class="section">
    <h2>Expertise</h2>

    @forelse($biography->expertises ?? [] as $exp)
        <div class="item">
            <span class="item-title">{{ $exp->title }}</span> <span class="muted">({{ $exp->experience }})</span><br>
            <span class="muted">{{ $exp->description }}</span>
        </div>
    @empty
        <p class="muted">No expertise data available</p>
    @endforelse
</div>

{{-- ================= RESEARCH ================= --}}
<div class="section">
    <h2>Research</h2>

    @forelse($biography->researches ?? [] as $res)
        <div class="item">
            <span class="item-title">{{ $res->title }}</span> <span class="muted">({{ $res->year }})</span><br>
            <span class="muted"><i>{{ $res->journal }}</i></span><br>
            <span class="muted">{{ $res->description }}</span>
        </div>
    @empty
        <p class="muted">No research data available</p>
    @endforelse
</div>

</body>
</html>