<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Control Center | Riazul Hoque')</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        
        /* কাস্টম স্ক্রলবার */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }

        /* একটিভ লিঙ্কের জন্য গ্লো ইফেক্ট */
        .sidebar-link.active {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
            box-shadow: 0 10px 20px -5px rgba(37, 99, 235, 0.4);
        }
        .sidebar-link.active svg { color: white; }
        
        /* গ্লাস মরফিজম কার্ড */
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-900 antialiased" x-data="{ mobileMenu: false }">

<div class="flex min-h-screen relative">

    {{-- Mobile Overlay --}}
    <div x-show="mobileMenu" @click="mobileMenu = false" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[60] lg:hidden" x-cloak></div>

    {{-- Sidebar --}}
    <aside :class="mobileMenu ? 'translate-x-0' : '-translate-x-full'" 
           class="fixed inset-y-0 left-0 w-72 bg-white border-r border-slate-100 z-[70] transition-transform duration-300 ease-in-out lg:translate-x-0 lg:sticky lg:top-0 h-screen flex flex-col shadow-2xl shadow-slate-200/50 lg:shadow-none">

        {{-- Logo Section --}}
        <div class="h-24 flex items-center px-8">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="text-xl font-extrabold tracking-tight text-slate-900">
                    Admin<span class="text-blue-600">Pro</span>
                </span>
            </div>
        </div>

        {{-- Nav Links --}}
        <nav class="flex-1 px-6 py-4 space-y-1.5 overflow-y-auto">
            <p class="px-3 text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] mb-4">Analytics</p>
            
            <a href="{{ url('admin/dashboard') }}" class="sidebar-link active flex items-center space-x-3 px-4 py-3 rounded-2xl font-bold transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span>Dashboard</span>
            </a>

            <p class="px-3 text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] pt-8 mb-4">Portfolio Content</p>

            @php
                $menuItems = [
                    ['url' => 'admin/about', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'label' => 'About Profile'],
                    ['url' => 'admin/biography', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'label' => 'Biography'],
                    ['url' => 'admin/expertise', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'label' => 'Expertise'],
                    ['url' => 'admin/research', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'label' => 'Publications'],
                    ['url' => 'admin/messages', 'icon' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z', 'label' => 'Messages'],
                ];
            @endphp

            @foreach($menuItems as $item)
                <a href="{{ url($item['url']) }}" 
                   class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 hover:text-blue-600 transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path></svg>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        {{-- User Profile Section --}}
        <div class="p-6">
            <div class="bg-slate-900 rounded-[2rem] p-6 text-white relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-500/20 rounded-full blur-2xl group-hover:bg-blue-500/40 transition-all"></div>
                
                <div class="flex items-center space-x-4 relative z-10">
                    <img src="https://ui-avatars.com/api/?name=Riazul+Hoque&background=fff&color=2563eb" class="w-12 h-12 rounded-2xl border-2 border-white/10 shadow-inner">
                    <div class="flex-1">
                        <p class="text-sm font-black truncate">Riazul Hoque</p>
                        <p class="text-[10px] text-blue-400 font-bold uppercase tracking-wider">Super Admin</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.logout') }}" class="mt-6">
                    @csrf
                    <button type="submit"
                        class="w-full py-3 bg-white/10 hover:bg-white/20 rounded-xl text-xs font-bold transition-all flex items-center justify-center space-x-2">
                        
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>

                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Main Content Area --}}
    <div class="flex-1 flex flex-col min-h-screen max-w-full">

        {{-- Sticky Header --}}
        <header class="h-24 sticky top-0 bg-[#f8fafc]/80 backdrop-blur-md z-40 flex items-center justify-between px-6 lg:px-12 border-b border-slate-200/50">
            <div class="flex items-center space-x-4">
                <button @click="mobileMenu = true" class="lg:hidden p-3 bg-white rounded-xl border border-slate-200 text-slate-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div>
                    <h1 class="text-sm font-black text-slate-400 uppercase tracking-[0.2em]">Welcome Back</h1>
                    <p class="text-xl font-extrabold text-slate-900">Control Center Overview</p>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <div class="hidden md:flex flex-col items-end mr-4">
                    <span class="text-[10px] font-black text-emerald-500 uppercase tracking-widest bg-emerald-50 px-3 py-1 rounded-full">System Online</span>
                </div>
                <button class="p-3 bg-white rounded-2xl border border-slate-200 text-slate-400 hover:text-blue-600 hover:border-blue-200 transition-all shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="p-6 lg:p-12 flex-1">
            <div class="animate-in fade-in slide-in-from-bottom-4 duration-700">
                @yield('content')
            </div>
        </main>

        <footer class="px-12 py-8 text-sm text-slate-400 flex flex-col md:flex-row justify-between items-center border-t border-slate-200/50">
            <p font-bold uppercase tracking-widest>Built with Laravel & Tailwind</p>
            <p>© {{ date('Y') }} Md. Riazul Hoque. Information Security Specialist.</p>
        </footer>

    </div>
</div>

</body>
</html>