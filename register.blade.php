<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join The Sisters - Sign Up</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #C4A493; } /* Light Tan Background */
        
        .glass-card { 
            background-color: #2D0B04; /* Deep Coffee Dark */
            border-radius: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            /* This is the key change: restricting the width */
            width: 100%;
            max-width: 420px; 
        }

        .input-pill {
            background-color: #EBF2FF; 
            border: none;
            color: #333;
            border-radius: 999px;
        }

        .btn-coffee { 
            background-color: #E6A26B; 
            color: white; 
            border-radius: 15px;
            transition: all 0.2s ease;
        }

        .logo-circle {
            width: 90px;
            height: 90px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px auto;
            overflow: hidden;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">

    <div class="glass-card px-10 py-12">
        
        <div class="flex flex-col items-center pt-12 px-8">
            <div class="w-28 h-28 bg-white rounded-full flex items-center justify-center mb-6 shadow-inner">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20">
            </div>

        <div class="text-center mb-10">
            <h1 class="text-white text-3xl font-extrabold tracking-widest text-center uppercase">The Sisters Coffee</h1>
            <p class="text-white italic text-sm mt-2 mb-10 opacity-90">"Best coffee in Mahallah"</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-6">
                <label class="text-white text-xs font-semibold ml-5 mb-2 block uppercase tracking-wider">Your Full Name</label>
                <input id="name" type="text" name="name" required class="w-full input-pill px-6 py-3.5 outline-none text-sm">
            </div>

            <div class="mb-6">
                <label class="text-white text-xs font-semibold ml-5 mb-2 block uppercase tracking-wider">Your Email</label>
                <input id="email" type="email" name="email" required class="w-full input-pill px-6 py-3.5 outline-none text-sm">
            </div>

            <div class="mb-6">
    <label class="text-white text-xs font-semibold ml-5 mb-2 block uppercase tracking-wider">Username</label>
    <input id="username" type="text" name="username" :value="old('username')" required autofocus
        class="w-full input-pill px-6 py-3.5 outline-none text-sm text-gray-800">
    <x-input-error :messages="$errors->get('username')" class="mt-1 text-red-300 text-[10px]" />
</div>

            <div class="mb-10">
    <label class="text-white text-xs font-semibold ml-5 mb-2 block uppercase tracking-wider">Password</label>
    <input id="password" type="password" name="password" required autocomplete="new-password"
        class="w-full input-pill px-6 py-3.5 outline-none text-sm text-gray-800">
    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-300 text-[10px]" />
</div>

<div class="mb-6 text-center">
    <p class="text-white text-[11px] opacity-90">
        By signing up, you agree to terms and conditions
    </p>
</div>

            <button type="submit" class="w-full btn-coffee py-4 rounded-2xl font-bold text-lg uppercase tracking-widest shadow-lg">
                SIGN UP
            </button>

            <div class="mt-8 text-center">
                <p class="text-white text-[11px] opacity-90">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="underline font-bold hover:text-orange-200">Login Now!</a>
                </p>
            </div>
        </form>
    </div>

</body>
</html> 
