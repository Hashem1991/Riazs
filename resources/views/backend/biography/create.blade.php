@extends('backend.layout.master')

@section('title', 'Add New Biography | Admin Panel')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Add New Biography</h2>
            <p class="text-slate-500 mt-1 text-sm">Create a professional entry for your career, education, or personal milestones.</p>
        </div>

        <a href="{{ url()->previous() }}"
           class="inline-flex items-center space-x-2 px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-slate-900 font-semibold transition shadow-sm text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Back to List</span>
        </a>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl overflow-hidden">
        <form action="{{ route('admin.biography.store') }}" method="POST" enctype="multipart/form-data" class="p-8 lg:p-12 space-y-8">
            @csrf

            {{-- Image Upload Section --}}
            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 pb-6 border-b border-slate-50">
                <div class="relative group">
                    <div class="w-32 h-32 bg-slate-100 rounded-2xl overflow-hidden border-2 border-dashed border-slate-300 flex items-center justify-center group-hover:border-blue-400 transition">
                        <img id="preview" src="#" alt="Preview" class="hidden w-full h-full object-cover">
                        <svg id="placeholder-icon" class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Profile or Milestone Image</label>
                    <input type="file" name="image" onchange="previewImage(event)" 
                           class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                    <p class="text-xs text-slate-400 mt-2">Recommended: Square size (JPG, PNG). Max 2MB.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- NAME --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Md. Riazul Hoque"
                           class="w-full bg-slate-50 border border-transparent rounded-xl px-4 py-3 text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none" required>
                </div>

                {{-- TITLE --}}
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Title / Position</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g. Software Developer"
                           class="w-full bg-slate-50 border border-transparent rounded-xl px-4 py-3 text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none">
                </div>

                {{-- YEARS --}}
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Year / Duration</label>
                    <input type="text" name="years" value="{{ old('years') }}" placeholder="e.g. 2020 - Present"
                           class="w-full bg-slate-50 border border-transparent rounded-xl px-4 py-3 text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none">
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="riazul@example.com"
                           class="w-full bg-slate-50 border border-transparent rounded-xl px-4 py-3 text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none">
                </div>

                {{-- PHONE --}}
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Phone Number</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+880 1XXXXXXXXX"
                           class="w-full bg-slate-50 border border-transparent rounded-xl px-4 py-3 text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none">
                </div>

                {{-- TYPE (SELECT FIELD) --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Category / Type</label>
                    <select name="type" class="w-full bg-slate-50 border border-transparent rounded-xl px-4 py-3 text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none appearance-none">
                        <option value="education">Education</option>
                        <option value="experience">Work Experience</option>
                        <option value="achievement">Achievement</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                {{-- DESCRIPTION --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Description</label>
                    <textarea name="description" rows="5" placeholder="Tell us more about this milestone..."
                              class="w-full bg-slate-50 border border-transparent rounded-xl px-4 py-3 text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none">{{ old('description') }}</textarea>
                </div>

            </div>

            {{-- Footer Action --}}
            <div class="pt-8 flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 border-t border-slate-50">
                <button type="submit"
                        class="w-full md:flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl transition shadow-lg shadow-blue-100 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Save Biography Entry</span>
                </button>

                <button type="reset"
                        class="w-full md:w-auto px-8 py-4 bg-slate-100 text-slate-500 font-bold rounded-2xl hover:bg-slate-200 transition">
                    Reset
                </button>
            </div>

        </form>
    </div>
</div>

{{-- Image Preview Script --}}
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('preview');
            const icon = document.getElementById('placeholder-icon');
            output.src = reader.result;
            output.classList.remove('hidden');
            icon.classList.add('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection