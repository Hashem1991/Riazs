@extends('backend.layout.master')

@section('title', 'Setup Profile | Admin Panel')

@section('content')
<div class="max-w-5xl mx-auto">

    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">

            <h2 class="text-xl font-bold text-slate-900 mb-6">Create About Me Profile</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Biography --}}
                <div class="md:col-span-2">
                    <label class="text-xs font-bold text-slate-400 uppercase">Select Biography</label>
                    <select name="biography_id"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                        <option value="">Select Biography</option>
                        @foreach($biographies as $bio)
                            <option value="{{ $bio->id }}">{{ $bio->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Name --}}
                <div class="md:col-span-2">
                    <label class="text-xs font-bold text-slate-400 uppercase">Name</label>
                    <input type="text" name="name"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Title --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Title</label>
                    <input type="text" name="title"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Email --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Email</label>
                    <input type="email" name="email"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Phone --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Phone</label>
                    <input type="text" name="phone"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Address --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Address</label>
                    <input type="text" name="address"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Date of Birth --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Date of Birth</label>
                    <input type="date" name="date_of_birth"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Gender --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Gender</label>
                    <select name="gender" class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                {{-- Marital Status --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Marital Status</label>
                    <select name="marital_status" class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                    </select>
                </div>

                {{-- Children Count --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Children Count</label>
                    <input type="number" name="children_count"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Blood Group --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Blood Group</label>
                    <input type="text" name="blood_group"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Donate Blood --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Donate Blood</label>
                <select name="donate_blood">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                </div>

                {{-- Image --}}
                <div class="md:col-span-2">
                    <label class="text-xs font-bold text-slate-400 uppercase">Profile Image</label>
                    <input type="file" name="image"
                        class="w-full bg-slate-50 border-dashed border-2 border-slate-200 rounded-xl px-4 py-6 text-sm">
                </div>

                {{-- Social Links --}}
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Facebook</label>
                    <input type="text" name="facebook" class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Twitter</label>
                    <input type="text" name="twitter" class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">LinkedIn</label>
                    <input type="text" name="linkedin" class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Instagram</label>
                    <input type="text" name="instagram" class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">YouTube</label>
                    <input type="text" name="youtube" class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase">Website</label>
                    <input type="text" name="website" class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm">
                </div>

                {{-- Description --}}
                <div class="md:col-span-2">
                    <label class="text-xs font-bold text-slate-400 uppercase">Description</label>
                    <textarea name="description" rows="5"
                        class="w-full bg-slate-50 rounded-xl px-4 py-3 text-sm"></textarea>
                </div>

            </div>

            <button type="submit"
                class="mt-8 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl">
                Save Profile
            </button>

        </div>
    </form>

</div>
@endsection