<x-app-layout>
@if(session()->has('success'))
    <script>
        alert("{{ session()->get('success') }}");
    </script>
@endif

@if(session()->has('order_success'))
    <script>
        alert("{{ session()->get('order_success') }}");
    </script>
    @endif

<div class="py-6 bg-[#FDF8F3] min-h-screen pb-24"> <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-6">
            </div>

            <form action="{{ route('home') }}" method="GET">
    <div class="relative mb-8">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Coffee..." class="w-full bg-[#1A0F0D] text-white rounded-2xl py-4 pl-12 border-none">
        <button type="submit" class="absolute left-4 top-4">
            <svg class="w-5 h-5 text-white-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </button>
    </div>
</form>

           <div class="bg-[#1A0F0D] rounded-[3rem] p-10 flex flex-col md:flex-row items-center justify-between text-white mb-10 shadow-2xl overflow-hidden relative">
                <div class="z-10">
                    <h1 class="text-4xl font-bold tracking-[0.2em] uppercase">The Sisters Coffee</h1>
                    <p class="text-[#E6A673] italic text-lg mt-2">"Best coffee in Mahallah"</p>
                    <div class="mt-6 flex items-center text-sm text-gray-400">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>At Cafe Ruqayyah as usual, 12PM - 9PM everyday.</span>
                    </div>
                </div>
                <img src="{{ asset('images/logo.png') }}" 
                class="hidden lg:block h-48 w-48 aspect-square object-cover rounded-full opacity-90 shadow-lg">
            </div>
            
            <div class="flex overflow-x-auto space-x-3 mb-8 no-scrollbar pb-2">
    <a href="{{ route('home') }}" 
       class="{{ !request('category') ? 'bg-[#B36B39] text-white' : 'bg-white text-gray-600' }} flex-none px-6 py-2 rounded-xl font-bold shadow-sm">
       All
    </a>

    <a href="{{ route('home', ['category' => 'Coffee Series']) }}" 
       class="{{ request('category') == 'Coffee Series' ? 'bg-[#B36B39] text-white' : 'bg-white text-gray-600' }} flex-none px-6 py-2 rounded-xl font-bold shadow-sm">
       Coffee Series
    </a>

    <a href="{{ route('home', ['category' => 'Non-Coffee Series']) }}" 
       class="{{ request('category') == 'Non-Coffee Series' ? 'bg-[#B36B39] text-white' : 'bg-white text-gray-600' }} flex-none px-6 py-2 rounded-xl font-bold shadow-sm">
       Non-Coffee
    </a>

    <a href="{{ route('home', ['category' => 'Sparkling']) }}" 
   class="{{ request('category') == 'Sparkling' ? 'bg-[#B36B39] text-white' : 'bg-white text-gray-600' }} flex-none px-6 py-2 rounded-xl font-bold shadow-sm">
   Sparkling
</a>

</div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                @foreach($coffees as $coffee)
                <div class="bg-white p-3 rounded-[2rem] shadow-sm hover:shadow-md transition">
                    <div class="relative mb-3">
                        <img src="{{ asset('coffee_img/' . $coffee->image) }}" class="w-full h-32 md:h-48 object-cover rounded-[1.5rem]">
                        <span class="absolute top-2 left-2 bg-black/40 backdrop-blur-sm text-white text-[10px] px-2 py-0.5 rounded-full">⭐ 4.8</span>
                    </div>
                    <h3 class="font-bold text-sm md:text-lg text-[#1A0F0D] truncate">{{ $coffee->name }}</h3>
                    <div class="flex justify-between items-center mt-2">
                        <span class="font-bold text-[#1A0F0D]">RM {{ number_format($coffee->price, 2) }}</span>
                        
                        <form action="{{ url('add_cart', $coffee->id) }}" method="POST">
                            @csrf <button type="submit" class="bg-[#B36B39] text-white p-2 rounded-lg shadow-sm hover:bg-[#1A0F0D] transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>