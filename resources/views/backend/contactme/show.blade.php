@extends('backend.layout.master')

@section('title', 'Message Details | Admin Panel')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    {{-- Navigation & Actions --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.messages.index') }}" class="group flex items-center text-slate-500 hover:text-slate-900 transition-colors">
            <div class="p-2 bg-white rounded-xl border border-slate-100 group-hover:border-slate-200 shadow-sm mr-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </div>
            <span class="text-sm font-bold tracking-wide uppercase">Back to Inbox</span>
        </a>

        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="flex items-center bg-rose-50 text-rose-600 px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-rose-100 transition-all">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                Delete Message
            </button>
        </form>
    </div>

    {{-- Message Content Card --}}
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        {{-- Header Info --}}
        <div class="p-8 md:p-12 border-b border-slate-50 bg-slate-50/30">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-cyan-500 rounded-2xl flex items-center justify-center text-white text-2xl font-black shadow-lg shadow-emerald-200">
                        {{ strtoupper(substr($message->name, 0, 1)) }}
                    </div>
                    <div class="ml-5">
                        <h2 class="text-2xl font-black text-slate-900">{{ $message->name }}</h2>
                        <p class="text-slate-500 font-medium">{{ $message->email }}</p>
                    </div>
                </div>
                <div class="text-left md:text-right">
                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Received On</div>
                    <div class="text-slate-900 font-bold">{{ $message->created_at->format('d M, Y — h:i A') }}</div>
                </div>
            </div>
        </div>

        {{-- Meta Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 border-b border-slate-50">
            <div class="p-8 border-b md:border-b-0 md:border-r border-slate-50">
                <div class="text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em] mb-2">Subject</div>
                <p class="text-lg font-bold text-slate-800">{{ $message->subject ?? 'No Subject Provided' }}</p>
            </div>
            <div class="p-8">
                <div class="text-[10px] font-black text-blue-500 uppercase tracking-[0.2em] mb-2">Mobile Number</div>
                <p class="text-lg font-bold text-slate-800">{{ $message->mobile ?? 'Not Provided' }}</p>
            </div>
        </div>

        {{-- Message Body --}}
        <div class="p-8 md:p-12">
            <div class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-6">Message Content</div>
            <div class="prose prose-slate max-w-none">
                <p class="text-slate-600 text-lg leading-relaxed whitespace-pre-line">
                    {{ $message->message }}
                </p>
            </div>
        </div>

        {{-- Footer Actions --}}
        <div class="p-8 bg-slate-50/50 border-t border-slate-50 flex flex-wrap gap-4">
            <a href="mailto:{{ $message->email }}" class="inline-flex items-center bg-[#030712] text-white px-8 py-4 rounded-2xl font-bold text-sm transition-all hover:bg-emerald-600 shadow-lg shadow-slate-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                Reply via Email
            </a>
            
            @if($message->mobile)
            <a href="tel:{{ $message->mobile }}" class="inline-flex items-center bg-white border border-slate-200 text-slate-700 px-8 py-4 rounded-2xl font-bold text-sm transition-all hover:bg-slate-50">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                Call Sender
            </a>
            @endif
        </div>
    </div>
</div>
@endsection