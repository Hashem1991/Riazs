@extends('backend.layout.master')

@section('title', 'Edit Research Paper | Admin Panel')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-50 bg-blue-50/30">
            <h2 class="text-xl font-bold text-slate-900">Update Research Details</h2>
            <p class="text-slate-500 text-sm">Modify existing publication data.</p>
        </div>
        <form action="#" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Paper Title</label>
                    <input type="text" name="title" value="Post-Quantum Cryptography & Digital Signatures" class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Journal / Conference Name</label>
                    <input type="text" name="publisher" value="IEEE International Conference" class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Abstract / Summary</label>
                    <textarea name="abstract" rows="5" class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition">Exploring the efficiency of lattice-based signatures in modern networks...</textarea>
                </div>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl transition shadow-lg shadow-blue-200">
                    Update Paper
                </button>
                <a href="#" class="px-8 py-3.5 bg-slate-100 text-slate-500 font-bold rounded-xl hover:bg-slate-200 transition">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection