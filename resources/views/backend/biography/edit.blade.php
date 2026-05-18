@extends('backend.layout.master')

@section('title', 'Edit Biography | Admin Panel')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Edit Milestone</h2>
            <p class="text-slate-500 text-sm">Update the details for this biography entry.</p>
        </div>

        <a href="{{ route('admin.biography.index') }}"
           class="flex items-center space-x-2 text-slate-500 hover:text-slate-700 font-semibold transition text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Back to List</span>
        </a>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">

        <form action="{{ route('admin.biography.update', $biography->id) }}"
              method="POST"
              class="p-8 space-y-6"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- NAME (FIXED) --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Full Name
                    </label>

                    <input type="text" name="name"
                           value="{{ $biography->name ?? '' }}"
                           class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 transition outline-none">
                </div>

                {{-- TITLE --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Title / Position
                    </label>

                    <input type="text" name="title"
                           value="{{ $biography->title ?? '' }}"
                           class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 transition outline-none">
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Email
                    </label>

                    <input type="email" name="email"
                           value="{{ $biography->email ?? '' }}"
                           class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 transition outline-none">
                </div>

                {{-- PHONE --}}
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Phone
                    </label>

                    <input type="text" name="phone"
                           value="{{ $biography->phone ?? '' }}"
                           class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 transition outline-none">
                </div>

                {{-- DESCRIPTION --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Short Description (Optional)
                    </label>

                    <textarea name="description" rows="4"
                              class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 transition outline-none">{{ $biography->description ?? '' }}</textarea>
                </div>

            </div>

            {{-- STATUS (SAFE FIX) --}}
            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">

                <div>
                    <p class="text-sm font-bold text-slate-700">Display on Portfolio</p>
                    <p class="text-xs text-slate-400">
                        Current status:
                        <span class="text-green-600 font-bold italic">
                            {{ ($biography->status ?? 1) ? 'Visible' : 'Hidden' }}
                        </span>
                    </p>
                </div>

                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="status" value="1"
                           class="sr-only peer"
                           {{ ($biography->status ?? 1) ? 'checked' : '' }}>

                    <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:after:translate-x-full after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                </label>

            </div>

            {{-- BUTTON --}}
            <div class="pt-4 flex items-center space-x-4">

                <button type="submit"
                        class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-bold py-3.5 rounded-xl transition shadow-lg shadow-amber-200">
                    Update Entry
                </button>

                <a href="{{ route('admin.biography.index') }}"
                   class="px-6 py-3.5 bg-slate-100 text-slate-500 font-bold rounded-xl hover:bg-slate-200 transition">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>
@endsection