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
            
            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
            }
            
            burgerMenu.addEventListener('click', toggleSidebar);
        })
    </script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- burger button -->
    <button id="burgerMenu" class="lg:hidden w-10 h-10 p-2 fixed left-4 top-4 z-50 bg-white rounded-md shadow-md">
        <img src="{{ asset('/images/icons/ep_menu.svg') }}" alt="Menu" class="w-6 h-6">
    </button>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="w-60 bg-[#7A38FC] text-white fixed top-0 left-0 h-screen overflow-y-auto z-40 -translate-x-full lg:translate-x-0">
        <div class="p-4 border-b border-[#7A38FC]">
            <h1 class="text-xl font-bold">BeatWave</h1>
            <p class="text-xs text-purple-200">Experience the next level of sound</p>
        </div>
        
        <nav class="mt-4">
            <ul>
                <li class="mb-1">
                    <a href="{{route('organisateur.addEvent')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <img src="{{asset('images/icons/AddEvent.svg')}}" alt="invitation" class="h-5 w-5 mr-3">
                        Add Event
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{route('inscriptions')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <img src="{{asset('images/icons/user-check.svg')}}" alt="schedule" class="h-5 w-5 mr-3">
                        Inscription
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{route('showAllEvent')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <img src="{{asset('images/icons/brand-eventbrite-svgrepo-com.svg')}}" alt="schedule" class="h-5 w-5 mr-3">
                        MyEvents
                    </a>
                </li>
                <li class="mb-1">
                    <form action="{{route('logout')}}" method="POST" class="flex">
                        @csrf
                        <button type="submit" class="flex items-center px-4 py-3 text-white hover:bg-purple-800 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

    </aside>

    <!-- Main Content -->
    <div class="flex-1 lg:ml-60">
        <header class="bg-white shadow fixed top-0 right-0 left-0 lg:left-60 z-20">
            <div class="px-6 py-4 flex justify-between items-center">
                <h2 class="text-lg font-medium ml-10 lg:ml-0">Welcome {{Auth::user()->Firstname}}</h2>
                
                <div class="flex items-center space-x-4">
                    <!-- Profile Circle with Initial -->
                    <a href="{{route('profile')}}" class="w-10 h-10 rounded-full bg-[#7A38FC] flex items-center justify-center text-white font-medium text-lg hover:bg-[#6429e5] transition-colors duration-200">
                        {{ substr(Auth::user()->Firstname, 0, 1) }}
                    </a>
                    
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg  items-center hidden lg:flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <div class="pt-20 px-4 md:px-6 pb-8">
            <div class="overflow-x-auto w-full">
                {{$slot}}
            </div>
        </div>
    </div>
</body>
</html>