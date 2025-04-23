<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatWave Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded',()=>{
            const sidebar = document.getElementById('sidebar');
            const burgerMenu = document.getElementById('burgerMenu');
            burgerMenu.addEventListener('click',()=>{
                sidebar.classList.toggle('hidden');
            })
        })
    </script>
</head>
<body class="flex min-h-screen bg-gray-100">
    <!-- burger button -->
    <button id="burgerMenu" class="lg:hidden w-8 h-8 p-1 fixed right-2.5 top-3 z-50">
            <img src="{{ asset('/images/icons/ep_menu.svg') }}" alt="Menu" class="w-full h-full">
    </button>
    <!-- Sidebar -->
    <aside id="sidebar" class="w-60 bg-[#7A38FC] text-white fixed top-0 left-0 h-screen overflow-y-auto z-40 hidden lg:block">
        <div class="p-4 border-b border-[#7A38FC]">
            <h1 class="text-xl font-bold">BeatWave</h1>
            <p class="text-xs text-purple-200">Experience the next level of sound</p>
        </div>
        
        <nav class="mt-4">
            <ul>
                <li class="mb-1">
                    <a href="#" class="flex items-center px-4 py-3 bg-[#7A38FC] text-white hover:bg-purple-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="mb-1">
                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Users
                    </a>
                </li>
                <li class="mb-1">
                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Organisateurs
                    </a>
                </li>
                <li class="mb-1">
                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                        </svg>
                        Artists
                    </a>
                </li>
                <li class="mb-1">
                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Events
                    </a>
                </li>
                <li class="mb-1">
                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Categories
                    </a>
                </li>
                <li class="mb-1">
                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        Comments
                    </a>
                </li>
                <li class="mb-1">
                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c2.21 0 4-1.79 4-4S14.21 3 12 3 8 4.79 8 7s1.79 4 4 4zm-6 8c0-2.21 3.58-4 6-4s6 1.79 6 4M4 16h16M4 20h16"/>
                        </svg>
                        Role change
                    </a>
                </li>

            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 lg:ml-60 overflow-x-auto">
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <h2 class="text-lg font-medium">Welcome {{Auth::user()->Firstname}}</h2>
            
            <!-- Simplified Profile & Logout UI -->
            <div class="flex items-center space-x-4">
                <!-- Profile Circle with Initial -->
                <a href="{{route('profile')}}" class="w-10 h-10 rounded-full bg-[#7A38FC] flex items-center justify-center text-white font-medium text-lg hover:bg-[#6429e5] transition-colors duration-200">
                    {{ substr(Auth::user()->Firstname, 0, 1) }}
                </a>
                
                <!-- Logout Button -->
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition-colors duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </header>
<div class="p-6">
    {{$slot}}
</div>
        
    </main>
</body>
</html>