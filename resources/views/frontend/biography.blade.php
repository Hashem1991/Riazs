@extends('frontend.layout.master')

@section('title', 'Biography | Md. Riazul Hoque')

@section('content')

@php
    $general = $biographies->first(); 
@endphp

{{-- HERO SECTION --}}
<section class="relative py-28 bg-[#030712] overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-600/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-emerald-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-bold uppercase tracking-widest mb-8 animate-fade-in">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
            </span>
            <span>Academic & Professional Records</span>
        </div>

        <h1 class="text-6xl md:text-8xl font-black text-white mb-8 tracking-tighter">
            My <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Journey.</span>
        </h1>
        <p class="text-slate-400 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto">
            আমি <strong>{{ $general->name ?? 'Md. Riazul Hoque' }}</strong>, ইনফরমেশন সিকিউরিটি ও সফটওয়্যার ডেভেলপমেন্টে আমার অর্জিত অভিজ্ঞতা এবং শিক্ষাগত যোগ্যতা নিচে তুলে ধরা হলো।
        </p>
    </div>
</section>

{{-- BIOGRAPHY CONTENT --}}
<section id="biography-section" class="py-24 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-6">
        
        {{-- VIEW SWITCHER --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-6">
            <div>
                <h2 class="text-3xl font-black text-slate-900 tracking-tight">Timeline & Records</h2>
                <p class="text-slate-500 text-sm mt-1">সবগুলো এন্ট্রি এখানে ফিল্টার করে দেখা যাবে।</p>
            </div>
            
            <div class="flex items-center bg-white p-1.5 rounded-2xl border border-slate-200 shadow-sm w-fit">
                <button onclick="switchView('card')" id="card-btn" class="flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-blue-600 text-white shadow-lg shadow-blue-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span>Cards</span>
                </button>
                <button onclick="switchView('table')" id="table-btn" class="flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-slate-400 hover:text-slate-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18"></path></svg>
                    <span>Table View</span>
                </button>
            </div>
        </div>

        {{-- CARD VIEW (অরিজিনাল ডিজাইন) --}}
        <div id="card-view" class="space-y-12">
            <div class="flex flex-col md:flex-row gap-16">
                <div class="md:w-1/3">
                    <div class="sticky top-24">
                        <h2 class="text-2xl font-black text-slate-900 mb-4 tracking-tight">Milestones</h2>
                        <p class="text-slate-500 mb-6 text-sm">ক্রমানুসারে সাজানো আমার পেশাগত এবং শিক্ষাগত অর্জনসমূহ।</p>
                        <div class="h-1 w-12 bg-blue-600 rounded-full"></div>
                    </div>
                </div>

                <div class="md:w-2/3 space-y-12">
                    @forelse($biographies as $bio)
                    <div class="relative pl-10 border-l-2 border-slate-200 group">
                        <div class="absolute left-[-9px] top-0 w-4 h-4 rounded-full bg-white border-4 border-blue-600 group-hover:scale-150 transition-transform"></div>
                        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300">
                            <div class="flex items-start gap-6">
                                <div class="flex-shrink-0 w-[50px] h-[50px] rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 border border-blue-100">
                                    @switch(strtolower($bio->type))
                                        @case('education') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg> @break
                                        @case('experience') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> @break
                                        @default <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    @endswitch
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-black uppercase rounded-lg">{{ $bio->years }}</span>
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-2 py-1 bg-slate-100 rounded-md">{{ $bio->type }}</span>
                                    </div>
                                    <h3 class="text-2xl font-bold text-slate-900 mb-2">{{ $bio->title }}</h3>
                                    <p class="text-blue-600 font-medium mb-4 text-sm">{{ $bio->name }}</p>
                                    <p class="text-slate-600 leading-relaxed text-sm">{{ $bio->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>

        {{-- TABLE VIEW --}}
        <div id="table-view" class="hidden animate-fade-in">
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Year</th>
                                <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Title & Institution</th>
                                <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Type</th>
                                <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Contact</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($biographies as $bio)
                            <tr class="hover:bg-blue-50/30 transition-colors">
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded-lg">{{ $bio->years }}</span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="font-bold text-slate-900">{{ $bio->title }}</div>
                                    <div class="text-xs text-slate-500 mt-1">{{ $bio->name }}</div>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="text-[10px] font-black uppercase text-slate-400 border border-slate-200 px-2 py-1 rounded-md">{{ $bio->type }}</span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="text-xs text-slate-400">{{ $bio->email }}</div>
                                    <div class="text-xs text-slate-400 font-semibold">{{ $bio->phone }}</div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- CONTACT CTA --}}
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 text-center">
        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-8 relative z-10">নিরাপদ ডিজিটাল সমাধান <br> তৈরি করতে চান?</h2>
            <a href="mailto:{{ $general->email ?? '' }}" class="relative z-10 bg-white text-blue-600 px-10 py-5 rounded-2xl font-bold text-lg hover:scale-105 transition-transform inline-block">ইমেইল করুন</a>
        </div>
    </div>
</section>

<script>
    function switchView(view) {
        const cardView = document.getElementById('card-view');
        const tableView = document.getElementById('table-view');
        const cardBtn = document.getElementById('card-btn');
        const tableBtn = document.getElementById('table-btn');

        if (view === 'card') {
            cardView.classList.remove('hidden');
            tableView.classList.add('hidden');
            // Update Buttons
            cardBtn.className = "flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-blue-600 text-white shadow-lg shadow-blue-100";
            tableBtn.className = "flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-slate-400 hover:text-slate-600";
        } else {
            cardView.classList.add('hidden');
            tableView.classList.remove('hidden');
            // Update Buttons
            tableBtn.className = "flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-blue-600 text-white shadow-lg shadow-blue-100";
            cardBtn.className = "flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-slate-400 hover:text-slate-600";
        }
    }
</script>

<style>
    @keyframes fade-in { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fade-in 0.5s ease-out forwards; }
</style>

@endsection