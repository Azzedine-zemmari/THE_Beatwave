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
        <div class=" w-28 h-28 md:w-36 md:h-36 rounded-full border bg-gray-300 absolute top-10 left-2 md:left-7 flex justify-center items-center">
            <img src="{{asset('/images/icons/camera.svg')}}" class="w-7 h-7" alt="">
        </div>
        <button class="absolute top-6 right-6 flex items-center gap-2 text-white font-medium px-4 py-2 rounded-lg border-2 border-white hover:bg-white hover:bg-opacity-20 transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back Home
    </button>
    </header>
    <main class=" mt-20 md:mt-24 ml-4 md:ml-10">
        <!-- name and edit profile -->
        <section>
            <h1 class="font-bold text-xl">Alexendar</h1>
            <p>DJ</p>
            <div class="flex items-center gap-5 mt-6">
                <button class="bg-[#2C2C2C] text-white px-3 py-2 rounded-lg">Edit profile</button>
                <button class="bg-[#EBEBEB] p-2 rounded-lg flex items-end justify-center">
                    <img src="{{asset('/images/icons/share.svg')}}" class="w-5 h-5" alt="">
                </button>
            </div>
        </section>
        <!-- about user -->
        <section class="mt-6">
            <h2 class="font-bold">About : </h2>
            <p class=" font-medium text-[#8A8A8A] max-w-[550px]">Product designer passionate about creating intuitive user experiences. Currently working on design systems and accessibility improvements.</p>
            <div class="flex flex-col space-y-5 mt-4">
                <div class="flex items-center">
                    <div class="w-5 h-5 flex justify-center items-center mr-3">
                        <img src="{{asset('/images/icons/mail.svg')}}" alt="">
                    </div>
                    <p>alex.chen@example.com</p>
                </div>
                <div class="flex items-center">
                    <div class="w-5 h-5 flex justify-center items-center mr-3">
                        <img src="{{asset('/images/icons/link-2.svg')}}" alt="">
                    </div>
                    <p>www.alex.me</p>
                </div>
                <div class="flex items-center">
                    <div class="w-5 h-5 flex justify-center items-center mr-3">
                        <img src="{{asset('/images/icons/calendar.svg')}}"  alt="">
                    </div>
                    <p>Joined: 22-02-2024</p>
                </div>

            </div>
        </section>
    </main>
</body>
</html>