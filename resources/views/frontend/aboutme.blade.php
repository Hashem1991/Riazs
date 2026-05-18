@extends('frontend.layout.master')

@section('title', 'About Me | Md. Riazul Hoque')

@section('content')

@if(!$about)
    <div class="py-20 text-center flex flex-col items-center justify-center min-h-[400px]">
        <div class="text-slate-300 mb-4 text-6xl">📭</div>
        <div class="text-red-500 font-bold text-xl uppercase tracking-widest">No About Data Found</div>
    </div>
@else

{{-- Hero Section --}}
<section class="py-24 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-[600px] h-[600px] bg-blue-50 rounded-full blur-3xl opacity-50"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row gap-16 items-start">

            {{-- LEFT: Profile Card --}}
            <div class="w-full lg:w-4/12 lg:sticky lg:top-28">
                <div class="relative group">
                    <div class="overflow-hidden rounded-[3rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.15)] border-[12px] border-white">
                        <img src="{{ $about->image ? asset('storage/'.$about->image) : 'https://via.placeholder.com/600x800' }}"
                             alt="{{ $about->name }}"
                             class="w-full object-cover aspect-[3/4] transition duration-700 group-hover:scale-110">
                    </div>

                    @if($about->blood_group)
                    <div class="absolute top-8 -right-4 bg-red-600 text-white px-6 py-3 rounded-2xl shadow-xl transform rotate-12 flex items-center gap-2">
                        <span class="text-xl">🩸</span>
                        <span class="font-black text-lg">{{ $about->blood_group }}</span>
                    </div>
                    @endif
                </div>

                {{-- Quick Social Connect --}}
                <div class="mt-10 flex justify-center gap-4">
                    @php
                        $socials = [
                            ['link' => $about->facebook, 'icon' => 'FB', 'color' => 'hover:text-blue-600'],
                            ['link' => $about->linkedin, 'icon' => 'IN', 'color' => 'hover:text-blue-700'],
                            ['link' => $about->github, 'icon' => 'GH', 'color' => 'hover:text-slate-900'],
                            ['link' => $about->twitter, 'icon' => 'TW', 'color' => 'hover:text-sky-500'],
                        ];
                    @endphp

                    @foreach($socials as $social)
                        @if(!empty($social['link']))
                            <a href="{{ $social['link'] }}" target="_blank" class="w-12 h-12 flex items-center justify-center bg-slate-50 rounded-xl text-slate-400 {{ $social['color'] }} transition-all duration-300 hover:bg-white hover:shadow-lg border border-slate-100 font-black text-xs">
                                {{ $social['icon'] }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- RIGHT: Bio & Intro --}}
            <div class="w-full lg:w-8/12 space-y-12">
                <div class="space-y-4">
                    <span class="inline-flex items-center gap-2 text-blue-600 font-black uppercase tracking-[0.3em] text-xs">
                        <span class="w-8 h-[2px] bg-blue-600"></span>
                        Introduction
                    </span>
                    <h1 class="text-5xl md:text-7xl font-black text-slate-900 tracking-tight">
                        {{ $about->name }}
                    </h1>
                    <h3 class="text-2xl text-blue-600 font-bold uppercase tracking-widest">{{ $about->title }}</h3>
                    <p class="text-slate-500 text-xl leading-relaxed pt-4">
                        {{ $about->description }}
                    </p>
                </div>

                {{-- Key Stats (Counter) --}}
                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 pt-6">
                    <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                        <h4 class="text-3xl font-black text-slate-900">04+</h4>
                        <p class="text-slate-500 text-sm font-bold uppercase">Years Experience</p>
                    </div>
                    <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                        <h4 class="text-3xl font-black text-slate-900">50+</h4>
                        <p class="text-slate-500 text-sm font-bold uppercase">Projects Done</p>
                    </div>
                    <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                        <h4 class="text-3xl font-black text-slate-900">M.Sc</h4>
                        <p class="text-slate-500 text-sm font-bold uppercase">In InfoSec</p>
                    </div>
                </div>

                {{-- Personal & Contact Info Table Style --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="space-y-6">
                        <h4 class="text-sm font-black uppercase tracking-widest text-slate-900 border-b pb-2">Personal Details</h4>
                        <div class="space-y-4">
                            <div class="flex justify-between border-b border-slate-50 pb-2">
                                <span class="text-slate-400 italic">Birthday</span>
                                <span class="text-slate-800 font-bold">{{ $about->date_of_birth ? \Carbon\Carbon::parse($about->date_of_birth)->format('d M, Y') : '-' }}</span>
                            </div>
                            <div class="flex justify-between border-b border-slate-50 pb-2">
                                <span class="text-slate-400 italic">Location</span>
                                <span class="text-slate-800 font-bold">Dhaka, Bangladesh</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <h4 class="text-sm font-black uppercase tracking-widest text-slate-900 border-b pb-2">Contact Info</h4>
                        <div class="space-y-4">
                            <div class="flex justify-between border-b border-slate-50 pb-2">
                                <span class="text-slate-400 italic">Email</span>
                                <span class="text-slate-800 font-bold">{{ $about->email }}</span>
                            </div>
                            <div class="flex justify-between border-b border-slate-50 pb-2">
                                <span class="text-slate-400 italic">Phone</span>
                                <span class="text-slate-800 font-bold">{{ $about->phone }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Skill / Tech Stack Section --}}
<section class="py-20 bg-slate-50">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-black text-slate-900 mb-12">Technical <span class="text-blue-600">Arsenal</span></h2>
        <div class="flex flex-wrap justify-center gap-6">
            @php
                $skills = ['PHP Laravel', 'Flutter', 'Tailwind CSS', 'MySQL', 'Cyber Security', 'Proxmox', 'Linux'];
            @endphp
            @foreach($skills as $skill)
                <div class="bg-white px-8 py-4 rounded-2xl shadow-sm border border-slate-100 font-bold text-slate-700 hover:shadow-md hover:-translate-y-1 transition-all">
                    {{ $skill }}
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Timeline / Journey Section --}}
<section class="py-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-slate-900 tracking-tight">Academic & Professional Journey</h2>
            <p class="text-slate-500 mt-4">The path that shaped my expertise in Software Engineering and Security.</p>
        </div>

        <div class="max-w-4xl mx-auto space-y-8">
            {{-- Milestone 1 --}}
            <div class="flex gap-6 group">
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-black z-10 group-hover:scale-125 transition">1</div>
                    <div class="w-1 h-full bg-slate-100"></div>
                </div>
                <div class="pb-12 pt-1">
                    <span class="text-blue-600 font-bold text-sm uppercase">2024 - Present</span>
                    <h3 class="text-xl font-black text-slate-900 mt-1">M.Sc in Information Security</h3>
                    <p class="text-slate-500 italic mb-3">United International University</p>
                    <p class="text-slate-600 leading-relaxed">Focusing on Post-Quantum Digital Signature schemes and Network Security.</p>
                </div>
            </div>

            {{-- Milestone 2 --}}
            <div class="flex gap-6 group">
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 bg-emerald-500 rounded-full flex items-center justify-center text-white font-black z-10 group-hover:scale-125 transition">2</div>
                    <div class="w-1 h-full bg-slate-100"></div>
                </div>
                <div class="pb-12 pt-1">
                    <span class="text-emerald-500 font-bold text-sm uppercase">2022 - 2024</span>
                    <h3 class="text-xl font-black text-slate-900 mt-1">Senior Software Developer</h3>
                    <p class="text-slate-500 italic mb-3">BUETian IT & Munshirhat Bazar</p>
                    <p class="text-slate-600 leading-relaxed">Led the development of large scale e-commerce and community management systems.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Blood Donation Status Card --}}
<section class="py-20">
    <div class="container mx-auto px-6">
        <div class="bg-slate-950 rounded-[3rem] p-8 md:p-16 flex flex-col md:flex-row items-center justify-between gap-8 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/10 rounded-full blur-3xl"></div>
            <div class="space-y-2 text-center md:text-left z-10">
                <p class="text-blue-400 font-bold tracking-widest uppercase text-xs">Commitment to Society</p>
                <h3 class="text-3xl md:text-5xl font-black italic">Blood Donation Status</h3>
            </div>
            <div class="z-10">
                @if($about->donate_blood == 1)
                <div class="flex items-center gap-4 bg-white/5 px-8 py-5 rounded-[2rem] border border-white/10 backdrop-blur-md">
                    <span class="flex h-4 w-4 rounded-full bg-green-500 animate-pulse"></span>
                    <span class="font-black tracking-[0.2em] text-sm">AVAILABLE FOR DONATION</span>
                </div>
                @else
                <div class="flex items-center gap-4 bg-white/5 px-8 py-5 rounded-[2rem] border border-white/10 opacity-50">
                    <span class="flex h-4 w-4 rounded-full bg-slate-500"></span>
                    <span class="font-black tracking-[0.2em] text-sm">NOT CURRENTLY DONATING</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Footer CTA --}}
<section class="py-24 bg-white text-center">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl md:text-6xl font-black text-slate-900 mb-8">Let's build the <br><span class="text-blue-600">Future Securely</span></h2>
        <div class="flex flex-wrap justify-center gap-6">
            <a href="mailto:{{ $about->email }}" class="bg-blue-600 text-white px-12 py-5 rounded-full font-black shadow-2xl shadow-blue-200 hover:-translate-y-2 transition-all duration-300">
                Say Hello!
            </a>
            <a href="/projects" class="border-2 border-slate-900 text-slate-900 px-12 py-5 rounded-full font-black hover:bg-slate-900 hover:text-white transition-all duration-300">
                View My Work
            </a>
        </div>
    </div>
</section>

@endif

@endsection