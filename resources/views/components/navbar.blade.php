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
<header class="w-full py-4 bg-white border-b">
    <nav class="flex items-center justify-between max-w-6xl mx-auto px-4">
        <!-- Logo -->
        <a href="{{ route('Home') }}" class="text-2xl font-bold text-gray-800">BeatWave</a>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex space-x-8">
            <a href="{{ route('Home') }}" class="text-gray-700">Home</a>
            <a href="{{ route('events') }}" class="text-gray-700">Events</a>
            <a href="{{ route('artists') }}" class="text-gray-700">Artists</a>
        </div>

        <!-- Join Us / Logout -->
        <div class="hidden md:block">
            @guest
                <a href="{{ route('register') }}" class="bg-[#E7826B] text-white px-5 py-2 rounded-full">Join us</a>
            @endguest
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="bg-[#E7826B] text-white px-5 py-2 rounded-full">Log out</button>
                </form>
            @endauth
        </div>

        <!-- Burger Icon -->
        <button id="burgerMenu" class="md:hidden w-8 h-8">
            <img src="{{ asset('/images/icons/ep_menu.svg') }}" alt="Menu" class="w-full h-full">
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="menu" class="md:hidden hidden px-4 pt-4 pb-2 space-y-2">
        <a href="{{ route('Home') }}" class="block text-gray-700">Home</a>
        <a href="{{ route('events') }}" class="block text-gray-700">Events</a>
        <a href="{{ route('artists') }}" class="block text-gray-700">Artists</a>
        @guest
            <a href="{{ route('register') }}" class="block bg-[#E7826B] text-white px-5 py-2 rounded-full">Join us</a>
        @endguest
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="bg-[#E7826B] text-white px-5 py-2 rounded-full text-left">Log out</button>
            </form>
        @endauth
    </div>
</header>