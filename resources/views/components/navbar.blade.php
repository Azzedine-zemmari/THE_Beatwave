<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const burger = document.getElementById('burgerMenu');
            const menu = document.getElementById('menu');

            burger.addEventListener('click', function () {
                menu.classList.toggle('hidden');
            });
        });
    </script>
</head>
<body>
<header class="w-full py-4 bg-white">
    <nav class="flex items-center justify-between max-w-6xl mx-auto px-4">
        <!-- Logo -->
        <a href="{{route('Home')}}" class="text-2xl font-bold text-gray-800">BeatWave</a>

        <!-- Desktop Navigation -->
        <div class="hidden space-x-8 md:flex">
            <a href="{{route('Home')}}" class="hover:underline hover:underline-offset-4 text-gray-700 ">Home</a>
            <a href="{{route('events')}}" class="hover:underline hover:underline-offset-4 text-gray-700 ">Events</a>
            <a href="{{route('artists')}}" class="hover:underline hover:underline-offset-4 text-gray-700 ">Artists</a>
        </div>

        <!-- Join Us Button -->
        @guest
            <div>
                <a href="{{route('register')}}" class="hidden bg-[#E7826B] hover:bg-[#d6715b] text-white px-5 py-2 rounded-full md:block">Join us</a>
            </div>
            @endguest
            @auth
            <div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="hidden bg-[#E7826B] hover:bg-[#d6715b] text-white px-5 py-2 rounded-full md:block">Log out</button>
                </form>
            </div>
            @endauth
        <!-- Burger Menu (Mobile) -->
        <button
            id="burgerMenu"
            class="md:hidden w-8 h-8 p-1"
        >
            <img src="{{ asset('/images/icons/ep_menu.svg') }}" alt="Menu" class="w-full h-full">
        </button>
    </nav>

    <!-- Mobile Navigation -->
    <nav id="menu" class="absolute top-16 right-0 left-0 bg-white shadow-lg hidden">
        <div class="py-4 px-4 space-y-4">
            <a href="{{route('Home')}}" class="block text-gray-700 hover:text-[#d6715b] transition-colors duration-200">Home</a>
            <a href="{{route('events')}}" class="block text-gray-700 hover:text-[#d6715b] transition-colors duration-200">Events</a>
            <a href="{{route('artists')}}" class="block text-gray-700 hover:text-[#d6715b] transition-colors duration-200">Artists</a>
            @guest
            <div>
                <a href="{{route('register')}}" class="hidden bg-[#E7826B] hover:bg-[#d6715b] text-white px-5 py-2 rounded-full md:block">Join us</a>
            </div>
            @endguest
            @auth
            <div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="hidden bg-[#E7826B] hover:bg-[#d6715b] text-white px-5 py-2 rounded-full md:block">Log out</button>
                </form>
            </div>
            @endauth        
        </div>
    </nav>
</header>