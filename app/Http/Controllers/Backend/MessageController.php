<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;



class MessageController extends Controller
{
    public function index(){
       $messages = ContactMessage::latest()->get();
       return view('backend.contactme.index', compact('messages'));
    }

   public function show($id)
{
    // ডাটাবেজ থেকে আইডি অনুযায়ী মেসেজটি খুঁজে বের করা
    $message = ContactMessage::findOrFail($id);

    // মেসেজটি পড়া হয়েছে হিসেবে মার্ক করা (is_read কলাম আপডেট)
    $message->update(['is_read' => true]);

    // ভিউতে ভেরিয়েবলটি পাস করা (এখানেই আপনার ভুলটি ছিল)
    return view('backend.contactme.show', compact('message'));
}
    public function destroy($id){
        ContactMessage::findOrFail($id)->delete();
        return back()-> with ('Success', 'Message Deleted Successfully' );
    }
   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'nullable|string|max:255',
        'message' => 'required',
        'mobile' => 'nullable|string|max:20',
    ]);

    ContactMessage::create($validated);

    return back()->with('success', 'আপনার মেসেজ সফলভাবে পাঠানো হয়েছে!');
}
}
