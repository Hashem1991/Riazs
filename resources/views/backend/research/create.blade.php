@extends('backend.layout.master')

@section('title', 'Add Research Paper | Admin Panel')

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">

        <div class="p-8 border-b border-slate-50 bg-emerald-50/30">
            <h2 class="text-xl font-bold text-slate-900">Publish New Research</h2>
            <p class="text-slate-500 text-sm">Fill in your academic publication details.</p>
        </div>

        <form action="{{ route('admin.research.store') }}" method="POST" class="p-8 space-y-6">
            @csrf

            {{-- Biography --}}
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Select Biography
                </label>

                <select name="biography_id"
                    class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                    @foreach($biographies ?? [] as $bio)
                        <option value="{{ $bio->id }}">{{ $bio->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Paper Title --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Paper Title
                    </label>
                    <input type="text" name="title"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm"
                        placeholder="e.g. Post-Quantum Cryptography Study">
                </div>

                {{-- Journal --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Journal / Conference Name
                    </label>
                    <input type="text" name="journal"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm"
                        placeholder="e.g. IEEE, Springer, ACM">
                </div>

                {{-- Year --}}
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Publication Year
                    </label>
                    <input type="text" name="year"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm"
                        placeholder="2026">
                </div>

                {{-- Link --}}
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Paper Link / DOI
                    </label>
                    <input type="url" name="link"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm"
                        placeholder="https://doi.org/...">
                </div>

                {{-- Abstract --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Abstract / Description
                    </label>
                    <textarea name="description" rows="5"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm"
                        placeholder="Short summary of the research..."></textarea>
                </div>

            </div>

            <button type="submit"
                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 rounded-xl">
                Publish Research
            </button>

        </form>
    </div>
</div>
@endsection