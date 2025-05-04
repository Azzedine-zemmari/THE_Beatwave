<x-organizateurDashboardNav>
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        <strong class="font-bold">Success!</strong>
        <span class="">{{ session('success') }}</span>
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
            ✖
        </button>
    </div>
@endif

<div class="flex flex-col sm:flex-row justify-center items-center gap-3 mt-4 px-4">
    <div class="w-full sm:w-[180px] md:w-[200px] p-3 border-2 border-black rounded-xl flex justify-center items-center flex-col mb-3 sm:mb-0">
        <p class="font-bold text-xl md:text-2xl text-[#7A38FC]">{{$eventCounter}}</p>
        <p class="font-semibold">Events</p>
    </div>
    <div class="w-full sm:w-[180px] md:w-[200px] p-3 border-2 border-black rounded-xl flex justify-center items-center flex-col mb-3 sm:mb-0">
        <p class="font-bold text-xl md:text-2xl text-[#7A38FC]">{{$inscriptionCounter}}</p>
        <p class="font-semibold">Inscription</p>
    </div>
    <div class="w-full sm:w-[180px] md:w-[200px] p-3 border-2 border-black rounded-xl flex justify-center items-center flex-col">
        <p class="font-bold text-xl md:text-2xl text-[#7A38FC]">{{$revenu}}</p>
        <p class="font-semibold">Revenue</p>
    </div>
</div>

<div class="p-3 md:p-6">
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-2 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-2 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden md:table-cell">Description</th>
                    <th class="px-2 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-2 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                    <th class="px-2 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden sm:table-cell">N_Place</th>
                    <th class="px-2 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden lg:table-cell">Artist</th>
                    <th class="px-2 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden md:table-cell">Category</th>
                    <th class="px-2 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden md:table-cell">Place</th>
                    <th class="px-2 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($data as $event)
                    <tr>
                        <td class="px-2 md:px-6 py-2 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900">{{ $event->nom }}</td>
                        <td class="px-2 md:px-6 py-2 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900 hidden md:table-cell">{{ Str::limit($event->description, 30) }}</td>
                        <td class="px-2 md:px-6 py-2 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900">{{ $event->date }}</td>
                        <td class="px-2 md:px-6 py-2 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900">${{ $event->taketPrice }}</td>
                        <td class="px-2 md:px-6 py-2 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900 hidden sm:table-cell">{{ $event->numberOfPlace }}</td>
                        <td class="px-2 md:px-6 py-2 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900 hidden lg:table-cell">{{ $event->Firstname }} {{ $event->LastName }}</td>
                        <td class="px-2 md:px-6 py-2 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900 hidden md:table-cell">{{ $event->Category }}</td>
                        <td class="px-2 md:px-6 py-2 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900 hidden md:table-cell">{{ $event->place }}</td>
                        <td class="px-2 md:px-6 py-2 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900">
                            <div class="flex space-x-2">
                                <a href="{{route('editEvent',$event->eventId)}}" class="text-indigo-600 hover:text-indigo-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{route('destory',$event->eventId)}}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end my-3">
        {{$data->links()}}
    </div>
</div>
</x-organizateurDashboardNav>