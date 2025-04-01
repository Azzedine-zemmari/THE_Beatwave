<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans">
    <header class="w-full h-24 bg-gradient-to-r from-[#43CBFF] to-[#9708CC] relative">
        <div class="w-28 h-28 md:w-36 md:h-36 rounded-full border bg-gray-300 absolute top-10 left-2 md:left-7 flex justify-center items-center">
            <img src="{{asset('/images/icons/camera.svg')}}" class="w-7 h-7" alt="">
        </div>
        <button class="absolute top-6 right-6 flex items-center gap-2 text-white font-medium px-4 py-2 rounded-lg border-2 border-white hover:bg-white hover:bg-opacity-20 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back Home
        </button>
    </header>
    <main class="mt-20 md:mt-24 ml-4 md:ml-10">
        <!-- name and edit profile -->
        <section>
            <h1 class="font-bold text-xl">{{Auth::user()->Firstname}} {{Auth::user()->LastName}}</h1>
            <p>{{Auth::user()->role}}</p>
            <div class="flex items-center gap-5 mt-6">
                <button class="bg-[#2C2C2C] text-white px-3 py-2 rounded-lg">Edit profile</button>
                <button class="bg-[#EBEBEB] p-2 rounded-lg flex items-end justify-center">
                    <img src="{{asset('/images/icons/share.svg')}}" class="w-5 h-5" alt="">
                </button>
                
                <!-- Role Change Request Dropdown -->
                @if(Auth::user()->role === 'user')
                <div class="relative group">
                    <button type="button" class="bg-[#EBEBEB] hover:bg-gray-200 text-gray-800 px-3 py-2 rounded-lg flex items-center transition-all duration-300">
                        <span>Change Role</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-10">
                        <div class="py-1 text-sm text-gray-700">
                            <form action="{{route('changeRole')}}" method="POST" id="roleChangeForm" class="px-4 py-2">
                                @csrf
                                <label for="requested_role" class="block mb-2 font-medium">Request new role:</label>
                                <select name="requested_role" id="requested_role" class="w-full px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2">
                                    <option value="" selected disabled>Select a role</option>
                                    <option value="artist">Artist</option>
                                    <option value="organizer">Organizer</option>
                                </select>
                                <button type="submit" class="w-full mt-2 bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md transition-colors duration-300">
                                    Submit Request
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <a href="" class="bg-gradient-to-r from-[#43CBFF] to-[#9708CC] p-2 rounded-lg">{{Auth::user()->role}} Dashboard</a>
                @endif
            </div>
        </section>
        
        <!-- about user -->
        <section class="mt-6">
            <h2 class="font-bold">About : </h2>
            <p class="font-medium text-[#8A8A8A] max-w-[550px]">{{Auth::user()->bio}}</p>
            <div class="flex flex-col space-y-5 mt-4">
                <div class="flex items-center">
                    <div class="w-5 h-5 flex justify-center items-center mr-3">
                        <img src="{{asset('/images/icons/mail.svg')}}" alt="">
                    </div>
                    <p>{{Auth::user()->email}}</p>
                </div>
                <div class="flex items-center">
                    <div class="w-5 h-5 flex justify-center items-center mr-3">
                        <img src="{{asset('/images/icons/link-2.svg')}}" alt="">
                    </div>
                    <p>{{Auth::user()->websiteLink ?? 'no website'}}</p>
                </div>
                <div class="flex items-center">
                    <div class="w-5 h-5 flex justify-center items-center mr-3">
                        <img src="{{asset('/images/icons/calendar.svg')}}" alt="">
                    </div>
                    <p>Joined: {{Auth::user()->created_at->format('d-m-Y')}}</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>