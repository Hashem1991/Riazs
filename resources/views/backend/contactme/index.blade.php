@extends('backend.layout.master')

@section('title', 'Messages | Admin Panel')

@section('content')
<div class="space-y-8">
    {{-- Header Section --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Inbox</h2>
            <p class="text-slate-500 text-sm">Manage messages received from your portfolio visitors.</p>
        </div>
        <div class="flex space-x-3">
             <span class="bg-blue-50 text-blue-600 px-4 py-2 rounded-xl text-xs font-bold">
                Total: {{ $messages->count() }}
             </span>
             <span class="bg-rose-50 text-rose-600 px-4 py-2 rounded-xl text-xs font-bold">
                Unread: {{ $messages->where('is_read', 0)->count() }}
             </span>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 text-slate-400 text-[11px] uppercase tracking-widest font-bold">
                    <tr>
                        <th class="px-8 py-4">Sender</th>
                        <th class="px-8 py-4">Subject</th>
                        <th class="px-8 py-4">Date</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-sm">
                    @forelse($messages as $message)
                    <tr class="hover:bg-slate-50/50 transition {{ $message->is_read ? '' : 'bg-blue-50/20' }}">
                        <td class="px-8 py-5">
                            <div class="font-bold text-slate-800">{{ $message->name }}</div>
                            <div class="text-[10px] text-slate-500">{{ $message->email }}</div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="font-semibold text-slate-700 truncate w-64" title="{{ $message->subject }}">
                                {{ $message->subject }}
                            </div>
                        </td>
                        <td class="px-8 py-5 text-slate-500">
                            {{ $message->created_at->format('d M, Y') }}
                        </td>
                        <td class="px-8 py-5">
                            @if(!$message->is_read)
                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-[10px] font-black uppercase">New</span>
                            @else
                                <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-[10px] font-black uppercase">Read</span>
                            @endif
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex justify-end space-x-2">
                                {{-- View Message Button --}}
                                <a href="{{ route('admin.messages.show', $message->id) }}" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>

                                {{-- Delete Message Form --}}
                                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-10 text-center text-slate-400 italic">
                            No messages found in your inbox.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Pagination Links (if applicable) --}}
        @if(method_exists($messages, 'links'))
            <div class="px-8 py-4 bg-slate-50/50 border-t border-slate-100">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
</div>
@endsection