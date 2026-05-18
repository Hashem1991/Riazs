@extends('backend.layout.master')

@section('title', 'Manage Expertise | Admin Panel')

@section('content')

{{-- Alpine.js for View State --}}
<div x-data="{ viewMode: 'card' }" class="space-y-8">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Expertise & Skills</h2>
            <p class="text-slate-500 text-sm">Manage your technical skills and proficiency levels.</p>
        </div>

        <div class="flex items-center space-x-3">
            {{-- VIEW TOGGLE BUTTONS --}}
            <div class="flex bg-slate-100 p-1 rounded-xl border border-slate-200">
                <button @click="viewMode = 'card'" 
                    :class="viewMode === 'card' ? 'bg-white shadow-sm text-blue-600' : 'text-slate-500'"
                    class="p-2 rounded-lg transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                </button>
                <button @click="viewMode = 'table'" 
                    :class="viewMode === 'table' ? 'bg-white shadow-sm text-blue-600' : 'text-slate-500'"
                    class="p-2 rounded-lg transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                </button>
            </div>

            <a href="{{ route('admin.expertise.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg shadow-blue-100 transition-all flex items-center space-x-2">
                <span>+ Add New Skill</span>
            </a>
        </div>
    </div>

    {{-- 1. CARD VIEW --}}
    <div x-show="viewMode === 'card'" x-transition:enter="transition ease-out duration-300" 
         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($expertises as $expertise)
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition group">
            <div class="flex justify-between items-start mb-4">
                <div class="text-[10px] px-3 py-1 bg-slate-100 rounded-full text-slate-600 font-black uppercase tracking-widest">
                    {{ $expertise->biography->name ?? 'Global' }}
                </div>
                <div class="text-[10px] px-3 py-1 bg-blue-50 text-blue-600 rounded-full font-black uppercase tracking-widest">
                    {{ $expertise->type }}
                </div>
            </div>

            <h3 class="font-bold text-slate-800 text-lg group-hover:text-blue-600 transition-colors">
                {{ $expertise->title }}
            </h3>
            <p class="text-slate-500 text-sm mt-2 line-clamp-2">
                {{ $expertise->description }}
            </p>

            {{-- Experience Bar --}}
            <div class="mt-6 space-y-2">
                <div class="flex justify-between text-xs font-bold">
                    <span class="text-slate-400 uppercase">Proficiency</span>
                    <span class="text-blue-600">{{ $expertise->experience }}%</span>
                </div>
                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                    <div class="bg-blue-600 h-full rounded-full transition-all duration-1000"
                         style="width: {{ $expertise->experience }}%">
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-2 mt-6 pt-4 border-t border-slate-50">
                <a href="{{ route('admin.expertise.edit', $expertise->id) }}" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                </a>
                <form action="{{ route('admin.expertise.delete', $expertise->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white p-20 text-center rounded-[3rem] border-2 border-dashed border-slate-200">
            <span class="text-4xl">📚</span>
            <p class="text-slate-400 mt-4 font-medium">No skills found. Start by adding one!</p>
        </div>
        @endforelse
    </div>

    {{-- 2. TABLE VIEW --}}
    <div x-show="viewMode === 'table'" x-transition:enter="transition ease-out duration-300"
         class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-slate-50/50 text-slate-400 text-[11px] uppercase tracking-widest font-black">
                <tr>
                    <th class="px-8 py-5">Skill Title</th>
                    <th class="px-8 py-5">Type</th>
                    <th class="px-8 py-5">Proficiency</th>
                    <th class="px-8 py-5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($expertises as $expertise)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-5">
                        <div class="font-bold text-slate-800">{{ $expertise->title }}</div>
                        <div class="text-xs text-slate-400">{{ Str::limit($expertise->description, 50) }}</div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-[10px] font-bold uppercase">
                            {{ $expertise->type }}
                        </span>
                    </td>
                    <td class="px-8 py-5 w-64">
                        <div class="flex items-center space-x-3">
                            <div class="flex-1 bg-slate-100 h-1.5 rounded-full">
                                <div class="bg-blue-600 h-full rounded-full" style="width: {{ $expertise->experience }}%"></div>
                            </div>
                            <span class="text-xs font-bold text-slate-600">{{ $expertise->experience }}%</span>
                        </div>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('admin.expertise.edit', $expertise->id) }}" class="p-2 text-slate-400 hover:text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <form action="{{ route('admin.expertise.delete', $expertise->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection

@push('scripts')
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush