@extends('backend.layout.master')

@section('title', 'About Me | Admin Panel')

@section('content')
<div class="space-y-8">

@php
    $about = \App\Models\AboutMe::first();
@endphp

{{-- HEADER --}}
<div class="flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">About Me</h2>
        <p class="text-slate-500 text-sm">Complete personal profile information</p>
    </div>

    @if(!$about)
        <a href="{{ route('admin.about.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg">
            Setup Profile
        </a>
    @else
        <a href="{{ route('admin.about.edit', $about->id) }}"
           class="bg-amber-500 hover:bg-amber-600 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg">
            Edit Profile
        </a>
    @endif
</div>

{{-- CONTENT --}}
@if($about)

<div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">

    <div class="md:flex">

        {{-- IMAGE --}}
        <div class="md:w-1/3 bg-slate-50 p-8 flex flex-col items-center justify-center border-r border-slate-100">

            <img src="{{ $about->image ? asset('storage/'.$about->image) : 'https://ui-avatars.com/api/?name='.$about->name }}"
                 class="w-48 h-48 rounded-3xl object-cover shadow-xl border-4 border-white mb-4">

            <h3 class="font-bold text-slate-900 text-xl">
                {{ $about->name ?? 'N/A' }}
            </h3>

            <p class="text-blue-600 font-medium text-sm">
                {{ $about->title ?? 'No Title' }}
            </p>

        </div>

        {{-- DETAILS --}}
        <div class="md:w-2/3 p-8 space-y-6">

            {{-- BASIC INFO --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div><p class="text-xs text-slate-400 font-bold">Email</p><p>{{ $about->email ?? 'N/A' }}</p></div>
                <div><p class="text-xs text-slate-400 font-bold">Phone</p><p>{{ $about->phone ?? 'N/A' }}</p></div>
                <div><p class="text-xs text-slate-400 font-bold">Address</p><p>{{ $about->address ?? 'N/A' }}</p></div>
                <div><p class="text-xs text-slate-400 font-bold">Date of Birth</p><p>{{ $about->date_of_birth ?? 'N/A' }}</p></div>

                <div><p class="text-xs text-slate-400 font-bold">Gender</p><p>{{ $about->gender ?? 'N/A' }}</p></div>
                <div><p class="text-xs text-slate-400 font-bold">Marital Status</p><p>{{ $about->marital_status ?? 'N/A' }}</p></div>
                <div><p class="text-xs text-slate-400 font-bold">Children Count</p><p>{{ $about->children_count ?? '0' }}</p></div>
                <div><p class="text-xs text-slate-400 font-bold">Blood Group</p><p>{{ $about->blood_group ?? 'N/A' }}</p></div>

                <div><p class="text-xs text-slate-400 font-bold">Blood Donate</p><p>{{ $about->blood_donate ?? 'No' }}</p></div>

            </div>

            {{-- SOCIAL LINKS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t">

                <div><p class="text-xs text-slate-400 font-bold">Facebook</p><p>{{ $about->facebook ?? 'N/A' }}</p></div>
                <div><p class="text-xs text-slate-400 font-bold">YouTube</p><p>{{ $about->youtube ?? 'N/A' }}</p></div>
                <div><p class="text-xs text-slate-400 font-bold">GitHub</p><p>{{ $about->github ?? 'N/A' }}</p></div>
                <div><p class="text-xs text-slate-400 font-bold">LinkedIn</p><p>{{ $about->linkedin ?? 'N/A' }}</p></div>

            </div>

            {{-- DESCRIPTION --}}
            <div class="pt-4 border-t">
                <p class="text-xs text-slate-400 font-bold mb-2">Description</p>
                <p class="text-slate-600 text-sm leading-relaxed">
                    {{ $about->description ?? 'No description available' }}
                </p>
            </div>

        </div>

    </div>

</div>

@else

<div class="bg-white p-10 text-center rounded-3xl border border-slate-100">
    <p class="text-slate-500">No profile found. Please setup your About Me profile.</p>
</div>

@endif

</div>
@endsection