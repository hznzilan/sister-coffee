<x-guest-layout>
    <div class="min-h-screen bg-[#2C1E1B] flex flex-col items-center justify-center">
        
        <div class="text-center">
            <div class="flex justify-center mb-6">
                <div class="h-32 w-32 rounded-full border-4 border-[#E6A673] overflow-hidden bg-white shadow-2xl">
                    <img src="/images/logo.png" alt="TS Logo" class="h-full w-full object-cover">
                </div>
            </div>

            <h1 class="text-white text-4xl font-bold tracking-[0.2em] uppercase">The Sisters Coffee</h1>
            <p class="text-[#E6A673] italic text-lg mt-2 mb-10">"Best coffee in Mahallah"</p>

            <div class="flex flex-col space-y-4 w-64 mx-auto">
                <a href="{{ route('login') }}" 
                   class="bg-[#E6A673] hover:bg-[#d48f5a] text-white font-bold py-3 px-8 rounded-lg shadow-lg uppercase tracking-widest transition text-center">
                    Log In
                </a>
                
                <a href="{{ route('register') }}" 
                   class="bg-transparent border-2 border-[#E6A673] text-[#E6A673] hover:bg-[#E6A673] hover:text-white font-bold py-3 px-8 rounded-lg shadow-lg uppercase tracking-widest transition text-center">
                    Register
                </a>
            </div>
        </div>

        <div class="absolute bottom-10 text-gray-500 text-xs tracking-widest uppercase">
            Est. 2024 • Handcrafted with love
        </div>
    </div>
</x-guest-layout>