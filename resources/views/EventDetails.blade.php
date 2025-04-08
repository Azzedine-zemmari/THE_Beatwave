<x-app>
    <main class="max-w-6xl mx-auto">
        <section id="hero" class="relative ">
            <img src="{{asset($data->image)}}" class=" rounded-lg ">
            <div class="absolute bottom-3 left-3 flex items-center gap-2">
                <img src="{{asset('/images/icons/user.svg')}}" class="w-4 h-4" alt="">
                <p class="text-white">{{$data->organizerF}} {{$data->organizerL}}</p>
            </div>
        </section>
        <!-- Details section -->
        <section class="p-5 border border-gray-200 rounded-xl shadow-sm">
            <div class="flex flex-col space-y-8">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-xl">Event details</h2>
                    <button class="bg-black px-4 py-2 rounded-lg">
                        <img src="{{asset('/images/icons/whiteShare.svg')}}" alt="">
                    </button>
                </div>
                <p class=" text-[#8A8A8A]">{{$data->description}}</p>
            </div>
            <div class="flex flex-col space-y-2 my-3">
                <div class="flex items-center gap-2">
                    <img src="{{asset('/images/icons/calendarDetails.svg')}}" class="w-4 h-4" alt="">
                    <p>{{$data->date}}</p>
                </div>
                <div class="flex items-center gap-2">
                    <img src="{{asset('/images/icons/clockdetails.svg')}}" class="w-4 h-4" alt="">
                    <p>{{$data->date}}</p>
                </div>
                <div class="flex items-center gap-2">
                    <img src="{{asset('/images/icons/Category.svg')}}" class="w-4 h-4" alt="">
                    <p>{{$data->EventCategorie}}</p>
                </div>
            </div>
            <h3 class="text-lg font-bold">Featured artist</h3>
            <!-- needs icon -->
            <p>{{$data->artistF}} {{$data->artistL}}</p>
        </section>
        <section class="p-5 border border-gray-200 rounded-xl shadow-sm">
            <h4 class="text-lg font-semibold">Get Ticket</h4>
            <p class="text-md font-semibold">{{$data->taketPrice}} dh</p>
            <div class="flex  text-center my-2">
                <form action="{{route('processTransaction',$data->id)}}" method="post">
                    @csrf
                    <button class="bg-black w-full text-white py-2 rounded">Purchase</button>
                </form>
            </div>
        </section>
    </main>
</x-app>