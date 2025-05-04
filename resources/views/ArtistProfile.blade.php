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
    <style>
        .custom-audio-player {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            margin-top: 20px;
            max-width: 450px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .custom-audio-player audio {
            width: 100%;
            height: 40px;
        }

        .music-icon-container {
            background-color: #2C2C2C;
            border-radius: 50%;
            padding: 6px;
            margin-right: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body class="font-sans">
    <header class="w-full h-24 bg-gradient-to-r from-[#43CBFF] to-[#9708CC] relative">
        <div class="w-28 h-28 md:w-36 md:h-36 rounded-full border bg-gray-300 absolute top-10 left-2 md:left-7 flex justify-center items-center">
            @if($data->avatar)
            <img src="{{asset('storage/'.$data->avatar)}}" class="w-full rounded-full" alt="">
            @else
            <img src="{{asset('/images/icons/camera.svg')}}" class="w-7 h-7" alt="">
            @endif
        </div>
        <a href="{{route('Home')}}" class="absolute top-6 right-6 flex items-center gap-2 text-white font-medium px-4 py-2 rounded-lg border-2 border-white hover:bg-white hover:bg-opacity-20 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back Home
        </a>
    </header>
    <main class="mt-20 md:mt-24 ml-4 md:ml-10">
        <!-- name and edit profile -->
        <section>
            <h1 class="font-bold text-xl">{{$data->Firstname}} {{$data->LastName}}</h1>
        </section>

        <!-- about user -->
        <section class="mt-6">
            <h2 class="font-bold">About : </h2>
            <p class="font-medium text-[#8A8A8A] max-w-[550px]">{{$data->bio}}</p>
            <div class="flex flex-col space-y-5 mt-4">
                <div class="flex items-center">
                    <div class="w-5 h-5 flex justify-center items-center mr-3">
                        <img src="{{asset('/images/icons/mail.svg')}}" alt="">
                    </div>
                    <p>{{$data->email}}</p>
                </div>
                <div class="flex items-center">
                    <div class="w-5 h-5 flex justify-center items-center mr-3">
                        <img src="{{asset('/images/icons/link-2.svg')}}" alt="">
                    </div>
                    <p>{{$data->websiteLink ?? 'no website'}}</p>
                </div>
                <div class="flex items-center">
                    <div class="w-5 h-5 flex justify-center items-center mr-3">
                        <img src="{{asset('/images/icons/calendar.svg')}}" alt="">
                    </div>
                    <p>Joined: {{$data->created_at->format('d-m-Y')}}</p>
                </div>
            </div>
        </section>
        <section class="mt-8">
            <h2 class="font-bold mb-3">Artist Performance:</h2>
            @if($data->song)
            <div class="custom-audio-player">
                <div class="music-icon-container">
                    <img src="{{asset('/images/icons/ri_music-fill.svg')}}" class="w-6 h-6" alt="Music">
                </div>
                <audio controls>
                    <source src="{{asset('storage/'.$data->song)}}">
                </audio>
            </div>
            @else
            <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm max-w-md mb-4 flex items-center">
                <div class="bg-gray-100 rounded-full p-2 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                    </svg>
                </div>
                <p class="text-gray-700 text-sm">No audio available</p>
            </div>
            @endif
            @if($data->vedeo)
            <div class="bg-white border border-gray-200 rounded-xl p-3 shadow-sm max-w-md">
                <div class="flex items-center mb-3">
                    <div class="bg-[#2C2C2C] rounded-full p-1.5 mr-3 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="font-medium">Artist Video</span>
                </div>
                <video controls class="w-full rounded-lg bg-gray-100">
                    <source src="{{asset('storage/'.$data->vedeo ?? '')}}" type="video/mp4">
                </video>
            </div>
            @else
            <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm max-w-md flex items-center">
                <div class="bg-gray-100 rounded-full p-2 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="text-gray-700 text-sm">No video available</p>
            </div>
            @endif
        </section>
    </main>
</body>

</html>