<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .carousel{
            position: relative;
            max-width: 600px;
            height: 150px;
            margin: auto;
            overflow: hidden;
        }
        .carousel-quotes{
            display: flex;
            width: 300%;
            transition: transform 0.3s ease-in-out ;
        }
        .carousel-quotes p {
            flex: 0 0 100%;
            box-sizing: border-box;
        }
        .dots{
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .dot{
            width: 10px;
            height: 10px;
            background-color: #bbb;
            border-radius: 50%;
        }
        .active{
            background-color: black;
        }
    </style>
</head>

<body>
    <header class="relative flex justify-center items-center">
        <img src="{{asset('/images/hero1.png')}}" class="w-full h-[600px] object-cover" alt="Hero Image">
        <nav class="absolute top-0 left-0 right-0 px-8 py-4 flex justify-between items-center text-white">
            <!-- Logo -->
            <div class="text-xl font-bold">
                <a href="#">BeatWave</a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8">
                <a href="{{route('Home')}}" class="cursor-pointer hover:text-gray-300">Home</a>
                <a href="{{route('events')}}" class="cursor-pointer hover:text-gray-300">Events</a>
                <a href="{{route('artists')}}" class="cursor-pointer hover:text-gray-300">Artists</a>
            </div>

            <!-- Join Us Button -->
             @guest
            <div>
                <a href="{{route('register')}}" class="hidden md:flex bg-transparent text-white px-6 py-2 rounded-full border-white border-2 hover:cursor-pointer">Join us</a>
            </div>
            @endguest
            @auth
            <div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="hidden md:flex bg-transparent text-white px-6 py-2 rounded-full border-white border-2 hover:cursor-pointer">Log out</button>
                </form>
            </div>
            @endauth
            <div id="menu" class="md:hidden">
                <img src="{{asset('/images/icons/ep_menu.svg')}}" alt="">
            </div>
        </nav>

        <nav id="phoneNav" class="hidden absolute top-0 right-0 left-0 w-full bg-white shadow-lg z-50 ">
            <img id="closeButton" src="{{asset('/images/icons/close-square-svgrepo.svg')}}" class="w-4 h-4 absolute top-4 right-4 cursor-pointer " alt="">
            <div class="flex flex-col space-y-4 p-4">
                <a href="{{route('Home')}}" class="cursor-pointer hover:text-gray-300">Home</a>
                <a href="{{route('events')}}" class="cursor-pointer hover:text-gray-300">Events</a>
                <a href="{{route('artists')}}"  class="cursor-pointer hover:text-gray-300">Artists</a>
                @guest
                <a href="{{route('register')}}" class=" bg-transparent px-6 py-2 rounded-full border-black border-2 hover:cursor-pointer">Join us</a>
                @endguest 
                @auth
                <form action="{{route('register')}}">
                @csrf
                <button class="bg-transparent px-6 py-2 rounded-full border-black border-2 hover:cursor-pointer">Log out</button>
                </form>    
                @endauth    

            </div>
        </nav>
        <div class="absolute top-52 right-0 left-0 flex flex-col items-center space-y-3">
            <h1 class="font-Kadwa font-bold text-white text-4xl  md:text-6xl">FEEL THE BEAT</h1>
            <p class="text-center text-lg md:text-xl">JOIN THE ULTIMATE MUSIC PARTY, Experience ,Discover,Book and dance your heart out</p>
            <button class="bg-white text-[#723A23] rounded-3xl w-[120px] px-2 py-2">Get Started</button>
        </div>
    </header>
    <!-- events -->
    <section class="my-5">
        <h2 class=" font-Kadwa text-4xl text-center font-semibold">Upcomming Events</h2>
        <!-- events -->
        <div class="flex justify-center items-center flex-wrap space-x-12 mt-5">
            @foreach($top3 as $top)
            <div class="relative ">
                <img src="{{asset($top->image)}}" class="w-[150px] h-[200px] md:w-[200px] md:h-[300px] rounded-xl object-cover shadow-lg" alt="">
                <span class="absolute top-2 right-2 border-2 border-white px-3 py-1 rounded-full flex items-center space-x-2">
                    <img src="{{asset('/images/icons/mdi-light_calendar.svg')}}" class="w-4 h-4" alt="">
                    <p class="text-white">{{$top->total_purchases}}</p>
                </span>
                <div class="flex justify-between items-center">
                    <p>{{$top->nom}}</p>
                    <img src="{{asset('/images/icons/memory_arrow-up.svg')}}" class="w-6 h-6" alt="">
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex justify-center items-center my-5">
            <a href="{{route('events')}}" class=" bg-white border-2 border-black px-6 py-2 rounded-full">View all event</a>
        </div>
    </section>
    <!-- why choose us -->
    <section>
        <h3 class="font-Kadwa text-4xl text-center font-semibold my-10">Why Choose us</h3>
        <div class="relative flex justify-center items-center flex-wrap gap-10">
            <!-- circle -->
            <div class="w-[200px] h-[200px] rounded-full bg-[#723A23] absolute top-0 -left-20 md:-left-32 lg:-left-48 md:w-[250px] md:h-[250px] lg:w-[400px] lg:h-[400px]"></div>
            <!-- cards -->
            <div class="flex flex-col items-center space-y-5 border border-black w-[340px] h-[200px]  p-2 z-10">
                <img src="{{asset('/images/icons/noto_party-popper.svg')}}" alt="">
                <h3 class=" font-Kadwa font-semibold text-center">Unforgettable Parties</h3>
                <p class=" font-sans text-[#818181] text-center text-sm">Discover the best events, from local hangouts to epic festivals.</p>
            </div>
            <div class="flex flex-col items-center space-y-5 border border-black w-[340px] h-[200px] p-2">
                <img src="{{asset('/images/icons/twemoji_man-dancing.svg')}}" alt="">
                <h3 class=" font-Kadwa font-semibold text-center">Unforgettable Parties</h3>
                <p class=" font-sans text-[#818181] text-center text-sm">Discover the best events, from local hangouts to epic festivals.</p>
            </div>
            <div class="flex flex-col items-center space-y-5 border border-black w-[340px] h-[200px] p-2">
                <img src="{{asset('/images/icons/fxemoji_lock.png')}}" alt="">
                <h3 class=" font-Kadwa font-semibold text-center">Unforgettable Parties</h3>
                <p class=" font-sans text-[#818181] text-center text-sm">Discover the best events, from local hangouts to epic festivals.</p>
            </div>
        </div>
    </section>
    <!-- what people say about us -->
    <section>
    <h4 class="font-Kadwa text-4xl text-center font-semibold mt-24 my-4">What People Say About Us</h4>
    <div class="flex justify-center items-center">
        <img class="my-5 " src="{{asset('/images/icons/Frame-37773.svg')}}" alt="">
    </div>
    <div class="flex justify-center items-center">
        <div class="carousel">
            <div class="carousel-quotes">
                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi voluptatem earum odit voluptate aut exercitationem nobis doloremque animi itaque sapiente? Laudantium sequi ullam adipisci ipsum repudiandae dolor provident dolores pariatur!
                Nostrum dicta natus consequatur debitis maiores voluptates harum ea esse, ab eius, praesentium, repellat deserunt veniam. Quidem, dolorem. Voluptas necessitatibus assumenda neque quo perferendis delectus commodi? Sapiente illum autem corrupti.</p>
                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam mollitia debitis molestiae ipsum deserunt libero animi nam deleniti iusto, perferendis vitae ullam saepe? Voluptate optio voluptatibus adipisci enim ea aliquam.
                Libero nesciunt minima asperiores odit maxime, architecto laborum numquam dolore dolores nisi obcaecati, quos quod? Deserunt, aspernatur delectus officia tempora soluta sint quasi iure. Repudiandae ratione suscipit in praesentium earum.</p>
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas odit nulla aliquam sint doloremque, assumenda ea suscipit amet minus eum quibusdam non explicabo enim molestias quod labore ullam quo laboriosam.
                Cumque iste adipisci, neque aliquid, debitis quas nostrum, nobis nihil esse aliquam dolorum sint veritatis nisi in sequi perferendis quos vero rem possimus quaerat? In, eligendi. Et laboriosam repellat dicta?</p>
            </div>
            <div class="dots">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>
    </section>
    <!-- notified -->
     <section class="w-full bg-[#723A23]">
        <div class="flex flex-col justify-center items-center py-5">
            <h5 class="text-white font-bold text-xl md:text-4xl font-Kadwa">Get notified when we lanch</h5>
            <p class="text-white font-sans text-sm">stay up to date with latest announcement</p>
            <form action="" class="mt-4">
                <div class="flex gap-3">
                    <input type="email" placeholder="enter your email" class="py-2 px-4 rounded-md">
                    <button class="px-3 py-2 bg-[#C0A677] text-black rounded-lg">subscribe</button>
                </div>
            </form>
        </div>
     </section>
     <!-- footer -->
      <x-footer/>
    <script>
        const menubutton = document.getElementById('menu');
        const menu = document.getElementById('phoneNav');
        const closeButton = document.getElementById('closeButton');

        menubutton.addEventListener('click', function() {
            menu.classList.remove('hidden');
        })

        closeButton.addEventListener('click', function() {
            menu.classList.add('hidden');
        })
        // carousel code
        let currentIndex = 0;
        let quotes = document.querySelectorAll('.carousel-quotes p');
        let dots = document.querySelectorAll('.dot');
        let totalQuotes = quotes.length;

        function updateCarousel(){
            // update carousel
            let carousel = document.querySelector('.carousel-quotes');
            carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            // update dots
            dots.forEach(dot=>dot.classList.remove('active'));
            dots[currentIndex].classList.add('active');
        }
        function nextCarousel(){
            currentIndex = (currentIndex  + 1) % totalQuotes;
            updateCarousel();
        }
        setInterval(nextCarousel,3000);
    </script>
</body>

</html>