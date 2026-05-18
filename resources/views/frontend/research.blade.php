@extends('frontend.layout.master')

@section('title', 'Research & Publications | Md. Riazul Hoque')

@section('content')

{{-- Alpine.js State Management --}}
<div x-data="{ viewMode: 'details' }">

    {{-- Hero Section --}}
    <section class="py-20 bg-slate-50 border-b border-slate-100">
        <div class="container mx-auto px-6 text-center">
            <span class="inline-block bg-emerald-100 text-emerald-700 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest mb-4">
                Academic Contributions
            </span>

            <h1 class="text-4xl md:text-6xl font-black text-slate-900 leading-tight">
                Research & <span class="text-emerald-600">Publications</span>
            </h1>

            <p class="mt-6 text-slate-500 max-w-2xl mx-auto text-lg mb-10">
                Exploring the frontiers of Post-Quantum Cryptography & Security.
            </p>

            {{-- View Switcher Buttons --}}
            <div class="inline-flex p-1 bg-slate-200 rounded-xl shadow-inner">
                <button 
                    @click="viewMode = 'details'" 
                    :class="viewMode === 'details' ? 'bg-white text-emerald-600 shadow-sm' : 'text-slate-600 hover:text-slate-900'"
                    class="px-6 py-2 rounded-lg text-sm font-bold transition-all duration-300 flex items-center gap-2">
                    📄 Details View
                </button>
                <button 
                    @click="viewMode = 'table'" 
                    :class="viewMode === 'table' ? 'bg-white text-emerald-600 shadow-sm' : 'text-slate-600 hover:text-slate-900'"
                    class="px-6 py-2 rounded-lg text-sm font-bold transition-all duration-300 flex items-center gap-2">
                    📊 Table View
                </button>
            </div>
        </div>
    </section>


    {{-- Research Content --}}
    <section class="py-20 bg-white min-h-[400px]">
        <div class="container mx-auto px-6">
            
            {{-- 1. Details / Card View --}}
            <div x-show="viewMode === 'details'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" class="max-w-5xl mx-auto space-y-10">
                @forelse($researches as $research)
                <div class="group bg-white p-8 md:p-10 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-500">
                    <div class="flex flex-col md:flex-row justify-between gap-6">
                        <div class="flex-1 space-y-4">
                            <div class="flex items-center space-x-4">
                                <span class="text-emerald-600 font-black text-sm uppercase">{{ $research->year }}</span>
                                <span class="w-8 h-px bg-slate-200"></span>
                                <span class="text-slate-400 text-sm">{{ $research->type ?? 'Research Paper' }}</span>
                            </div>
                            <h3 class="text-2xl font-black text-slate-900 group-hover:text-emerald-600 transition">{{ $research->title }}</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">{{ $research->description }}</p>
                            @if(!empty($research->tags))
                            <div class="flex flex-wrap gap-2">
                                @foreach(explode(',', $research->tags) as $tag)
                                    <span class="px-3 py-1 bg-slate-50 text-slate-500 text-[10px] font-bold rounded border uppercase italic">#{{ trim($tag) }}</span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        @if($research->link)
                        <div class="flex-shrink-0">
                            <a href="{{ $research->link }}" target="_blank" class="w-12 h-12 flex items-center justify-center bg-emerald-600 text-white rounded-xl hover:bg-slate-900 transition shadow-lg shadow-emerald-100">
                                🔗
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                    <p class="text-center text-slate-400">No data available.</p>
                @endforelse
            </div>

            {{-- 2. Table View --}}
            <div x-show="viewMode === 'table'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="max-w-6xl mx-auto overflow-hidden rounded-2xl border border-slate-200 shadow-sm">
                <table class="w-full text-left border-collapse bg-white">
                    <thead>
                        <tr class="bg-slate-900 text-white">
                            <th class="px-6 py-4 text-xs font-black uppercase tracking-wider">Year</th>
                            <th class="px-6 py-4 text-xs font-black uppercase tracking-wider">Research Title</th>
                            <th class="px-6 py-4 text-xs font-black uppercase tracking-wider">Type</th>
                            <th class="px-6 py-4 text-xs font-black uppercase tracking-wider text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($researches as $research)
                        <tr class="hover:bg-emerald-50/50 transition-colors">
                            <td class="px-6 py-4 text-sm font-bold text-emerald-600">{{ $research->year }}</td>
                            <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ $research->title }}</td>
                            <td class="px-6 py-4 text-xs text-slate-500 italic">{{ $research->type ?? 'Paper' }}</td>
                            <td class="px-6 py-4 text-center">
                                @if($research->link)
                                    <a href="{{ $research->link }}" target="_blank" class="text-emerald-600 hover:text-slate-900 font-bold text-sm underline underline-offset-4">View Paper</a>
                                @else
                                    <span class="text-slate-300 text-xs italic">N/A</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

</div>

{{-- Research Topics remains the same --}}
...

{{-- Script for Alpine.js (If not already in master layout) --}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@endsection