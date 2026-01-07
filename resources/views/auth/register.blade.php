<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center py-6 bg-[#2C1E1B]">
        <div class="w-full sm:max-w-md overflow-hidden shadow-2xl rounded-lg">
            
            <div class="bg-[#1A0F0D] p-8 text-center border-b border-gray-800">
                <div class="flex justify-center mb-4">
                     <div class="h-24 w-24 rounded-full border-2 border-white overflow-hidden bg-white">
                        <img src="{{ asset('images/logo.png') }}" alt="TS Logo" class="h-full w-full object-cover">
                     </div>
                </div>
                <h2 class="text-white text-2xl font-bold tracking-widest uppercase">Join the Sisterhood</h2>
                <p class="text-[#E6A673] italic text-sm mt-1">Create an account to start ordering</p>
            </div>

            <div class="bg-white px-10 py-8">
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <x-label for="name" value="Name" class="text-gray-700 font-bold" />
                        <x-input id="name" class="block mt-1 w-full border-[#FADCC8]" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="Email" class="text-gray-700 font-bold" />
                        <x-input id="email" class="block mt-1 w-full border-[#FADCC8]" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div>
                        <x-label for="phone" value="Phone" class="text-gray-700 font-bold" />
                        <x-input id="phone" class="block mt-1 w-full border-[#FADCC8]" type="text" name="phone" :value="old('phone')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="Password" class="text-gray-700 font-bold" />
                        <x-input id="password" class="block mt-1 w-full border-[#F0F4FF]" type="password" name="password" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="Confirm Password" class="text-gray-700 font-bold" />
                        <x-input id="password_confirmation" class="block mt-1 w-full border-[#FADCC8]" type="password" name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <span class="text-[10px] text-gray-400 w-1/2 leading-tight">
                            By signing up, you agree to our terms and conditions.
                        </span>

                        <button type="submit" class="bg-[#E6A673] hover:bg-[#d48f5a] text-white font-bold py-2 px-6 rounded shadow uppercase tracking-widest transition">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>