<x-organizateurDashboardNav>
    <div class="p-6">
        <h1 class="text-xl font-semibold mb-6">Event Registration Form</h1>

        <form>
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
                <input type="text" id="event-name" name="eventName" placeholder="Enter event name" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
            </div>

            <!-- Event Description -->
            <div class="mb-4">
                <label for="event-description" class="block text-sm font-medium text-gray-700 mb-1">Event Description</label>
                <textarea id="event-description" name="description" placeholder="Enter event description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm"></textarea>
            </div>

            <!-- Event Category -->
            <div class="mb-4">
                <label for="event-category" class="block text-sm font-medium text-gray-700 mb-1">Event Category</label>
                <select id="event-category" name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm bg-white">
                    <option selected disabled>Select event category</option>
                </select>
            </div>

            <!-- Event Artists -->
            <div class="mb-4">
                <label for="event-artist" class="block text-sm font-medium text-gray-700 mb-1">Event Artists</label>
                <select id="event-artist" name="artist" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm bg-white">
                    <option selected disabled>Select event artists</option>
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
                <input type="number" id="event-capacity" name="capacity" placeholder="Enter number of available places" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
            </div>

            <!-- Event Price -->
            <div class="mb-6">
                <label for="event-price" class="block text-sm font-medium text-gray-700 mb-1">Event Price</label>
                <input type="text" id="event-price" name="price" placeholder="Enter Price" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
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
    </script>
</x-organizateurDashboardNav>
