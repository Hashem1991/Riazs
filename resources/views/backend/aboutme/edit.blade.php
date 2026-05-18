@extends('backend.layout.master')

@section('title', 'Edit Profile | Admin Panel')

@section('content')
<div class="max-w-5xl mx-auto">

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

            {{-- Current Image Preview --}}
            <div class="flex flex-col md:flex-row gap-8 mb-8">

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
                           class="w-full bg-slate-50 border-dashed border-2 border-slate-200 rounded-xl px-4 py-6 text-sm focus:ring-2 focus:ring-amber-500 outline-none">

                    <p class="text-[10px] text-slate-400 mt-2">
                        Recommended: Square image (500x500px), Max 2MB.
                    </p>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Biography --}}
                <div class="md:col-span-2">
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Select Biography
                    </label>

                    <select name="biography_id"
                            class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                        <option value="">Select Biography</option>

                        @foreach($biographies as $bio)
                            <option value="{{ $bio->id }}"
                                {{ ($about->biography_id ?? '') == $bio->id ? 'selected' : '' }}>
                                {{ $bio->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Name --}}
                <div class="md:col-span-2">
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Name
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ $about->name ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Title --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Title
                    </label>

                    <input type="text"
                           name="title"
                           value="{{ $about->title ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Email --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ $about->email ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Phone --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Phone
                    </label>

                    <input type="text"
                           name="phone"
                           value="{{ $about->phone ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Address --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Address
                    </label>

                    <input type="text"
                           name="address"
                           value="{{ $about->address ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Date of Birth --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Date of Birth
                    </label>

                    <input type="date"
                           name="date_of_birth"
                           value="{{ $about->date_of_birth ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Gender --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Gender
                    </label>

                    <select name="gender"
                            class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">

                        <option value="">Select</option>

                        <option value="male"
                            {{ ($about->gender ?? '') == 'male' ? 'selected' : '' }}>
                            Male
                        </option>

                        <option value="female"
                            {{ ($about->gender ?? '') == 'female' ? 'selected' : '' }}>
                            Female
                        </option>

                        <option value="other"
                            {{ ($about->gender ?? '') == 'other' ? 'selected' : '' }}>
                            Other
                        </option>

                    </select>
                </div>

                {{-- Marital Status --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Marital Status
                    </label>

                    <select name="marital_status"
                            class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">

                        <option value="single"
                            {{ ($about->marital_status ?? '') == 'single' ? 'selected' : '' }}>
                            Single
                        </option>

                        <option value="married"
                            {{ ($about->marital_status ?? '') == 'married' ? 'selected' : '' }}>
                            Married
                        </option>

                        <option value="divorced"
                            {{ ($about->marital_status ?? '') == 'divorced' ? 'selected' : '' }}>
                            Divorced
                        </option>

                    </select>
                </div>

                {{-- Children Count --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Children Count
                    </label>

                    <input type="number"
                           name="children_count"
                           value="{{ $about->children_count ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Blood Group --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Blood Group
                    </label>

                    <input type="text"
                           name="blood_group"
                           value="{{ $about->blood_group ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Donate Blood --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Donate Blood
                    </label>

                    <select name="donate_blood"
                            class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">

                        <option value="1"
                            {{ ($about->donate_blood ?? '') == 1 ? 'selected' : '' }}>
                            Yes
                        </option>

                        <option value="0"
                            {{ ($about->donate_blood ?? '') == 0 ? 'selected' : '' }}>
                            No
                        </option>

                    </select>
                </div>

                {{-- Facebook --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Facebook
                    </label>

                    <input type="text"
                           name="facebook"
                           value="{{ $about->facebook ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Twitter --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Twitter
                    </label>

                    <input type="text"
                           name="twitter"
                           value="{{ $about->twitter ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- LinkedIn --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        LinkedIn
                    </label>

                    <input type="text"
                           name="linkedin"
                           value="{{ $about->linkedin ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Instagram --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Instagram
                    </label>

                    <input type="text"
                           name="instagram"
                           value="{{ $about->instagram ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- YouTube --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        YouTube
                    </label>

                    <input type="text"
                           name="youtube"
                           value="{{ $about->youtube ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Website --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Website
                    </label>

                    <input type="text"
                           name="website"
                           value="{{ $about->website ?? '' }}"
                           class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Description --}}
                <div class="md:col-span-2">
                    <label class="text-xs font-bold text-slate-400 uppercase">
                        Description
                    </label>

                    <textarea name="description"
                              rows="5"
                              class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">{{ $about->description ?? '' }}</textarea>
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