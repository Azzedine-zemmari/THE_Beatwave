<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Beatwave</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f8f4f0] font-sans">
    <main class="w-full flex min-h-screen overflow-hidden">
        <div class="hidden md:block w-1/2 bg-gray-100">
            <div class="h-screen fixed w-1/2 left-0">
                <img src="{{asset('/images/loging.png')}}" class="object-cover h-full w-full" alt="Beatwave login image">
            </div>
        </div>
        
        <div class="w-full flex justify-center items-center p-6 md:w-1/2">
            <div class="w-full max-w-md">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-[#121212] mb-2">BeatWave</h1>
                    <p class="text-gray-500">You are new here <a href="{{route('register')}}" class="text-[#E7826B] font-medium hover:underline">Register</a></p>
                </div>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1 rounded-lg">Email</label>
                        <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="you@example.com" class="w-full px-4 py-3 bg-white rounded border border-gray-300 focus:border-[#E7826B] outline-none transition">
                        @error('email')
                        <p class="text-sm text-[#E7826B] font-semibold">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1 rounded-lg">Password</label>
                        <input type="password" id="password" name="password" placeholder="Create a strong password" class="w-full px-4 py-3 bg-white rounded border border-gray-300 focus:border-[#E7826B] outline-none transition">
                        <p class="mt-1 text-xs text-gray-500 @error('password') hidden @enderror">Must be at least 8 characters</p>
                        @error('password')
                        <p class="text-sm text-[#E7826B] font-semibold">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="w-full bg-[#E7826B] text-white py-3 px-4 rounded-lg font-medium hover:bg-[#d6715b] transition duration-200 shadow-md">
                            Log in
                        </button>
                    </div>
                    <div class="relative flex justify-center items-center my-6">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="flex-shrink mx-4 text-gray-500 text-sm">or continue with</span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>
                    <a href="{{route('redirect.google')}}" class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg bg-gray-50">
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                        </svg>
                        Google
                    </a>
                </form>
            </div>
        </div>
    </main>
</body>

</html>