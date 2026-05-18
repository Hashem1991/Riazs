@extends('backend.layout.master')

@section('title', 'Edit Skill | Admin Panel')

@section('content')

@php
    use App\Models\Biography;
    $biographies = Biography::latest()->get();
@endphp

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">

        <h2 class="text-xl font-bold text-slate-900 mb-6 text-amber-600">
            Update Expertise
        </h2>

        <form action="{{ route('admin.expertise.update', $expertise->id) }}"
              method="POST"
              class="space-y-6">

            @csrf
            @method('PUT')

            {{-- BIOGRAPHY --}}
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Select Biography
                </label>

                <select name="biography_id"
                        class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500 outline-none"
                        required>

                    @foreach($biographies as $bio)
                        <option value="{{ $bio->id }}"
                            {{ $expertise->biography_id == $bio->id ? 'selected' : '' }}>
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

                <input type="text" name="title"
                       value="{{ $expertise->title }}"
                       class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500 outline-none"
                       required>
            </div>

            {{-- DESCRIPTION --}}
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Description
                </label>

                <input type="text" name="description"
                       value="{{ $expertise->description }}"
                       class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500 outline-none"
                       required>
            </div>

            {{-- EXPERIENCE --}}
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Proficiency Level (%)
                </label>

                <input type="number" name="experience"
                       value="{{ $expertise->experience }}"
                       min="1" max="100"
                       class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500 outline-none"
                       required>
            </div>

            {{-- TYPE --}}
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Category
                </label>

                <select name="type"
                        class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500 outline-none"
                        required>

                    <option value="web" {{ $expertise->type == 'web' ? 'selected' : '' }}>Web Development</option>
                    <option value="mobile" {{ $expertise->type == 'mobile' ? 'selected' : '' }}>Mobile App</option>
                    <option value="security" {{ $expertise->type == 'security' ? 'selected' : '' }}>Information Security</option>

                </select>
            </div>

            {{-- SUBMIT --}}
            <button type="submit"
                    class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-3.5 rounded-xl transition shadow-lg shadow-amber-200">

                Update Skill

            </button>

        </form>

    </div>

</div>

@endsection