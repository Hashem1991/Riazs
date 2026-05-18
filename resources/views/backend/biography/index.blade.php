@extends('backend.layout.master')

@section('title', 'Manage Biography | Md. Riazul Hoque')

@section('content')
<div class="space-y-8">

    {{-- Header Section --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Biography Management</h2>
            <p class="text-slate-500 text-sm">Update your educational background, career milestones, and personal history.</p>
        </div>

        <a href="{{ route('admin.biography.create') }}"
           class="flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold transition shadow-lg shadow-blue-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Add New Entry</span>
        </a>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Total Milestones</p>
            <h3 class="text-xl font-black text-slate-900 mt-1">
                {{ method_exists($biographies, 'total') ? $biographies->total() : $biographies->count() }} Entries
            </h3>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Last Updated</p>
            <h3 class="text-xl font-black text-slate-900 mt-1">{{ now()->format('d M, Y') }}</h3>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Status</p>
            <div class="flex items-center mt-1">
                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                <h3 class="text-xl font-black text-slate-900">Live on Portfolio</h3>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">

        <div class="p-6 border-b border-slate-50 flex justify-between items-center bg-white">
            <h3 class="font-bold text-slate-900">Timeline Entries</h3>

            <div class="relative">
                <form action="{{ route('admin.biography.index') }}" method="GET">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search entries..."
                           class="bg-slate-50 border-none rounded-lg px-10 py-2 text-sm focus:ring-2 focus:ring-blue-500 w-64">

                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 text-slate-400 text-[11px] uppercase tracking-widest font-bold">
                <tr>
                    <th class="px-8 py-4">Year/Duration</th>
                    <th class="px-8 py-4">Title & Institution</th>
                    <th class="px-8 py-4">Category</th>
                    <th class="px-8 py-4">Status</th>
                    <th class="px-8 py-4 text-right">Actions</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-slate-50 text-sm">
                @forelse($biographies as $bio)
                    <tr class="hover:bg-slate-50/50 transition">

                        {{-- FIX: year column (duration না থাকলে fallback) --}}
                        <td class="px-8 py-5 font-bold text-blue-600">
                            {{ $bio->year ?? 'N/A' }}
                        </td>

                        <td class="px-8 py-5">
                            <div class="font-bold text-slate-800">{{ $bio->title }}</div>
                            <div class="text-xs text-slate-500">{{ $bio->name }}</div>
                        </td>

                        <td class="px-8 py-5">
                            @php
                                $category = strtolower($bio->category ?? 'education');
                                $color = $category == 'education' ? 'purple' : ($category == 'experience' ? 'blue' : 'green');
                            @endphp

                            <span class="bg-{{ $color }}-50 text-{{ $color }}-600 px-3 py-1 rounded-full text-[10px] font-bold uppercase">
                                {{ ucfirst($category) }}
                            </span>
                        </td>

                        <td class="px-8 py-5">
                            <span class="inline-flex items-center {{ ($bio->status ?? 1) ? 'text-green-600' : 'text-slate-400' }} font-medium">
                                <span class="w-1.5 h-1.5 {{ ($bio->status ?? 1) ? 'bg-green-500' : 'bg-slate-300' }} rounded-full mr-2"></span>
                                {{ ($bio->status ?? 1) ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        <td class="px-8 py-5 text-right">
                            <div class="flex justify-end space-x-2">

                                <a href="{{ route('admin.biography.edit', $bio->id) }}"
                                   class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </a>

                                <form action="{{ route('admin.biography.destroy', $bio->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-8 py-10 text-center text-slate-500">
                            No data found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination FIX --}}
        <div class="p-6 border-t border-slate-50 bg-slate-50/30">
            @if(method_exists($biographies, 'links'))
                {{ $biographies->appends(request()->query())->links() }}
            @endif
        </div>

    </div>
</div>
@endsection