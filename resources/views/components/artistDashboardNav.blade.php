<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatWave Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="flex h-screen bg-gray-100 relative">
    <!-- burger button -->
    <button
            id="burgerMenu"
            class="lg:hidden w-8 h-8 p-1 absolute right-2.5 top-3"
        >
            <img src="{{ asset('/images/icons/ep_menu.svg') }}" alt="Menu" class="w-full h-full">
    </button>
    <!-- Sidebar -->
    <aside id="sidebar" class="w-60 bg-[#7A38FC] text-white z-50 absolute lg:relative h-full hidden lg:block">
        <div class="p-4 border-b border-[#7A38FC]">
            <h1 class="text-xl font-bold">BeatWave</h1>
            <p class="text-xs text-purple-200">Experience the next level of sound</p>
        </div>
        
        <nav class="mt-4">
            <ul>
                <li class="mb-1">
                    <a href="{{route('artist.invitation')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <img src="{{asset('images/icons/user-plus.svg')}}" alt="invitation" class="h-5 w-5 mr-3">
                        Invitations
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{route('artist.schedule')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                       <img src="{{asset('images/icons/solar_calendar-linear.svg')}}" alt="schedule" class="h-5 w-5 mr-3">
                       My schedule
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

      <!-- Main Content -->
      <main class="flex-1">
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

        {{$slot}}
    </main>
</body>
</html>