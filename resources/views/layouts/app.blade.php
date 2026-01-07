<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>The Sisters Coffee</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    </head>
    <body class="font-sans antialiased bg-[#FDF8F3]">
        
        <header class="bg-[#1A0F0D] text-white shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo.png') }}" 
     class="h-10 w-10 aspect-square object-cover rounded-full ">
                        <span class="font-bold tracking-widest uppercase text-sm">The Sisters Coffee</span>
                    </div>

<nav class="flex items-center space-x-4 sm:space-x-8 text-[10px] sm:text-xs font-bold uppercase tracking-widest">
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#E6A673]' : 'hover:text-[#E6A673]' }} transition">Home</a>
    
    <a href="{{ route('user.orders') }}" class="{{ request()->routeIs('user.orders') ? 'text-[#E6A673]' : 'hover:text-[#E6A673]' }} transition">My Orders</a>
    
    <a href="{{ route('user.cart') }}" class="{{ request()->routeIs('user.cart') ? 'text-[#E6A673]' : 'hover:text-[#E6A673]' }} transition">My Cart</a>

    <a href="{{ route('profile.show') }}" class="{{ request()->routeIs('profile.show') ? 'text-[#E6A673]' : 'hover:text-[#E6A673]' }} transition flex items-center group">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 border-2 border-transparent group-hover:border-[#E6A673] rounded-full p-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
    </svg>
    <span class="ml-2 md:hidden">Profile</span> </a>
    
    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf
        <button type="submit" @click.prevent="$root.submit();" class="text-red-400 hover:text-red-500 transition uppercase">
            Logout
        </button>
    </form>
</nav>

                    <div class="md:hidden text-gray-400">
                         <p class="text-[10px]">{{ Auth::user()->name }}</p>
                    </div>

                </div>
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>

    <footer class="bg-[#1A0F0D] text-gray-400 py-12 mt-12 border-t border-[#E6A673]/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                
                <div class="text-left">
                    <h3 class="text-[#E6A673] font-bold tracking-widest uppercase mb-4">The Sisters Coffee</h3>
                    <div class="space-y-2 text-sm">
                        <p class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#E6A673]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Cafe Ruqayyah, Mahallah Ruqayyah, IIUM Gombak
                        </p>
                        <p class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#E6A673]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            sisterscoffee@gmail.com
                        </p>
                        <p class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#E6A673]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            +60 13-4158879 (Zila)
                        </p>
                    </div>
                    <div class="flex space-x-5 mt-6">
    <a href="https://www.tiktok.com/@thesisterscoffee_?_r=1&_t=ZS-92sFvYH14Uu" target="_blank" class="text-gray-400 hover:text-[#E6A673] transition-all">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.17-2.89-.6-4.09-1.47-.88-.64-1.61-1.47-2.11-2.44v10.33c0 2.09-.8 4.15-2.28 5.56-1.57 1.53-3.88 2.21-6.03 1.83-2.31-.42-4.41-2.11-5.2-4.32-.98-2.67-.18-5.87 2.01-7.75 1.4-1.22 3.25-1.85 5.1-1.74v4.03c-1.12-.11-2.3.26-3.1 1.05-.85.83-1.07 2.15-.55 3.22.48 1.07 1.6 1.81 2.77 1.83 1.34.03 2.63-.87 3.03-2.14.12-.4.18-.81.18-1.23V0h.02z"/>
        </svg>
    </a>

    <a href="https://www.instagram.com/thesisterscoffee?igsh=MXN3c2ltaGl4M3ViZg==" target="_blank" class="text-gray-400 hover:text-[#E6A673] transition-all">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path>
            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
        </svg>
    </a>
</div>
                </div>

                <div class="md:text-right">
                    <h3 class="text-[#E6A673] font-bold tracking-widest uppercase mb-4">Navigation</h3>
                    <ul class="space-y-2 text-sm font-medium">
                        <li><a href="{{ route('home') }}" class="hover:text-[#E6A673] transition">Home</a></li>
                        <li><a href="{{ route('user.orders') }}" class="hover:text-[#E6A673] transition">My Orders</a></li>
                        <li><a href="{{ route('user.cart') }}" class="hover:text-[#E6A673] transition">My Cart</a></li>
                        <li><a href="{{ route('profile.show') }}" class="hover:text-[#E6A673] transition">Profile Information</a></li>
                    </ul>
                </div>

            </div>

            <div class="mt-12 border-t border-gray-800 pt-8 text-center text-[10px] tracking-widest uppercase">
                &copy; 2026 The Sisters Coffee. All Rights Reserved.
            </div>
        </div>
    </footer>

    </body>
</html>