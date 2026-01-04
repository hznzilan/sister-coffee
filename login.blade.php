<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Sisters Coffee - Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #C4A493; } /* Light Tan Background */
        .glass-card { 
            background-color: #2D0B04; /* Deep Coffee Dark */
            border-radius: 50px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .btn-coffee { 
            background-color: #E6A26B; 
            color: white; 
            transition: all 0.3s ease;
        }
        .btn-coffee:hover {
            background-color: #d48e56;
            transform: translateY(-2px);
        }
        .input-pill {
            background: transparent;
            border: 1.5px solid rgba(255, 255, 255, 0.7);
            color: white;
            border-radius: 999px;
        }
        .input-pill:focus {
            border-color: #E6A26B;
            ring: 2px;
            ring-color: #E6A26B;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center font-sans antialiased p-6">

    <div class="w-full max-w-[450px] glass-card overflow-hidden">
        
        <div class="flex flex-col items-center pt-12 px-8">
            <div class="w-28 h-28 bg-white rounded-full flex items-center justify-center mb-6 shadow-inner">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20">
            </div>
            
            <h1 class="text-white text-3xl font-extrabold tracking-widest text-center uppercase">The Sisters Coffee</h1>
            <p class="text-white italic text-sm mt-2 mb-10 opacity-90">"Best coffee in Mahallah"</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="px-12 pb-14">
            @csrf

            <div class="mb-6">
                <label for="email" class="text-white text-xs font-semibold ml-5 mb-2 block uppercase tracking-wider">Email Address</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                    class="w-full input-pill px-6 py-3.5 outline-none text-sm">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300 text-xs" />
            </div>

            <div class="mb-3">
                <label for="password" class="text-white text-xs font-semibold ml-5 mb-2 block uppercase tracking-wider">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full input-pill px-6 py-3.5 outline-none text-sm">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300 text-xs" />
            </div>

            <div class="flex justify-end mb-8">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-white text-[11px] hover:text-orange-200 transition underline">
                        Forgot Password? Click Here
                    </a>
                @endif
            </div>

            <button type="submit" class="w-full btn-coffee py-4 rounded-2xl font-bold text-lg uppercase tracking-widest shadow-lg">
                Login
            </button>

            <div class="mt-8 text-center">
                <p class="text-white text-xs opacity-80">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="underline font-bold text-white hover:text-orange-200 transition">Sign Up Now!</a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>
