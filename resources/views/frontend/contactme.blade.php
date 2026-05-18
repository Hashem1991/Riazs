@extends('frontend.layout.master')

@section('title', 'Research & Publications | Md. Riazul Hoque')

@section('content')

{{-- HERO SECTION --}}
<section class="py-24 bg-[#030712] relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-emerald-600/20 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="container mx-auto px-6 text-center relative z-10">
        <span class="inline-block bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[0.2em] mb-6">
            Academic Contributions
        </span>

        <h1 class="text-5xl md:text-7xl font-black text-white leading-tight tracking-tighter">
            Research & <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400">Publications</span>
        </h1>

        <p class="mt-8 text-slate-400 max-w-2xl mx-auto text-lg leading-relaxed font-medium">
            Exploring Post-Quantum Cryptography and Information Security.
        </p>
    </div>
</section>

{{-- RESEARCH SECTION --}}
<section class="py-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-5xl mx-auto space-y-12">

            {{-- ITEM 1 --}}
            <div class="group bg-slate-50 p-8 md:p-12 rounded-[2.5rem] border border-slate-100 hover:border-emerald-500/30 transition-all duration-500">
                <h3 class="text-2xl md:text-3xl font-black text-slate-900 group-hover:text-emerald-600 transition-colors">
                    Lattice-Based Digital Signature Schemes
                </h3>
                <p class="text-slate-500 mt-4 leading-relaxed">
                    Research on post-quantum cryptography efficiency and its practical implementation in modern network security.
                </p>
            </div>

            {{-- ITEM 2 --}}
            <div class="bg-[#0f172a] p-8 md:p-12 rounded-[2.5rem] border border-slate-800 hover:border-blue-500/30 transition-all duration-500">
                <h3 class="text-2xl md:text-3xl font-black text-white">
                    Quantum-Resistant RSA
                </h3>
                <p class="text-slate-400 mt-4 leading-relaxed">
                    Hybrid cryptographic system designed for secure legacy systems against future quantum computing threats.
                </p>
            </div>

        </div>
    </div>
</section>

{{-- CONTACT FORM --}}
<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-6">
        <div class="max-w-5xl mx-auto bg-white rounded-[3rem] shadow-2xl shadow-slate-200/50 overflow-hidden">
            <div class="p-12 md:p-16">
                
                <div class="mb-12">
                    <h2 class="text-3xl font-black text-slate-900">Get in Touch</h2>
                    <p class="text-slate-500 mt-2">Have a question about my research? Send a message below.</p>
                </div>

                {{-- SUCCESS MESSAGE --}}
                @if(session('success'))
                    <div class="mb-8 p-5 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl flex items-center animate-bounce">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-bold">{{ session('success') }}</span>
                    </div>
                @endif

                {{-- FORM --}}
                <form action="{{ route('messages.store') }}" method="POST" class="space-y-7">
                    @csrf

                    <div class="grid md:grid-cols-3 gap-6">
                        {{-- Name --}}
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Full Name</label>
                            <input type="text" name="name" placeholder="John Doe" required 
                                class="w-full p-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/5 focus:border-emerald-500 outline-none transition-all">
                        </div>

                        {{-- Email --}}
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Address</label>
                            <input type="email" name="email" placeholder="john@example.com" required 
                                class="w-full p-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/5 focus:border-emerald-500 outline-none transition-all">
                        </div>

                        {{-- Mobile (New Column) --}}
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Mobile Number</label>
                            <input type="text" name="mobile" placeholder="+880..." 
                                class="w-full p-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/5 focus:border-emerald-500 outline-none transition-all">
                        </div>
                    </div>

                    {{-- Subject --}}
                    <div class="space-y-2">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Subject</label>
                        <select name="subject" class="w-full p-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/5 focus:border-emerald-500 outline-none transition-all appearance-none">
                            <option value="Research Collaboration">Research Collaboration</option>
                            <option value="Data Request">Data Request</option>
                            <option value="General Inquiry">General Inquiry</option>
                        </select>
                    </div>

                    {{-- Message --}}
                    <div class="space-y-2">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Detailed Message</label>
                        <textarea name="message" rows="5" placeholder="Write your message here..." required 
                            class="w-full p-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-emerald-500/5 focus:border-emerald-500 outline-none transition-all"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-[#030712] hover:bg-emerald-600 text-white py-5 rounded-2xl font-black text-xs uppercase tracking-[0.3em] transition-all duration-300 shadow-xl hover:shadow-emerald-500/20 active:scale-[0.98]">
                        Send Message
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>

@endsection