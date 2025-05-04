<x-organizateurDashboardNav>
@if(session('success'))
    <div id="alert" class="fixed top-4 right-4 z-50">
        <div class="bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg flex items-center max-w-sm">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <div class="flex-1">
                <p class="font-medium">Success!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
            <button
                type="button"
                onclick="this.parentElement.remove()"
                class="ml-3 text-white hover:text-gray-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif
    @if ($errors->any())
<div class="fixed top-4 left-4 right-4 md:left-auto md:right-4 z-50 animate-slide-in max-w-md" id="validationalert">
    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg shadow-lg">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-semibold text-sm">Please fix the following errors</span>
            </div>
            <button 
                type="button" 
                onclick="this.closest('#validationalert').remove()" 
                class="text-red-600 hover:text-red-800 transition-colors"
                aria-label="Close"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <ul class="mt-2 text-sm list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

    <div class="p-6">
        <h1 class="text-xl font-semibold mb-6">Event Registration Form</h1>

        <form method="POST" action="{{route('registerEvent')}}" enctype="multipart/form-data">
            @csrf
            <!-- Event Image -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Event Image</label>
                <div class="flex items-center">
                    <button id="buttonFile" type="button" class="bg-black text-white text-sm rounded px-4 py-2 mr-3">Choisir un fichier</button>
                    <span id="" class="text-sm text-gray-500">Aucune fichier choisi</span>
                </div>
                <input type="file" name="image" id="image" class="hidden">
            </div>

            <!-- Event Name -->
            <div class="mb-4">
                <label for="event-name" class="block text-sm font-medium text-gray-700 mb-1">Event Name</label>
                <input type="text" id="event-name" name="nom" placeholder="Enter event name" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
            </div>

            <!-- Event Description -->
            <div class="mb-4">
                <label for="event-description" class="block text-sm font-medium text-gray-700 mb-1">Event Description</label>
                <textarea id="event-description" name="description" placeholder="Enter event description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm"></textarea>
            </div>

            <!-- Event Category -->
            <div class="mb-4">
                <label for="event-category" class="block text-sm font-medium text-gray-700 mb-1">Event Category</label>
                <select id="event-category" name="categorieId" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm bg-white">
                    <option selected disabled>Select event category</option>
                    @foreach($category as $c)
                    <option value="{{$c->id}}">{{$c->nom}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Event Artists -->
            <div class="mb-4">
                <label for="event-artist" class="block text-sm font-medium text-gray-700 mb-1">Event Artists</label>
                <select id="event-artist" name="artistId" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm bg-white">
                    <option selected disabled>Select event artists</option>
                    @foreach($artists as $artist)
                    <option value="{{$artist->id}}">{{$artist->Firstname}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Event Place -->
            <div class="mb-4">
                <label for="event-place" class="block text-sm font-medium text-gray-700 mb-1">Event Place</label>
                <input type="text" id="event-place" name="place" placeholder="Enter event place" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
            </div>

            <!-- Event Date and Time -->
            <div class="mb-4">
                <label for="event-date" class="block text-sm font-medium text-gray-700 mb-1">Event Date and Time</label>
                <input type="datetime-local" id="event-date" name="date" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
            </div>

            <!-- Event Capacity -->
            <div class="mb-4">
                <label for="event-capacity" class="block text-sm font-medium text-gray-700 mb-1">Event Place Capacity</label>
                <input type="number" id="event-capacity" name="numberOfPlace" placeholder="Enter number of available places" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
            </div>

            <!-- Event Price -->
            <div class="mb-6">
                <label for="event-price" class="block text-sm font-medium text-gray-700 mb-1">Event Price</label>
                <input type="text" id="event-price" name="taketPrice" placeholder="Enter Price" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
            </div>

            <!-- Event stockeTicket -->
            <div class="mb-6">
                <label for="event-stockeTicket" class="block text-sm font-medium text-gray-700 mb-1">Event stockeTicket</label>
                <input type="text" id="event-stockeTicket" name="stockeTicket" placeholder="Enter stockeTicket" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-black text-white font-medium py-3 px-4 rounded-md">Submit</button>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const button = document.getElementById('buttonFile');
            const image = document.getElementById('image');

            button.addEventListener('click', function() {
                image.click();
            });
        });
        setTimeout(() => {
            document.getElementById('alert').remove();
        }, 3000)
    </script>
</x-organizateurDashboardNav>
