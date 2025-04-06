<x-app>
<!-- filter -->
<section class="mt-10 relative">
    <h1 class=" font-Kadwa text-4xl font-bold text-center">All Events</h1>
    <!-- all events -->
    <div class="flex items-center justify-center space-x-4 overflow-x-auto whitespace-nowrap">
        <p>Concerts</p>
        <p>Electronic</p>
        <p>jazz</p>
        <p>Hip-Hop</p>
        <p>pop</p>
    </div>
</section>
<div class="max-w-6xl mx-auto">
    <form action="" class=" flex justify-end">
        <div class="relative">
            <input type="text" placeholder="search" class=" py-2 px-4 rounded-full bg-[#E7D8C9] text-[#1E1812] bg-opacity-30 opacity-70">
            <img src="{{asset('/images/icons/searchsvg.svg')}}" class="absolute top-3 right-3 w-4 h-4" alt="">
        </div>
    </form>
</div>
<!-- all events -->
<section class="max-w-6xl mx-auto mt-10">
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($data as $event)
    <div class="bg-white shadow-md rounded-lg">
        <img src="{{ asset($event->image) }}" class="w-full h-64 object-cover" alt="">
        <div class="p-4">
            <h3 class="text-sm font-semibold md:text-lg">{{$event->nom}}</h3>
            <p class="text-xs md:text-sm mb-4">{{$event->description}}</p>
            <div class="flex justify-end">
                <a href="" class="bg-[#7A38FC] text-white text-sm px-3 py-2">Buy</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</section>
     <!-- footer -->
</x-app>