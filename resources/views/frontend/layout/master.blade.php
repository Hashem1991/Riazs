<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- ডাইনামিক টাইটেল --}}
    <title>@yield('title', 'Professional Portfolio')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="text-xl font-bold tracking-tighter text-blue-600">
                        PORTFOLIO<span class="text-slate-800">.</span>
                    </a>
                </div>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center space-x-10 text-[12px] font-semibold uppercase tracking-[0.15em] text-slate-500">
                    <a href="{{ url('/') }}" class="relative group py-2 transition duration-300 hover:text-blue-600">
                        Home
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="{{ route('about') }}" class="relative group py-2 transition duration-300 hover:text-blue-600">
                        About Me
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="{{ route('biography.front') }}" class="relative group py-2 transition duration-300 hover:text-blue-600">
                        Biography
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="{{ route('research.front') }}" class="relative group py-2 transition duration-300 hover:text-blue-600">
                        Research
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="{{ route('expertise.front') }}" class="relative group py-2 transition duration-300 hover:text-blue-600">
                        Expertise
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="{{ route('contact') }}" class="px-6 py-2.5 border border-slate-200 rounded-full hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all duration-500 shadow-sm">
                        Contact Me
                    </a>

                    {{-- Profile Dropdown --}}
                    <div class="relative" x-data="{ dropdownOpen: false }">
                        <button @click="dropdownOpen = !dropdownOpen" 
                                class="flex items-center space-x-2 p-1 pr-3 rounded-full hover:bg-slate-50 transition-all duration-200 focus:outline-none border border-transparent hover:border-slate-100">
                            <img src="https://ui-avatars.com/api/?name=Riazul+Hoque&background=2563eb&color=fff"
                                 class="w-9 h-9 rounded-full object-cover ring-2 ring-white shadow-md">
                            <svg class="w-4 h-4 text-slate-400 transition-transform duration-300" :class="dropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="dropdownOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             @click.away="dropdownOpen = false"
                             class="absolute right-0 mt-3 w-60 bg-white rounded-2xl shadow-2xl border border-slate-100 py-2 z-50 overflow-hidden"
                             style="display: none;">
                            
                            <div class="px-5 py-4 mb-1 border-b border-slate-50 bg-slate-50/50">
                                <p class="text-[10px] text-slate-400 tracking-[0.2em] font-bold">SIGNED IN AS</p>
                                <p class="text-[14px] text-slate-800 font-bold truncate">Riazul Hoque</p>
                            </div>

                            

                            <div class="border-t border-slate-50 my-1"></div>

              <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-5 py-3 text-sm font-semibold text-red-600 hover:bg-red-50 transition-all duration-200">
                    
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </button>
            </form>
                        </div>
                    </div>
                </div>

                {{-- Mobile Menu Icon --}}
                <div class="md:hidden flex items-center">
                    <button class="text-slate-600 hover:text-blue-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>

            </div>
        </div>
    </nav>

    {{-- মূল কন্টেন্ট এখানে লোড হবে --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer চাইলে এখানে দিতে পারেন --}}
{{-- FOOTER SECTION --}}
    <footer class="bg-[#030712] text-white pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                
                {{-- Brand Column --}}
                <div class="col-span-1 md:col-span-1">
                    <a href="{{ url('/') }}" class="text-2xl font-black tracking-tighter text-blue-500 mb-6 block">
                        PORTFOLIO<span class="text-white">.</span>
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">
                        Information Security এবং Software Development-এর সমন্বয়ে আধুনিক ও নিরাপদ ডিজিটাল সমাধান তৈরিতে আমি নিবেদিত।
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-blue-500 mb-8">Quick Navigation</h4>
                    <ul class="space-y-4 text-sm font-semibold text-slate-400">
                        <li><a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Me</a></li>
                        <li><a href="{{ route('biography.front') }}" class="hover:text-white transition-colors">Biography</a></li>
                        <li><a href="{{ route('research.front') }}" class="hover:text-white transition-colors">Research Papers</a></li>
                    </ul>
                </div>

                {{-- Services/Expertise --}}
                <div>
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-blue-500 mb-8">Core Expertise</h4>
                    <ul class="space-y-4 text-sm font-semibold text-slate-400">
                        <li><a href="#" class="hover:text-white transition-colors">Cyber Security</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Web Development</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Mobile App Dev</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Network Security</a></li>
                    </ul>
                </div>

                {{-- Contact Info --}}
                <div>
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-blue-500 mb-8">Get In Touch</h4>
                    <ul class="space-y-5 text-sm font-semibold">
                        <li class="flex items-start space-x-4">
                            <span class="text-blue-500"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="text-slate-400">Azimpur, Dhaka, Bangladesh</span>
                        </li>
                        <li class="flex items-center space-x-4">
                            <span class="text-blue-500"><i class="fas fa-envelope"></i></span>
                            <a href="mailto:contact@example.com" class="text-slate-400 hover:text-white">riazul.hoque@example.com</a>
                        </li>
                        <li class="flex items-center space-x-4">
                            <span class="text-blue-500"><i class="fas fa-phone-alt"></i></span>
                            <span class="text-slate-400">+880 1XXX-XXXXXX</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">
                    &copy; {{ date('Y') }} Md. Riazul Hoque. All Rights Reserved.
                </p>
                <div class="flex items-center space-x-6 text-[10px] font-black uppercase tracking-[0.15em] text-slate-500">
                    <a href="#" class="hover:text-blue-500 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-blue-500 transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- FontAwesome Icons (যদি অলরেডি না থাকে) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>