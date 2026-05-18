@extends('backend.layout.master')

@section('title', 'Admin Dashboard | Md. Riazul Hoque')

@section('content')
<div class="space-y-8">
    {{-- Top Header Section --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Dashboard Overview</h2>
            <p class="text-slate-500 text-sm">Welcome back, Md. Riazul Hoque! manage your portfolio content here.</p>
        </div>
        <div class="text-sm font-medium text-slate-500 bg-white px-4 py-2 rounded-lg border border-slate-200 shadow-sm">
            {{ now()->format('D, d M Y') }}
        </div>
    </div>

    {{-- Content Management Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800">About Me</h3>
            </div>
            <p class="text-slate-500 text-xs mb-4">Update your personal summary and profile details.</p>
            <a href="#" class="text-blue-600 text-xs font-bold hover:underline flex items-center">Manage Section <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg></a>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center group-hover:bg-purple-600 group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800">Biography</h3>
            </div>
            <p class="text-slate-500 text-xs mb-4">Edit your educational background and career timeline.</p>
            <a href="#" class="text-purple-600 text-xs font-bold hover:underline flex items-center">Manage Section <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg></a>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center group-hover:bg-amber-600 group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.989-2.386l-.548-.547z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800">Expertise</h3>
            </div>
            <p class="text-slate-500 text-xs mb-4">Update your technical skills and area of expertise.</p>
            <a href="#" class="text-amber-600 text-xs font-bold hover:underline flex items-center">Manage Section <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg></a>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800">Research Papers</h3>
            </div>
            <p class="text-slate-500 text-xs mb-4">Manage and publish your academic research work.</p>
            <a href="#" class="text-emerald-600 text-xs font-bold hover:underline flex items-center">Manage Section <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg></a>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center group-hover:bg-rose-600 group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800">Contact Inquiries</h3>
            </div>
            <p class="text-slate-500 text-xs mb-4">View messages received from your portfolio visitors.</p>
            <a href="#" class="text-rose-600 text-xs font-bold hover:underline flex items-center">View Messages <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg></a>
        </div>

    </div>

    {{-- Recent Messages/Activity Table can go here --}}
</div>
@endsection