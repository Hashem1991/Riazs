@extends('backend.layout.master')

@section('title', 'Edit Biography | Admin Panel')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

    {{-- Alert Messages --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-rose-50 border-l-4 border-rose-500 rounded-xl text-rose-700 text-sm shadow-sm">
            <p class="font-bold mb-1">Please fix the following errors:</p>
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Biography Entry</h2>
            <p class="text-slate-500 mt-1 text-sm">Modify the entry details and its associated academic milestones.</p>
        </div>

        <a href="{{ route('admin.biography.index') }}"
           class="inline-flex items-center justify-center space-x-2 px-4 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-slate-900 font-semibold transition shadow-sm text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Back to List</span>
        </a>
    </div>

    {{-- Main Form --}}
    <form action="{{ route('admin.biography.update', $biography->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- Section 1: Basic Information --}}
        <div class="bg-white rounded-3xl border border-slate-100 shadow-xl overflow-hidden p-6 sm:p-10 space-y-8">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-lg font-bold text-slate-800">1. Personal / Profile Information</h3>
                <p class="text-xs text-slate-400">Primary details regarding the biography identity.</p>
            </div>

            {{-- Image Upload Section --}}
            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 pb-6 border-b border-slate-50">
                <div class="relative group">
                    <div class="w-32 h-32 bg-slate-50 rounded-2xl overflow-hidden border-2 border-dashed border-slate-200 flex items-center justify-center group-hover:border-blue-400 transition-colors duration-200">
                        @if(!empty($biography->image) && file_exists(public_path('uploads/biography/'.$biography->image)))
                            <img id="preview" src="{{ asset('uploads/biography/'.$biography->image) }}" alt="Preview" class="w-full h-full object-cover">
                            <svg id="placeholder-icon" class="w-10 h-10 text-slate-300 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        @else
                            <img id="preview" src="#" alt="Preview" class="hidden w-full h-full object-cover">
                            <svg id="placeholder-icon" class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        @endif
                    </div>
                </div>
                <div class="flex-1 w-full text-center md:text-left">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Profile or Milestone Image</label>
                    <input type="file" name="image" onchange="previewImage(event)" 
                           class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                    <p class="text-xs text-slate-400 mt-2">Leave empty to keep the current image. Max 2MB.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- NAME --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Full Name <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $biography->name ?? '') }}" placeholder="e.g. Md. Riazul Hoque"
                           class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4 focus:ring-blue-500/10" required>
                </div>

                {{-- TITLE --}}
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Title / Position</label>
                    <input type="text" name="title" value="{{ old('title', $biography->title ?? '') }}" placeholder="e.g. Software Developer"
                           class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4 focus:ring-blue-500/10">
                </div>

                {{-- YEARS --}}
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Year / Duration</label>
                    <input type="text" name="years" value="{{ old('years', $biography->years ?? '') }}" placeholder="e.g. 2020 - Present"
                           class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4 focus:ring-blue-500/10">
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $biography->email ?? '') }}" placeholder="riazul@example.com"
                           class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4 focus:ring-blue-500/10">
                </div>

                {{-- PHONE --}}
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Phone Number</label>
                    <input type="text" name="phone" value="{{ old('phone', $biography->phone ?? '') }}" placeholder="+880 1XXXXXXXXX"
                           class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4 focus:ring-blue-500/10">
                </div>

                {{-- TYPE (SELECT FIELD) --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Category / Type</label>
                    <div class="relative">
                        <select name="type" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4 focus:ring-blue-500/10 appearance-none cursor-pointer">
                            <option value="education" {{ old('type', $biography->type) == 'education' ? 'selected' : '' }}>Education Profile</option>
                            <option value="experience" {{ old('type', $biography->type) == 'experience' ? 'selected' : '' }}>Work Experience Profile</option>
                            <option value="achievement" {{ old('type', $biography->type) == 'achievement' ? 'selected' : '' }}>Achievement Profile</option>
                            <option value="other" {{ old('type', $biography->type) == 'other' ? 'selected' : '' }}>Other / General Biography</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                {{-- DESCRIPTION --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Biography Overview</label>
                    <textarea name="description" rows="4" placeholder="Briefly introduce or summarize this biography profile..."
                              class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4 focus:ring-blue-500/10">{{ old('description', $biography->description ?? '') }}</textarea>
                </div>
            </div>

            {{-- STATUS TOGGLE --}}
            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                <div>
                    <p class="text-sm font-bold text-slate-700">Display on Portfolio</p>
                    <p class="text-xs text-slate-400">
                        Current status: 
                        <span class="{{ ($biography->status ?? 1) ? 'text-green-600' : 'text-rose-500' }} font-bold italic">
                            {{ ($biography->status ?? 1) ? 'Visible' : 'Hidden' }}
                        </span>
                    </p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="status" value="1" class="sr-only peer" {{ ($biography->status ?? 1) ? 'checked' : '' }}>
                    <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:after:translate-x-full after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                </label>
            </div>
        </div>

        {{-- Section 2: Education Dynamic Fields --}}
        <div class="bg-white rounded-3xl border border-slate-100 shadow-xl overflow-hidden p-6 sm:p-10 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">2. Education History</h3>
                    <p class="text-xs text-slate-400">Manage academic qualifications linked to this biography.</p>
                </div>
                <button type="button" id="add-education-row" 
                        class="inline-flex items-center space-x-1 px-3 py-2 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-100 font-bold transition text-xs shadow-sm cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Add Qualification</span>
                </button>
            </div>

            {{-- Repeater Container --}}
            <div id="education-container" class="space-y-6">
                @php $eduIndex = 0; @endphp
                
                @if($biography->educations && $biography->educations->count() > 0)
                    @foreach($biography->educations as $education)
                        <div class="education-row bg-slate-50/50 rounded-2xl border border-slate-100 p-4 sm:p-6 relative transition hover:border-slate-200">
                            {{-- Pass existing education item ID --}}
                            <input type="hidden" name="educations[{{ $eduIndex }}][id]" value="{{ $education->id }}">

                            <div class="absolute top-4 right-4">
                                <button type="button" class="remove-education-row text-slate-400 hover:text-rose-500 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Degree / Certification</label>
                                    <input type="text" name="educations[{{ $eduIndex }}][degree]" value="{{ $education->degree }}" placeholder="e.g. B.Sc in Computer Science"
                                           class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Institution / Board</label>
                                    <input type="text" name="educations[{{ $eduIndex }}][institution]" value="{{ $education->institution }}" placeholder="e.g. Dhaka University"
                                           class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Result</label>
                                        <input type="text" name="educations[{{ $eduIndex }}][result]" value="{{ $education->result }}" placeholder="e.g. CGPA 3.85"
                                               class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                                </div>
                                    <div>
                                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Passing Year</label>
                                        <input type="text" name="educations[{{ $eduIndex }}][year]" value="{{ $education->year }}" placeholder="e.g. 2018"
                                               class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                                    </div>
                                </div>
                                <div class="md:col-span-3">
                                    <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Short Description (Optional)</label>
                                    <textarea name="educations[{{ $eduIndex }}][description]" rows="2" placeholder="Major achievements, projects, or thesis details..."
                                              class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">{{ $education->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        @php $eduIndex++; @endphp
                    @endforeach
                @else
                    {{-- Default empty state if no education records exist --}}
                    <div class="education-row bg-slate-50/50 rounded-2xl border border-slate-100 p-4 sm:p-6 relative transition hover:border-slate-200">
                        <div class="absolute top-4 right-4">
                            <button type="button" class="remove-education-row text-slate-400 hover:text-rose-500 transition hidden">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Degree / Certification</label>
                                <input type="text" name="educations[0][degree]" placeholder="e.g. B.Sc in Computer Science"
                                       class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Institution / Board</label>
                                <input type="text" name="educations[0][institution]" placeholder="e.g. Dhaka University"
                                       class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Result</label>
                                    <input type="text" name="educations[0][result]" placeholder="e.g. CGPA 3.85"
                                           class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Passing Year</label>
                                    <input type="text" name="educations[0][year]" placeholder="e.g. 2018"
                                           class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                                </div>
                            </div>
                            <div class="md:col-span-3">
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Short Description (Optional)</label>
                                <textarea name="educations[0][description]" rows="2" placeholder="Major achievements, projects, or thesis details..."
                                          class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition"></textarea>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Form Actions Footer --}}
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-4">
            <button type="submit"
                    class="w-full sm:flex-1 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-bold py-4 rounded-2xl transition shadow-lg shadow-amber-500/10 flex items-center justify-center space-x-2 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H17"></path>
                </svg>
                <span>Update Biography Records</span>
            </button>

            <a href="{{ route('admin.biography.index') }}"
               class="w-full sm:w-auto px-8 py-4 bg-slate-100 text-slate-500 text-center font-bold rounded-2xl hover:bg-slate-200 transition cursor-pointer">
                Cancel
            </a>
        </div>

    </form>
</div>

{{-- Scripts --}}
<script>
    // Image Preview Feature
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('preview');
                const icon = document.getElementById('placeholder-icon');
                output.src = reader.result;
                output.classList.remove('hidden');
                icon.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    // Dynamic Education Fields (Repeater logic safely syncs with blade index)
    let educationIndex = {{ $eduIndex > 0 ? $eduIndex : 1 }};
    const container = document.getElementById('education-container');
    const addButton = document.getElementById('add-education-row');

    addButton.addEventListener('click', () => {
        const newRow = document.createElement('div');
        newRow.className = 'education-row bg-slate-50/50 rounded-2xl border border-slate-100 p-4 sm:p-6 relative transition hover:border-slate-200 card-animate';
        newRow.innerHTML = `
            <div class="absolute top-4 right-4">
                <button type="button" class="remove-education-row text-slate-400 hover:text-rose-500 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Degree / Certification</label>
                    <input type="text" name="educations[${educationIndex}][degree]" placeholder="e.g. B.Sc in Computer Science"
                           class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Institution / Board</label>
                    <input type="text" name="educations[${educationIndex}][institution]" placeholder="e.g. Dhaka University"
                           class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Result</label>
                        <input type="text" name="educations[${educationIndex}][result]" placeholder="e.g. CGPA 3.85"
                               class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Passing Year</label>
                        <input type="text" name="educations[${educationIndex}][year]" placeholder="e.g. 2018"
                               class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition">
                    </div>
                </div>
                <div class="md:col-span-3">
                    <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Short Description (Optional)</label>
                    <textarea name="educations[${educationIndex}][description]" rows="2" placeholder="Major achievements, projects, or thesis details..."
                              class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:border-blue-500 transition"></textarea>
                </div>
            </div>
        `;
        
        container.appendChild(newRow);
        educationIndex++;
        toggleFirstRemoveButton();
    });

    // Handle Removing Row
    container.addEventListener('click', (e) => {
        if (e.target.closest('.remove-education-row')) {
            const row = e.target.closest('.education-row');
            row.remove();
            toggleFirstRemoveButton();
        }
    });

    function toggleFirstRemoveButton() {
        const rows = container.querySelectorAll('.education-row');
        if(rows.length === 0) return;
        const firstRowRemoveBtn = rows[0].querySelector('.remove-education-row');
        if (rows.length > 1) {
            firstRowRemoveBtn.classList.remove('hidden');
        } else {
            // If it's a structural default template row without explicit counts
            if(!rows[0].querySelector('input[type="hidden"]')) {
                firstRowRemoveBtn.classList.add('hidden');
            }
        }
    }
    
    // Run once on load to maintain single-row rules
    toggleFirstRemoveButton();
</script>

<style>
    .card-animate {
        animation: fadeIn 0.25s ease-out forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(6px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection