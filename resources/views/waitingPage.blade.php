<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting page</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="font-sans">
    <main class=" max-w-7xl mx-auto flex justify-center items-center h-screen flex-col">
        <img src="{{asset('/images/icons/Waiting.svg')}}" class=" w-20 h-20" alt="Wait">
        <h1 class=" font-medium  text-[#0460BB] text-2xl">Almost There!</h1>
        <p class="font-medium ">Your Event Organizer Account is Under Review</p>
        <p class="font-medium text-[#818181] max-w-[400px] text-center mt-5">Our admin team is currently reviewing your account. This process typically takes 24-48 hours.</p>
        <div class="flex flex-col space-y-10 mt-5 ">
            <div class="flex items-center w-[400px] justify-center">
                <div class="w-6 h-6 flex items-center justify-center mr-4">
                    <img src="{{asset('/images/icons/check-circle.svg')}}" class="w-5 h-5" alt="check">
                </div>
                <p>Application submitted successfully</p>
            </div>

            <div class="flex items-center w-[400px] justify-center">
                <div class="w-6 h-6 flex justify-center items-center mr-4">
                    <img src="{{asset('/images/icons/loader.svg')}}" class="w-6 h-6" alt="check">
                </div>
                <p>Application submitted successfully</p>
            </div>

            <div class="flex items-center w-[400px] justify-center">
                <div class="w-6 h-6 flex items-center justify-center mr-4">
                    <img src="{{asset('/images/icons/gray-check-circle.svg')}}" class="w-5 h-5" alt="check">
                </div>
                <p>Application submitted successfully</p>
            </div>
        </div>
    </main>
</body>

</html>