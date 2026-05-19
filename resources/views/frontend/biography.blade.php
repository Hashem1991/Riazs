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
                <button onclick="switchView('card')" id="card-btn" class="flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-blue-600 text-white shadow-lg shadow-blue-100 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span>Cards</span>
                </button>
                <button onclick="switchView('table')" id="table-btn" class="flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-slate-400 hover:text-slate-600 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18"></path></svg>
                    <span>Table View</span>
                </button>
            </div>
        </div>

        {{-- CARD VIEW --}}
        <div id="card-view" class="space-y-12">
            <div class="flex flex-col lg:flex-row gap-12">
                <div class="lg:w-1/4">
                    <div class="sticky top-24 space-y-6">
                        <h2 class="text-2xl font-black text-slate-900 tracking-tight">Milestones</h2>
                        <p class="text-slate-500 text-sm leading-relaxed">ক্রমানুসারে সাজানো আমার পেশাগত প্রোফাইল এবং শিক্ষাগত অর্জনসমূহ।</p>
                        <div class="h-1 w-12 bg-blue-600 rounded-full"></div>
                    </div>
                </div>

                <div class="lg:w-3/4 space-y-12">
                    @forelse($biographies as $index => $bio)
                    
                    {{-- রিলেশনশিপ ডেটা চেকিং ও মার্জিং (education অথবা educations দুইটাই হ্যান্ডেল করবে) --}}
                    @php
                        $eduData = null;
                        if (isset($bio->educations) && $bio->educations->count() > 0) {
                            $eduData = $bio->educations;
                        } elseif (isset($bio->education) && method_exists($bio->education, 'count') && $bio->education->count() > 0) {
                            $eduData = $bio->education;
                        } elseif (isset($bio->education) && is_object($bio->education)) {
                            $eduData = collect([$bio->education]);
                        }
                    @endphp

                    <div class="relative pl-8 sm:pl-10 border-l-2 border-slate-200 group">
                        <div class="absolute left-[-9px] top-0 w-4 h-4 rounded-full bg-white border-4 border-blue-600 group-hover:scale-120 transition-transform duration-200"></div>
                        
                        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex flex-col sm:flex-row items-start gap-6">
                                
                                {{-- Icon Holder based on Type --}}
                                <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 border border-blue-100 shadow-inner">
                                    @switch(strtolower($bio->type))
                                        @case('education') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg> @break
                                        @case('experience') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> @break
                                        @case('achievement') <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5a2 2 0 10-2 2h2zm0 0h4m-4 0H8m12 3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> @break
                                        @default <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    @endswitch
                                </div>

                                <div class="flex-1 w-full">
                                    <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-black uppercase rounded-lg tracking-wider">{{ $bio->years }}</span>
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-2 py-1 bg-slate-100 rounded-md">{{ $bio->type }} Profile</span>
                                    </div>

                                    <h3 class="text-2xl font-bold text-slate-900 mb-1">{{ $bio->title }}</h3>
                                    <p class="text-blue-600 font-semibold mb-4 text-sm">{{ $bio->name }}</p>

                                    {{-- VIEW DETAILS BUTTON --}}
                                    <button onclick="toggleDetails('details-{{ $index }}', this)" class="inline-flex items-center space-x-2 text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors bg-blue-50 hover:bg-blue-100/70 px-4 py-2 rounded-xl cursor-pointer group/btn">
                                        <span>View Details</span>
                                        <svg class="w-3.5 h-3.5 transform transition-transform duration-300 group-hover/btn:translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    
                                    {{-- COLLAPSIBLE CONTAINER (HIDDEN BY DEFAULT) --}}
                                    <div id="details-{{ $index }}" class="hidden overflow-hidden transition-all duration-300 mt-5 pt-5 border-t border-slate-100 w-full">
                                        
                                        {{-- ১. বর্ণনা (Description) --}}
                                        @if($bio->description)
                                            <div class="mb-6">
                                                <h4 class="text-xs font-black text-slate-400 uppercase tracking-wider mb-2">Description / Responsibilities</h4>
                                                <p class="text-slate-600 leading-relaxed text-sm bg-slate-50 p-4 rounded-2xl border border-slate-100/80">{{ $bio->description }}</p>
                                            </div>
                                        @endif

                                        {{-- ২. অতিরিক্ত মেটা ডেটা (Email & Phone) --}}
                                        @if($bio->email || $bio->phone)
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6 text-xs text-slate-600 bg-slate-50/50 p-4 rounded-2xl border border-slate-100">
                                                @if($bio->email) <div><strong>Email:</strong> {{ $bio->email }}</div> @endif
                                                @if($bio->phone) <div><strong>Phone:</strong> {{ $bio->phone }}</div> @endif
                                            </div>
                                        @endif

                                        {{-- ৩. এডুকেশন বা কোয়ালিফিকেশন টেবিল ভিউ --}}
                                        @if($eduData && $eduData->count() > 0)
                                            <div class="mt-4 w-full">
                                                <h4 class="text-xs font-black text-slate-400 uppercase tracking-wider mb-3">Linked Academic Qualifications</h4>
                                                
                                                <div class="overflow-hidden rounded-2xl border border-slate-200/80 shadow-xs bg-white">
                                                    <div class="overflow-x-auto w-full">
                                                        <table class="w-full text-left border-collapse text-xs">
                                                            <thead>
                                                                <tr class="bg-slate-50 border-b border-slate-200 text-slate-700 font-bold">
                                                                    <th class="px-4 py-3">Degree / Qualification</th>
                                                                    <th class="px-4 py-3">Institution</th>
                                                                    <th class="px-4 py-3 text-center">Passing Year</th>
                                                                    <th class="px-4 py-3 text-center">Result</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="divide-y divide-slate-100 text-slate-600">
                                                                @foreach($eduData as $edu)
                                                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                                                        <td class="px-4 py-3 font-bold text-slate-900">{{ $edu->degree }}</td>
                                                                        <td class="px-4 py-3">{{ $edu->institution }}</td>
                                                                        <td class="px-4 py-3 text-center whitespace-nowrap">
                                                                            <span class="px-2 py-0.5 bg-slate-100 text-slate-600 rounded-md font-semibold">{{ $edu->year }}</span>
                                                                        </td>
                                                                        <td class="px-4 py-3 text-center whitespace-nowrap">
                                                                            @if($edu->result)
                                                                                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 rounded-md font-bold">{{ $edu->result }}</span>
                                                                            @else
                                                                                <span class="text-slate-400 italic">N/A</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    @if($edu->description)
                                                                        <tr class="bg-slate-50/30">
                                                                            <td colspan="4" class="px-4 py-2 text-[11px] text-slate-400 border-t-0">
                                                                                <strong>Note:</strong> {{ $edu->description }}
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="text-center py-12 bg-white rounded-3xl border border-slate-100 shadow-sm">
                            <p class="text-slate-400 text-sm">No biography milestones recorded yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- TABLE VIEW --}}
        <div id="table-view" class="hidden animate-fade-in">
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-900 border-b border-slate-800 text-white">
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest">Duration</th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest">Milestone Info</th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-center">Category</th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest">Academic/Linked Details</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($biographies as $bio)
                            @php
                                $eduTableData = null;
                                if (isset($bio->educations) && $bio->educations->count() > 0) {
                                    $eduTableData = $bio->educations;
                                } elseif (isset($bio->education) && method_exists($bio->education, 'count') && $bio->education->count() > 0) {
                                    $eduTableData = $bio->education;
                                } elseif (isset($bio->education) && is_object($bio->education)) {
                                    $eduTableData = collect([$bio->education]);
                                }
                            @endphp
                            <tr class="hover:bg-blue-50/20 transition-colors align-top">
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-black rounded-lg tracking-wider">{{ $bio->years }}</span>
                                </td>
                                <td class="px-8 py-6 max-w-xs">
                                    <div class="font-extrabold text-slate-900 text-base">{{ $bio->title }}</div>
                                    <div class="text-xs text-blue-600 font-medium mt-0.5">{{ $bio->name }}</div>
                                    @if($bio->description)
                                        <p class="text-xs text-slate-400 mt-2 line-clamp-2" title="{{ $bio->description }}">{{ $bio->description }}</p>
                                    @endif
                                </td>
                                <td class="px-8 py-6 text-center whitespace-nowrap">
                                    <span class="text-[10px] font-black uppercase text-slate-500 border border-slate-200 px-2 py-1 rounded-md bg-slate-50/50">{{ $bio->type }}</span>
                                </td>
                                <td class="px-8 py-6">
                                    @if($eduTableData)
                                        <div class="space-y-3">
                                            @foreach($eduTableData as $edu)
                                                <div class="text-xs border-l-2 border-blue-500 pl-3 py-0.5">
                                                    <div class="font-bold text-slate-800">{{ $edu->degree }} <span class="text-slate-400 font-normal">({{ $edu->year }})</span></div>
                                                    <div class="text-[11px] text-slate-500">{{ $edu->institution }}</div>
                                                    @if($edu->result)
                                                        <span class="text-[10px] font-semibold text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded mt-0.5 inline-block">Result: {{ $edu->result }}</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-xs text-slate-400 italic">No linked academic details</span>
                                    @endif
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
        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl shadow-blue-600/10">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-8 relative z-10 tracking-tight">নিরাপদ ডিজিটাল সমাধান <br> তৈরি করতে চান?</h2>
            <a href="mailto:{{ $general->email ?? 'riazul@example.com' }}" class="relative z-10 bg-white text-blue-600 px-10 py-5 rounded-2xl font-bold text-lg hover:scale-105 transition-transform inline-block shadow-lg">ইমেইল করুন</a>
        </div>
    </div>
</section>

<script>
    // VIEW SWITCHER (CARD VS TABLE)
    function switchView(view) {
        const cardView = document.getElementById('card-view');
        const tableView = document.getElementById('table-view');
        const cardBtn = document.getElementById('card-btn');
        const tableBtn = document.getElementById('table-btn');

        if (view === 'card') {
            cardView.classList.remove('hidden');
            tableView.classList.add('hidden');
            cardBtn.className = "flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-blue-600 text-white shadow-lg shadow-blue-100 cursor-pointer";
            tableBtn.className = "flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-slate-400 hover:text-slate-600 cursor-pointer";
        } else {
            cardView.classList.add('hidden');
            tableView.classList.remove('hidden');
            tableBtn.className = "flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-blue-600 text-white shadow-lg shadow-blue-100 cursor-pointer";
            cardBtn.className = "flex items-center space-x-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-slate-400 hover:text-slate-600 cursor-pointer";
        }
    }

    // TOGGLE CHILDS / DETAILS ACTION
    function toggleDetails(id, button) {
        const targetDiv = document.getElementById(id);
        const svgIcon = button.querySelector('svg');
        
        if (targetDiv.classList.contains('hidden')) {
            targetDiv.classList.remove('hidden');
            button.querySelector('span').innerText = 'Hide Details';
            svgIcon.classList.add('rotate-180');
        } else {
            targetDiv.classList.add('hidden');
            button.querySelector('span').innerText = 'View Details';
            svgIcon.classList.remove('rotate-180');
        }
    }
</script>

<style>
    @keyframes fade-in { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fade-in 0.5s ease-out forwards; }
</style>

@endsection