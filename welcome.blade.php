<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - The Sisters Coffee</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Main background matching your theme */
        body { background-color: #C4A493; margin: 0; padding: 0; } 

        .welcome-container {
            width: 100%;
            max-width: 400px; /* Mobile-app width */
            height: 90vh; /* Prevents full screen overflow on some mobile browsers */
            margin: 5vh auto;
            display: flex;
            flex-direction: column;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Selects the logo frame inside the top tan section */
.top-section > div {
    /* Adjust these two numbers to change the size (keep them equal) */
    width: 200px; 
    height: 200px;
    
    /* Forces the perfect circle shape */
    border-radius: 50%; 
    background-color: white;
    
    /* Centers the frame within the tan section */
    margin: 0 auto; 
    
    /* Centers the logo image inside the white circle */
    display: flex;
    align-items: center;
    justify-content: center;
    
    /* Ensures nothing spills out of the circle */
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.top-section img {
    /* Makes the logo image fit neatly inside the circle */
    width: 75%; 
    height: auto;
    object-fit: contain;
}

        /* Bottom Dark Section */
        .bottom-section {
            background-color: #2D0B04;
            flex: 1; /* Takes up the remaining space */
            padding: 40px 30px;
            text-align: center;
        }

        .btn-welcome {
            background-color: #E6A26B;
            color: white;
            padding: 14px 0;
            border-radius: 12px;
            font-weight: bold;
            font-size: 18px;
            transition: all 0.2s ease;
            display: block;
            width: 100%;
            text-decoration: none;
            margin-bottom: 15px;
        }

        .btn-welcome:hover {
            background-color: #d48e56;
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="welcome-container">
        <div class="top-section">
    <div>
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
</div>

        <div class="bottom-section">
            <h1 class="text-white text-3xl font-extrabold tracking-widest text-center uppercase">The Sisters Coffee
            </h1>
            <p class="text-white italic text-sm opacity-90 mb-8">
                "Best coffee in Mahallah"
            </p>

            <div class="flex gap-4 mb-8">
                <a href="{{ route('login') }}" class="btn-welcome">User Login</a>
                
                <a href="/staff-login" class="btn-welcome" style="background-color: #E6A26B;">Staff Login</a>
            </div>

            <p class="text-white text-xs opacity-80">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-bold underline">Sign Up Now!</a>
            </p>
        </div>
    </div>

</body>
</html> 
