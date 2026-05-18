@extends('backend.layout.master')

@section('title', 'Manage Research Papers | Admin Panel')

@section('content')

<div x-data="{ viewMode: 'table' }" class="space-y-8">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">

        <div>
            <h2 class="text-2xl font-bold text-slate-900">Research & Publications</h2>
            <p class="text-slate-500 text-sm">Manage your academic papers, journals, and conferences.</p>
        </div>

        <div class="flex items-center space-x-3">

            {{-- TOGGLE --}}
            <div class="flex bg-slate-100 p-1 rounded-xl border border-slate-200">
                <button @click="viewMode='table'"
                    :class="viewMode==='table' ? 'bg-white shadow-sm text-blue-600' : 'text-slate-500'"
                    class="p-2 rounded-lg">
                    📋
                </button>

                <button @click="viewMode='card'"
                    :class="viewMode==='card' ? 'bg-white shadow-sm text-blue-600' : 'text-slate-500'"
                    class="p-2 rounded-lg">
                    🧾
                </button>
            </div>

            <a href="{{ route('admin.research.create') }}"
               class="bg-emerald-600 text-white px-5 py-2.5 rounded-xl font-bold">
                + Add Paper
            </a>

        </div>
    </div>

    {{-- TABLE VIEW --}}
    <div x-show="viewMode === 'table'"
         class="bg-white rounded-3xl border border-slate-100 overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-slate-50 text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Journal</th>
                    <th class="px-6 py-4">Year</th>
                    <th class="px-6 py-4">Link</th>
                    <th class="px-6 py-4 text-right">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($researches as $paper)

                <tr>
                    <td class="px-6 py-4 font-bold text-slate-800">
                        {{ $paper->title }}
                    </td>

                    <td class="px-6 py-4 text-slate-500">
                        {{ $paper->journal }}
                    </td>

                    <td class="px-6 py-4 font-bold">
                        {{ $paper->year }}
                    </td>

                    <td class="px-6 py-4">
                        @if($paper->link)
                            <a href="{{ $paper->link }}" target="_blank"
                               class="text-blue-600 font-bold text-xs">
                                View
                            </a>
                        @else
                            <span class="text-slate-300">N/A</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 text-right flex justify-end space-x-2">

                        <a href="{{ route('admin.research.edit', $paper->id) }}"
                           class="text-blue-600">✏️</a>

                        <form action="{{ route('admin.research.destroy', $paper->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">🗑️</button>
                        </form>

                    </td>
                </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-slate-400">
                            No research found
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    {{-- CARD VIEW --}}
    <div x-show="viewMode === 'card'"
         class="grid md:grid-cols-2 gap-6">

        @foreach($researches as $paper)

        <div class="bg-white p-6 rounded-3xl border">

            <div class="flex justify-between mb-4">
                <span class="text-xs font-bold text-slate-400">
                    {{ $paper->year }}
                </span>
            </div>

            <h3 class="font-bold text-lg text-slate-800">
                {{ $paper->title }}
            </h3>

            <p class="text-slate-500 text-sm mt-2">
                {{ $paper->journal }}
            </p>

            <p class="text-slate-600 text-sm mt-3">
                {{ $paper->description }}
            </p>

            <div class="mt-4 flex justify-between items-center">

                @if($paper->link)
                <a href="{{ $paper->link }}" target="_blank"
                   class="text-blue-600 font-bold text-xs">
                    Open
                </a>
                @endif

                <div class="flex space-x-2">
                    <a href="{{ route('admin.research.edit', $paper->id) }}">✏️</a>

                    <form action="{{ route('admin.research.destroy', $paper->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button>🗑️</button>
                    </form>
                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection