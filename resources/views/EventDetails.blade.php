<x-app>
    <main class="max-w-6xl mx-auto">
        <section id="hero" class="relative ">
            <img src="{{asset('/images/PPP.png')}}" class=" rounded-lg ">
            <div class="absolute bottom-3 left-3 flex items-center gap-2">
                <img src="{{asset('/images/icons/user.svg')}}" class="w-4 h-4" alt="">
                <p class="text-white">sara</p>
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
                <p class=" text-[#8A8A8A]">Experience an enchanting evening of contemporary jazz under the open sky. Sarah Thompson, acclaimed for her innovative piano compositions, leads her quartet through a mesmerizing journey of original pieces and beloved jazz standards.</p>
            </div>
         </section>
    </main>
</x-app>