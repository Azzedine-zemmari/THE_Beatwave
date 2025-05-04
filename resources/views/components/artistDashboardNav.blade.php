<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatWave Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const burgerMenu = document.getElementById('burgerMenu');
            
            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
            }
            
            burgerMenu.addEventListener('click', toggleSidebar);
        });
    </script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    
    <!-- Burger button -->
    <button
        id="burgerMenu"
        class="lg:hidden w-10 h-10 p-2 fixed left-4 top-4 z-50 bg-white rounded-md shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#7A38FC]" fill="none" 
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    
    <aside id="sidebar" class="w-60 bg-[#7A38FC] text-white fixed top-0 left-0 h-screen 
                 overflow-y-auto z-40
                 -translate-x-full lg:translate-x-0">
        <div class="p-4 border-b border-[#7A38FC]">
            <h1 class="text-xl font-bold">BeatWave</h1>
            <p class="text-xs text-purple-200">Experience the next level of sound</p>
        </div>
        
        <nav class="mt-4">
            <ul>
                <li class="mb-1 w-full">
                    <a href="{{route('artist.invitation')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800 transition-colors duration-200 w-full">
                        <img src="{{asset('images/icons/user-plus.svg')}}" alt="invitation" class="h-5 w-5 mr-3">
                        Invitations
                    </a>
                </li>
                <li class="mb-1 w-full">
                    <a href="{{route('artist.schedule')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800 transition-colors duration-200 w-full">
                       <img src="{{asset('images/icons/solar_calendar-linear.svg')}}" alt="schedule" class="h-5 w-5 mr-3">
                       My schedule
                    </a>
                </li>
                <li class="mb-1 w-full mt-6 border-t border-purple-600 pt-4">
                    <form action="{{route('logout')}}" method="POST" class="flex w-full">
                        @csrf
                        <button type="submit" class="flex items-center px-4 py-3 text-white hover:bg-purple-800 transition-colors duration-200 w-full">
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

                <!-- Profile UI Only -->
                <div class="flex items-center">
                    <!-- Profile Circle with Initial -->
                    <a href="{{route('profile')}}" class="w-10 h-10 rounded-full bg-[#7A38FC] flex items-center justify-center text-white font-medium text-lg hover:bg-[#6429e5] transition-colors duration-200">
                        {{ substr(Auth::user()->Firstname, 0, 1) }}
                    </a>
                </div>
            </div>
        </header>
        
        <div class="pt-20 px-4 md:px-6 pb-8">
            <div class="w-full">
                {{$slot}}
            </div>
        </div>
    </div>
</body>
</html>