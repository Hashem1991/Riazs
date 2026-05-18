@extends('frontend.layout.master')

@section('title', 'Professional Expertise | Md. Riazul Hoque')

@section('content')

{{-- HERO SECTION --}}
<section class="relative py-28 bg-[#030712] overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-600/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-emerald-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-bold uppercase tracking-widest mb-8 animate-fade-in">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                <span>Security & Development Skills</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-black text-white mb-8 tracking-tighter">
                My Professional <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-400 to-emerald-400">
                    Capabilities.
                </span>
            </h1>

            {{-- View Switcher --}}
            <div class="flex justify-center gap-4 mt-8">
                <div class="inline-flex p-1 bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl">
                    <button id="details-btn" onclick="toggleExpertiseView('details')" class="px-6 py-3 rounded-xl flex items-center space-x-2 transition-all duration-300 bg-blue-600 text-white font-bold">
                        <i class="fas fa-list-ul"></i>
                        <span>Details View</span>
                    </button>
                    <button id="table-btn" onclick="toggleExpertiseView('table')" class="px-6 py-3 rounded-xl flex items-center space-x-2 transition-all duration-300 text-slate-400 hover:text-white font-bold">
                        <i class="fas fa-table"></i>
                        <span>Table View</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SKILLS CONTENT --}}
<section class="py-24 bg-white min-h-[700px]">
    <div class="container mx-auto px-6">
        
        {{-- 1. DETAILS VIEW (One After Another - Vertical List) --}}
        <div id="expertise-details" class="max-w-4xl mx-auto space-y-10">
            @forelse($expertises as $item)
            <div class="group relative p-10 rounded-[2.5rem] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 animate-fade-in">
                <div class="flex flex-col md:flex-row justify-between items-start mb-8 gap-6">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 bg-slate-900 rounded-3xl flex items-center justify-center text-white text-3xl group-hover:bg-blue-600 group-hover:rotate-6 transition-all duration-500 shadow-xl shadow-slate-200">
                            <i class="fas fa-code-branch"></i>
                        </div>
                        <div>
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-black uppercase rounded-lg tracking-widest border border-blue-100 mb-2 inline-block">
                                {{ $item->type }}
                            </span>
                            <h3 class="text-3xl font-black text-slate-900 leading-tight group-hover:text-blue-600 transition-colors">
                                {{ $item->title }}
                            </h3>
                        </div>
                    </div>
                    <div class="flex flex-col items-end">
                        <span class="text-5xl font-black text-slate-200 group-hover:text-blue-600/20 transition-colors">
                            {{ $item->experience }}%
                        </span>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Mastery Level</span>
                    </div>
                </div>
                
                <div class="mb-10">
                    <p class="text-slate-500 text-lg leading-relaxed max-w-3xl">
                        {{ $item->description }}
                    </p>
                </div>

                {{-- Proficiency Progress Bar --}}
                <div class="relative h-4 w-full bg-slate-200 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-blue-600 via-indigo-500 to-emerald-400 rounded-full transition-all duration-1000 ease-out" style="width: {{ $item->experience }}%">
                        <div class="absolute inset-0 bg-[linear-gradient(45deg,rgba(255,255,255,0.2)_25%,transparent_25%,transparent_50%,rgba(255,255,255,0.2)_50%,rgba(255,255,255,0.2)_75%,transparent_75%,transparent)] bg-[length:20px_20px] animate-shimmer"></div>
                    </div>
                </div>
            </div>
            @empty
                <div class="text-center py-20">
                    <p class="text-slate-400 font-medium italic">No expertise data found at the moment.</p>
                </div>
            @endforelse
        </div>

        {{-- 2. TABLE VIEW (Initially Hidden) --}}
        <div id="expertise-table" class="hidden animate-fade-in">
            <div class="max-w-5xl mx-auto overflow-hidden bg-white rounded-[2.5rem] border border-slate-100 shadow-2xl">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-900 text-white">
                        <tr>
                            <th class="px-10 py-7 text-xs font-black uppercase tracking-widest">Technical Skill</th>
                            <th class="px-10 py-7 text-xs font-black uppercase tracking-widest">Category</th>
                            <th class="px-10 py-7 text-xs font-black uppercase tracking-widest text-right">Proficiency</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($expertises as $item)
                        <tr class="hover:bg-blue-50/40 transition-colors group">
                            <td class="px-10 py-8">
                                <span class="font-bold text-slate-900 text-xl block">{{ $item->title }}</span>
                                <span class="text-slate-400 text-xs mt-1 block max-w-sm truncate">{{ $item->description }}</span>
                            </td>
                            <td class="px-10 py-8">
                                <span class="px-4 py-1.5 bg-slate-100 text-slate-600 text-[10px] font-black uppercase rounded-full border border-slate-200">
                                    {{ $item->type }}
                                </span>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <div class="inline-flex flex-col items-end">
                                    <span class="font-black text-blue-600 text-2xl">{{ $item->experience }}%</span>
                                    <div class="w-24 h-1.5 bg-slate-100 rounded-full mt-2 overflow-hidden">
                                        <div class="h-full bg-blue-600" style="width: {{ $item->experience }}%"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

{{-- SCRIPT --}}
<script>
    function toggleExpertiseView(view) {
        const detailsView = document.getElementById('expertise-details');
        const tableView = document.getElementById('expertise-table');
        const detailsBtn = document.getElementById('details-btn');
        const tableBtn = document.getElementById('table-btn');

        if(view === 'details') {
            detailsView.classList.remove('hidden');
            tableView.classList.add('hidden');
            
            detailsBtn.classList.add('bg-blue-600', 'text-white');
            detailsBtn.classList.remove('text-slate-400');
            tableBtn.classList.add('text-slate-400');
            tableBtn.classList.remove('bg-blue-600', 'text-white');
        } else {
            detailsView.classList.add('hidden');
            tableView.classList.remove('hidden');
            
            tableBtn.classList.add('bg-blue-600', 'text-white');
            tableBtn.classList.remove('text-slate-400');
            detailsBtn.classList.add('text-slate-400');
            detailsBtn.classList.remove('bg-blue-600', 'text-white');
        }
    }
</script>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    @keyframes shimmer {
        0% { background-position: 0 0; }
        100% { background-position: 40px 0; }
    }
    .animate-shimmer {
        animation: shimmer 2s linear infinite;
    }
</style>

@endsection