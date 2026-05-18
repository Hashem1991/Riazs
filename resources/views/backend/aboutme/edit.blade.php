@extends('backend.layout.master')

@section('title', 'Edit Profile | Admin Panel')

@section('content')
<div class="max-w-4xl mx-auto">

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">

            <div class="flex items-center justify-between mb-8">
                <h2 class="text-xl font-bold text-slate-900">Update Profile Information</h2>
                <span class="bg-amber-100 text-amber-600 px-3 py-1 rounded-full text-[10px] font-black uppercase">
                    Editing Mode
                </span>
            </div>

            <div class="flex flex-col md:flex-row gap-8 mb-8">

                {{-- Current Image Preview --}}
                <div class="w-32">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 text-center">
                        Current
                    </label>

                    <img src="{{ $about && $about->image ? asset('storage/'.$about->image) : 'https://ui-avatars.com/api/?name=Profile' }}"
                         class="w-32 h-32 rounded-2xl object-cover border-2 border-slate-100">
                </div>

                <div class="flex-1">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Change Profile Image
                    </label>

                    <input type="file" name="image"
                           class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500 outline-none">

                    <p class="text-[10px] text-slate-400 mt-2">
                        Recommended: Square image (500x500px), Max 2MB.
                    </p>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Full Name
                    </label>

                    <input type="text" name="name"
                           value="{{ $about->name ?? '' }}"
                           class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500 outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Designation
                    </label>

                    <input type="text" name="title"
                           value="{{ $about->title ?? '' }}"
                           class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500 outline-none">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Bio
                    </label>

                    <textarea name="description" rows="4"
                              class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500 outline-none">{{ $about->description ?? '' }}</textarea>
                </div>

            </div>

            <div class="flex space-x-4 mt-8">

                <button type="submit"
                        class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-bold py-3.5 rounded-xl transition shadow-lg shadow-amber-200">
                    Update Profile
                </button>

                <a href="{{ url()->previous() }}"
                   class="px-8 py-3.5 bg-slate-100 text-slate-500 font-bold rounded-xl hover:bg-slate-200 transition">
                    Cancel
                </a>

            </div>

        </div>
    </form>

</div>
@endsection