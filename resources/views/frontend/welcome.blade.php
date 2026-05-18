@extends('frontend.layout.master')

@section('title', 'Portfolio | Md. Riazul Hoque - Electrical Engineer & PhD Researcher')

@section('content')

<!-- HERO SECTION -->
<section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

        <div class="relative z-10">
            
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 mb-8">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                <span class="text-[11px] font-bold text-blue-700 uppercase tracking-wider">
                    Currently Pursuing PhD
                </span>
            </div>

            <h1 class="text-5xl lg:text-[80px] font-black leading-[0.9] mb-8 text-slate-900">
                Engineering <br/>
                <span class="text-gradient">Solutions.</span><br/>
                Researching <span class="text-gradient">Futures.</span>
            </h1>

            <p class="text-lg text-slate-500 mb-10 max-w-lg leading-relaxed">
                আমি একজন ইলেকট্রিক্যাল ইঞ্জিনিয়ার এবং পিএইচডি গবেষক। দীর্ঘদিনের পেশাদার অভিজ্ঞতা ও গবেষণার সমন্বয়ে ইলেকট্রিক্যাল ডিজাইন এবং ইনফরমেশন সিকিউরিটির আধুনিক চ্যালেঞ্জ নিয়ে কাজ করছি।
            </p>

            <!-- CV BUTTONS -->
            <div class="flex flex-wrap gap-5">

                <a href="#expertise"
                   class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:shadow-2xl hover:shadow-blue-200 transition-all active:scale-95">
                    View Expertise
                </a>

                <!-- PDF DOWNLOAD -->
                <a href="{{ route('cv.pdf') }}"
                   class="px-8 py-4 border-2 border-slate-200 rounded-2xl font-bold hover:bg-slate-50 transition-all">
                    Download PDF CV
                </a>

                <!-- WORD DOWNLOAD -->
                <a href="{{ route('cv.word') }}"
                   class="px-8 py-4 bg-green-600 text-white rounded-2xl font-bold hover:shadow-xl transition-all">
                    Download Word CV
                </a>

            </div>
        </div>

        <div class="relative lg:h-[600px] flex items-center justify-center">
            <div class="absolute w-full h-full bg-gradient-to-tr from-blue-100 to-cyan-50 rounded-[40px] rotate-6 scale-95 opacity-50"></div>

            <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&w=800&q=80"
                 alt="Engineering Innovation"
                 class="relative rounded-[32px] shadow-2xl z-10 grayscale hover:grayscale-0 transition duration-700">
        </div>

    </div>
</section>

<!-- BIOGRAPHY -->
<section id="biography" class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-12 gap-12">

            <div class="lg:col-span-4">
                <h2 class="text-4xl font-black uppercase tracking-tighter text-slate-900">
                    Biography
                </h2>
                <p class="mt-4 text-blue-600 font-bold uppercase tracking-widest text-xs">
                    A Journey of Excellence
                </p>
            </div>

            <div class="lg:col-span-8 space-y-8">

                <p class="text-xl text-slate-600 leading-relaxed italic border-l-4 border-blue-600 pl-8">
                    "আমি বিশ্বাস করি প্রযুক্তির প্রকৃত সার্থকতা মানুষের সমস্যা সমাধানে। পিএইচডি গবেষণার মাধ্যমে আমি ইলেকট্রিক্যাল সিস্টেম এবং ডিজিটাল নিরাপত্তার সেতুবন্ধন তৈরিতে কাজ করছি।"
                </p>

                <div class="grid md:grid-cols-2 gap-8 text-slate-500 leading-relaxed">

                    <p>
                        একজন প্রফেশনাল ইলেকট্রিক্যাল ইঞ্জিনিয়ার হিসেবে আমি বহু বছর ধরে ইন্ডাস্ট্রিয়াল প্যানেল বোর্ড, সাব-স্টেশন ডিজাইন এবং ইলেকট্রিক্যাল সেফটি অডিট নিয়ে কাজ করছি।
                        বর্তমানে আমি পিএইচডি গবেষণায় কোয়ান্টাম কম্পিউটার প্রতিরোধী ক্রিপ্টোগ্রাফিক অ্যালগরিদম ও স্মার্ট গ্রিড সিকিউরিটি নিয়ে কাজ করছি।
                    </p>

                    <p>
                        মাস্টার্স ইন ইনফরমেশন সিকিউরিটি ডিগ্রি শেষ করার পর, আমার একাডেমিক এবং প্রফেশনাল ফোকাস এখন ইলেকট্রিক্যাল ডোমেইনে আধুনিক প্রযুক্তির সঠিক ও নিরাপদ ব্যবহার নিশ্চিত করা।
                    </p>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- EXPERTISE -->
<section id="expertise" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col items-center text-center mb-16">
            <h2 class="text-4xl font-black uppercase text-slate-900">
                Expertise & Services
            </h2>
            <div class="w-16 h-1.5 bg-blue-600 mt-4"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="p-10 rounded-3xl bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl hover:border-blue-200 transition-all duration-300">
                <div class="text-blue-600 mb-6 font-bold text-4xl">01</div>
                <h3 class="text-xl font-bold mb-4">Electrical Design</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    আবাসিক ও বাণিজ্যিক ভবনের জন্য BNBC কোড অনুযায়ী আধুনিক এবং নিরাপদ ইলেকট্রিক্যাল লেআউট ডিজাইন।
                </p>
            </div>

            <div class="p-10 rounded-3xl bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl hover:border-blue-200 transition-all duration-300">
                <div class="text-blue-600 mb-6 font-bold text-4xl">02</div>
                <h3 class="text-xl font-bold mb-4">Safety Audit</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    ইন্ডাস্ট্রিয়াল প্রজেক্টের জন্য ইলেকট্রিক্যাল সেফটি অডিট এবং আর্থিং সিস্টেমের আধুনিকায়ন পরামর্শ।
                </p>
            </div>

            <div class="p-10 rounded-3xl bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl hover:border-blue-200 transition-all duration-300">
                <div class="text-blue-600 mb-6 font-bold text-4xl">03</div>
                <h3 class="text-xl font-bold mb-4">PhD Research</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    ক্রিপ্টোগ্রাফি এবং নেটওয়ার্ক সিকিউরিটি নিয়ে গবেষণা ও প্রফেশনাল একাডেমিক সাপোর্ট প্রদান।
                </p>
            </div>

        </div>

    </div>
</section>

@endsection