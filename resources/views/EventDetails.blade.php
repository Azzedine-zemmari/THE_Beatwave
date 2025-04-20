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
                    <button id="toggleShare" class="bg-black px-4 py-2 rounded-lg">
                        <img src="{{asset('/images/icons/whiteShare.svg')}}" alt="">
                    </button>
                </div>
                <div id="ShareContainer" class="mt-2 hidden flex">
                    @foreach($shareButtons as $link)
                    @php
                    $lower = strtolower($link);
                    $icon = 'fa-share';
                    if(str_contains($lower,'facebook')) $icon = 'fa-facebook';
                    elseif(str_contains($lower,'reddit')) $icon = 'fa-reddit';
                    elseif(str_contains($lower,'twitter')) $icon = 'fa-twitter';
                    @endphp
                    <a href="{{$link}}" target="_blank" class="text-white px-4 py-2 rounded-full flex items-center justify-center   
                        {{ str_contains($link, 'facebook') ? 'bg-[#3b5998]' : '' }}
                        {{ str_contains($link, 'twitter') ? 'bg-[#0077b5]' : '' }}
                        {{ str_contains($link, 'reddit') ? 'bg-[#ee7c11]' : '' }}">
                        <i class="fa-brands {{$icon}}" class="tex-xl"></i>
                    </a>
                    @endforeach
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
            @if(!$eventPurchase)
            <div class="flex  text-center my-2">
                <form action="{{route('processTransaction',$data->id)}}" method="post">
                    @csrf
                    <button class="bg-black w-full text-white py-2 rounded">Purchase</button>
                </form>
            </div>
            @else
            <div class="flex  text-center my-2">
                <a href="{{route('ticketShow',$data->id)}}" class="bg-[#7A38FC] w-full text-white py-2 rounded">Preview ticket</a>
            </div>
            <!-- comments section -->
            <div class="relative my-3">
                <form action="{{route('createComment')}}" method="post">
                    @csrf
                    <input type="hidden" name="eventId" value="{{$data->id}}">
                    <textarea name="commentaire" id="" placeholder="Add comment" class="w-full border border-black rounded-xl resize-none placeholder:pl-5 placeholder:pt-3"></textarea>
                    <button class=" absolute right-2 top-3">
                        <img src="{{asset('/images/icons/send.svg')}}" class="w-7 h-7" alt="">
                    </button>
                </form>
            </div>
            @foreach($comments as $comment)
            <div class="flex gap-5">
                <div>
                    @if($comment->avatar)
                    <img class="w-7 h-7 rounded-full" src="{{asset('storage/'.$comment->avatar)}}" />
                    @else
                    <p class="font-bold bg-gray-100 rounded-full w-7 h-7 text-center">{{substr($comment->Firstname,0,1)}}</p>
                    @endif
                </div>
                <div class="">
                    <p class="font-bold text-lg">{{$comment->Firstname}}</p>
                    <p class="text-md">{{$comment->commentaire}}</p>
                </div>
            </div>
            @endforeach
            @endif
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('toggleShare').addEventListener('click', function() {
                const shareBox = document.getElementById('ShareContainer')
                shareBox.classList.toggle('hidden')
            })
        })
    </script>
</x-app>