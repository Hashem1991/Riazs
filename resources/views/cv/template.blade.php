<!DOCTYPE html>
<html>
<head>
    <title>CV</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 30px;
            color: #1f2937;
            line-height: 1.6;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        h2 {
            margin-top: 30px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        h3 {
            margin-top: 0;
            color: #2563eb;
        }

        .section {
            margin-bottom: 25px;
        }

        .item {
            margin-bottom: 15px;
        }

        .muted {
            color: #6b7280;
        }
    </style>
</head>
<body>

{{-- ================= ABOUT ================= --}}
<div class="section">

    <h1>{{ $about->name ?? '' }}</h1>
    <h3>{{ $about->title ?? '' }}</h3>

    <p>{{ $about->description ?? '' }}</p>

    <p><b>Email:</b> {{ $about->email ?? '' }}</p>
    <p><b>Phone:</b> {{ $about->phone ?? '' }}</p>
    <p><b>Address:</b> {{ $about->address ?? '' }}</p>

</div>

{{-- ================= BIOGRAPHY ================= --}}
<div class="section">
    <h2>Biography</h2>
    <p>{{ $biography->description ?? '' }}</p>
</div>

{{-- ================= EDUCATION ================= --}}
<div class="section">
    <h2>Education</h2>

    @forelse($biography->educations ?? [] as $edu)
        <div class="item">
            <b>{{ $edu->degree }}</b> - {{ $edu->institution }} ({{ $edu->year }})<br>
            <span class="muted">{{ $edu->result }}</span>
        </div>
    @empty
        <p class="muted">No education data available</p>
    @endforelse
</div>

{{-- ================= EXPERTISE ================= --}}
<div class="section">
    <h2>Expertise</h2>

    @forelse($biography->expertises ?? [] as $exp)
        <div class="item">
            <b>{{ $exp->title }}</b> ({{ $exp->experience }})<br>
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
            <b>{{ $res->title }}</b> ({{ $res->year }})<br>
            <span class="muted">{{ $res->journal }}</span><br>
            <span class="muted">{{ $res->description }}</span>
        </div>
    @empty
        <p class="muted">No research data available</p>
    @endforelse
</div>

</body>
</html>