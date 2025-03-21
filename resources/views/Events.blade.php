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
        <div class="bg-white shadow-md rounded-lg ">
            <img src="{{ asset('/images/PartyE.jpeg') }}" class="w-full h-64 object-cover" alt="">
            <div class="p-4 flex justify-between items-center">
                <p class="text-sm">Electric night</p>
                <img src="{{ asset('/images/icons/memory_arrow-up.svg') }}" class="w-6 h-6" alt="">
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg ">
            <img src="{{ asset('/images/PartyE.jpeg') }}" class="w-full h-64 object-cover" alt="">
            <div class="p-4 flex justify-between items-center">
                <p class="text-sm">Electric night</p>
                <img src="{{ asset('/images/icons/memory_arrow-up.svg') }}" class="w-6 h-6" alt="">
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg ">
            <img src="{{ asset('/images/PartyE.jpeg') }}" class="w-full h-64 object-cover" alt="">
            <div class="p-4 flex justify-between items-center">
                <p class="text-sm">Electric night</p>
                <img src="{{ asset('/images/icons/memory_arrow-up.svg') }}" class="w-6 h-6" alt="">
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg ">
            <img src="{{ asset('/images/PartyE.jpeg') }}" class="w-full h-64 object-cover" alt="">
            <div class="p-4 flex justify-between items-center">
                <p class="text-sm">Electric night</p>
                <img src="{{ asset('/images/icons/memory_arrow-up.svg') }}" class="w-6 h-6" alt="">
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg ">
            <img src="{{ asset('/images/PartyE.jpeg') }}" class="w-full h-64 object-cover" alt="">
            <div class="p-4 flex justify-between items-center">
                <p class="text-sm">Electric night</p>
                <img src="{{ asset('/images/icons/memory_arrow-up.svg') }}" class="w-6 h-6" alt="">
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg ">
            <img src="{{ asset('/images/PartyE.jpeg') }}" class="w-full h-64 object-cover" alt="">
            <div class="p-4 flex justify-between items-center">
                <p class="text-sm">Electric night</p>
                <img src="{{ asset('/images/icons/memory_arrow-up.svg') }}" class="w-6 h-6" alt="">
            </div>
        </div>
    </div>
</section>
     <!-- footer -->
</x-app>