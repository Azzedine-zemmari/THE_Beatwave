<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 flex justify-center items-center min-h-screen">
    <div class="">
        @if(session('tiket'))
        <div class="w-full max-w-4xl rounded-xl shadow-2xl">
            <div class="flex flex-col md:flex-row">
                <!-- Left side with image -->
                <div class="w-full md:w-1/2 relative">
                    <img src="{{asset(session('tiket')->event->image)}}" alt="Event Image" class="w-full h-64 md:h-96 lg:h-120 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-transparent"></div>
                    <h1 class="absolute top-4 left-6 font-bold text-white text-2xl md:text-3xl lg:text-4xl">{{ session('tiket')->event->nom }}</h1>
                    <p class="absolute bottom-4 left-6 font-semibold text-white text-xl md:text-2xl">{{session('tiket')->event->place}}</p>
                </div>
                
                <!-- Right side with details -->
                <div class="w-full md:w-1/2 bg-[#7A38FC] p-6 md:p-8 lg:p-10 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <p class="text-white font-semibold text-xl md:text-2xl">{{\Carbon\Carbon::parse(session('tiket')->event->date)->format('d M')}}</p>
                            <p class="text-white font-bold text-xl md:text-2xl">Beatwave</p>
                        </div>
                        
                        <div class="flex items-center gap-3 mb-8">
                            <img src="{{asset('/images/icons/ri_music-fill.svg')}}" class="w-6 h-6 md:w-8 md:h-8" alt="Music Icon">
                            <p class="text-white font-medium text-lg md:text-xl">{{session('tiket')->event->artist->Firstname}} {{session('tiket')->event->artist->LastName}}</p>
                        </div>
                        
                        <div class="mb-8">
                            <p class="font-bold text-white text-2xl md:text-3xl">{{session('tiket')->event->taketPrice}}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 bg-white/10 p-4 md:p-5 rounded-lg">
                        <p class="text-white text-center text-lg md:text-xl">Present this ticket at entry</p>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="w-full max-w-4xl overflow-hidden rounded-xl shadow-2xl">
            <div class="flex flex-col md:flex-row">
                <!-- Left side with image -->
                <div class="w-full md:w-1/2 relative">
                    <img src="{{asset($eventPurchase->event->image)}}" alt="Event Image" class="w-full h-64 md:h-96 lg:h-120 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-transparent"></div>
                    <h1 class="absolute top-4 left-6 font-bold text-white text-2xl md:text-3xl lg:text-4xl">{{ $eventPurchase->event->nom }}</h1>
                    <p class="absolute bottom-4 left-6 font-semibold text-white text-xl md:text-2xl">{{$eventPurchase->event->place}}</p>
                </div>
                
                <!-- Right side with details -->
                <div class="w-full md:w-1/2 bg-[#7A38FC] p-6 md:p-8 lg:p-10 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <p class="text-white font-semibold text-xl md:text-2xl">{{\Carbon\Carbon::parse($eventPurchase->event->date)->format('d M')}}</p>
                            <p class="text-white font-bold text-xl md:text-2xl">Beatwave</p>
                        </div>
                        
                        <div class="flex items-center gap-3 mb-8">
                            <img src="{{asset('/images/icons/ri_music-fill.svg')}}" class="w-6 h-6 md:w-8 md:h-8" alt="Music Icon">
                            <p class="text-white font-medium text-lg md:text-xl">{{$eventPurchase->event->artist->Firstname}} {{$eventPurchase->event->artist->LastName}}</p>
                        </div>
                        
                        <div class="mb-8">
                            <p class="font-bold text-white text-2xl md:text-3xl">{{$eventPurchase->event->taketPrice}}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 bg-white/10 p-4 md:p-5 rounded-lg">
                        <p class="text-white text-center text-lg md:text-xl">Present this ticket at entry</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</body>
</html>