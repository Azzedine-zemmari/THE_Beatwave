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
                    <a href="{{route('admin.Dashboard')}}" class="flex items-center px-4 py-3 bg-[#7A38FC] text-white hover:bg-purple-900">
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
                    <a href="{{route('admin.users')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Users
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{route('admin.event')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Events
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{route('admin.category')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Categories
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{route('admin.roleChange')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c2.21 0 4-1.79 4-4S14.21 3 12 3 8 4.79 8 7s1.79 4 4 4zm-6 8c0-2.21 3.58-4 6-4s6 1.79 6 4M4 16h16M4 20h16"/>
                        </svg>
                        Role change
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{route('admin.inscriptions')}}" class="flex items-center px-4 py-3 text-white hover:bg-purple-800">
                    <svg fill="#ffffff" height="200px" width="200px"  class="h-5 w-5 mr-3"  version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 256" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_11_" d="M57.9,41.9c11.3,0,20.5-9.2,20.5-20.5c0-11.3-9.2-20.5-20.5-20.5c-11.3,0-20.5,9.2-20.5,20.5 C37.4,32.7,46.6,41.9,57.9,41.9"></path> <path id="XMLID_10_" d="M203.4,41.6c11.5,0,20.8-9.3,20.8-20.8c0-11.5-9.3-20.8-20.8-20.8c-11.5,0-20.8,9.3-20.8,20.8 C182.6,32.3,191.9,41.6,203.4,41.6"></path> <path id="XMLID_7_" d="M50.3,158.5c-26.9,0-48.7,21.8-48.7,48.7c0,26.9,21.8,48.8,48.7,48.8c26.9,0,48.8-21.8,48.8-48.8 C99.1,180.3,77.2,158.5,50.3,158.5 M56.1,238.2v7.8H44.4v-7.8c-12.4-1.4-20.4-13.3-20.4-21h12.4c0,3.5,2.7,8.1,8,9.2v-14.6 c-2.7-0.5-4.2-0.9-7.1-1.7c-7.3-2-12.4-8.2-12.4-16.1c0-7.8,7.6-16.6,19.4-18.1v-7.3h11.7v7.3c12.5,1.6,20.1,10.8,20.1,20l-12.2,0 c0-4-3.4-7.7-8-8.1v13.7c3.4,0.7,3.4,0.7,6.5,1.5c11.6,3.2,14.2,10.7,14.2,17.1C76.8,229.8,69,236.5,56.1,238.2"></path> <path id="XMLID_4_" d="M44.4,199.3c-5.2-0.9-6.6-3.2-6.6-5.6c0-2.8,3.5-5.5,6.6-5.9V199.3z M56.2,226.3V214c5.1,0.7,8.4,3,8.4,6.1 C64.6,222.9,61.6,226.1,56.2,226.3"></path> <path id="XMLID_3_" d="M31.2,77.4h8.1l-9.3,34.7h56l-9.3-34.7h8.1l9.6,34.7h18L100.6,70c-3.1-10.2-13.2-21-26.4-21H41.5 c-13.2,0-23.3,10.8-26.4,21L3.6,112.1h18L31.2,77.4z"></path> <path id="XMLID_2_" d="M225.6,48.8c10.2,0,18.5,8.3,18.5,18.5l0,56.8H256v23.3l-24.1,0v96.4c0,6.7-5.5,12.2-12.3,12.2 c-6.7,0-12.2-5.5-12.2-12.2v-96.4h-7.8v96.4c0,6.7-5.5,12.2-12.2,12.2c-6.7,0-12.2-5.5-12.2-12.2v-96.4L1.6,147.4v-23.4h173.6V69.4 l-38.8,46c-8.2,9.4-22.7-2.4-14.5-12.4l40.2-48.4c2.6-2.6,4.9-5.8,14.5-5.8H225.6z"></path> </g></svg>                        Events Inscriptions
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