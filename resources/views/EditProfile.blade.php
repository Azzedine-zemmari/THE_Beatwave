<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100..900;1,100..900&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="font-sans bg-gray-50">
    <div class="max-w-3xl mx-auto p-6 bg-white border border-gray-200 rounded-md shadow-sm my-8">
        <h1 class="text-xl font-semibold mb-6">Edit Profile</h1>
        <form action="{{route('updateprofile')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Profile Image Section -->
            <div class="mb-8">
                <p class="text-sm mb-2">Profile Image</p>
                <div id="imagebutton" class="w-24 h-24 rounded-full bg-gray-200 mx-auto flex items-center justify-center">
                    @if($data->avatar)
                    <img src="{{asset('storage/'.$data->avatar)}}" class="w-full rounded-full" alt="">
                    @else
                    <img src="{{asset('/images/icons/camera.svg')}}" class="w-4 h-4" alt="">
                    @endif
                </div>
                <input type="file" id="image" class="hidden" name="avatar">
            </div>

            <!-- Full Name Field -->
            <div class="mb-6">
                <p class="text-sm mb-2">First name</p>
                <input type="text" value="{{$data->Firstname}}" placeholder="Enter full name" class="w-full p-2 border border-gray-300 rounded-md" name="Firstname">
            </div>
            <div class="mb-6">
                <p class="text-sm mb-2">last name</p>
                <input type="text" value="{{$data->LastName}}" placeholder="Enter full name" class="w-full p-2 border border-gray-300 rounded-md" name="LastName">
            </div>

            <!-- Bio Field -->
            <div class="my-6">
                <p class="text-sm mb-2">Bio</p>
                <textarea rows="5" placeholder="Enter bio" class="w-full p-2 border border-gray-300 rounded-md" name="bio">{{$data->bio}}</textarea>
            </div>

            <!-- Contact Information Section -->
            <div class="my-6">
                <p class="text-sm font-medium mb-2">Contact Information</p>
                <div class="space-y-4">
                    <input type="email" placeholder="Enter business email" value="{{$data->businessMail}}" class="w-full p-2 border border-gray-300 rounded-md" name="businessMail">
                    <input type="url" placeholder="Website URL" value="{{$data->websiteLink}}" class="w-full p-2 border border-gray-300 rounded-md" name="websiteLink">
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="my-6">
                <p class="text-sm font-medium mb-2">Social Media</p>
                <div class="space-y-4">
                    <input type="url" placeholder="Instagram profile URL" value="{{$data->instagramLink}}" class="w-full p-2 border border-gray-300 rounded-md" name="instagramLink">
                    <input type="url" placeholder="Facebook profile URL" value="{{$data->facebookLink}}" class="w-full p-2 border border-gray-300 rounded-md" name="facebookLink">
                </div>
            </div>

            @if($data->role == 'artist')
            <!-- Performance Section -->
            <div class="my-8">
                <p class="text-sm font-medium mb-4">Performance</p>
                <div class="space-y-4">
                    <div class="flex flex-col">
                        <p class="mb-2">Video file:</p>
                        <div class="flex w-full">
                            <button  id="buttonVedeo" class="bg-black text-white px-4 py-2 rounded-l-md">Upload as Mp4</button>
                            <input type="file" class="hidden" id="vedeo" name="vedeo">
                            <div class="flex-1 border-t border-r border-b border-gray-300 rounded-r-md p-2 text-sm text-gray-500">
                                Accepted format: mp4
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <p class="mb-2">Audio file:</p>
                        <div class="flex w-full">
                            <button  id="buttonSong" class="bg-black text-white px-4 py-2 rounded-l-md">Upload as Mp3</button>
                            <input type="file" class="hidden" id="song" name="song">
                            <div class=" flex-1 border-t border-r border-b border-gray-300 rounded-r-md p-2 text-sm text-gray-500">
                                Accepted format: mp3
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Save Button -->
            <div class="flex justify-end">
                <button class="bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800 transition-colors">Save changes</button>
            </div>
        </form>
    </div>
    <script>
        function handleButtonClick(buttonId,inputId){
            const button = document.getElementById(buttonId);
            const input = document.getElementById(inputId);

            button.addEventListener('click',function(e){
                e.preventDefault();
                input.click();
            })
        }
        handleButtonClick('imagebutton','image');
        handleButtonClick('buttonVedeo','vedeo');
        handleButtonClick('buttonSong','song');
    </script>
</body>

</html>