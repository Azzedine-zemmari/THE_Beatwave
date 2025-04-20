<x-app>
<h1 class=" font-Kadwa text-4xl font-bold text-center my-3">All Artists</h1>
<div class="max-w-6xl mx-auto">
    <form action="" class=" flex justify-end">
        <div class="relative">
            <input type="text" placeholder="search" class=" py-2 px-4 rounded-full bg-[#E7D8C9] text-[#1E1812] bg-opacity-30 opacity-70">
            <img src="{{asset('/images/icons/searchsvg.svg')}}" class="absolute top-3 right-3 w-4 h-4" alt="">
        </div>
    </form>
</div>
<section class="max-w-6xl mx-auto mt-10">
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($data as $artist)
    <div class="bg-white shadow-lg rounded-lg">
        <img src="{{asset('storage/'.$artist->avatar)}}" alt="profile" class="w-full rounded-t-lg">
        <div class="p-3">
            <a href="/ArtistProfile/{{$artist->id}}" class="font-semibold text-lg">{{$artist->Firstname}} {{$artist->LastName}}</a>
            <p>{{$artist->bio}}</p> 
        </div>
    </div>
    @endforeach
</div>
</section>
</x-app>