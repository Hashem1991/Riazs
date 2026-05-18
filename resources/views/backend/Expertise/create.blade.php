@extends('backend.layout.master')

@section('title', 'Add Skill | Admin Panel')

@section('content')

@php
    use App\Models\Biography;
    $biographies = Biography::latest()->get();
@endphp

<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">

        <h2 class="text-xl font-bold text-slate-900 mb-6">
            Add New Expertise
        </h2>

        <form action="{{ route('admin.expertise.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- BIOGRAPHY SELECT --}}
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Select Biography
                </label>

                <select name="biography_id"
                    class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none"
                    required>

                    <option value="">-- Select Biography --</option>

                    @foreach($biographies as $bio)
                        <option value="{{ $bio->id }}">
                            {{ $bio->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- SKILL NAME --}}
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Skill Name
                </label>

                <input type="text" name="title" required
                    class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            {{-- DESCRIPTION --}}
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Short Description
                </label>

                <input type="text" name="description" required
                    class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            {{-- EXPERIENCE --}}
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Proficiency Level (%)
                </label>

                <input type="number" name="experience" min="1" max="100" required
                    class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            {{-- TYPE --}}
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Category
                </label>

                <select name="type"
                    class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none"
                    required>

                    <option value="web">Web Development</option>
                    <option value="mobile">Mobile App</option>
                    <option value="security">Information Security</option>

                </select>
            </div>

            {{-- SUBMIT --}}
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl transition shadow-lg shadow-blue-200">

                Save Skill

            </button>

        </form>

    </div>
</div>

@endsection