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

<div class="p-6">
    <!-- Table of Events -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Transaction ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Event</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ticket Price</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($data as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->Firstname }} {{ $item->LastName }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->transactionId }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->nom }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->taketPrice }} $
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-organizateurDashboardNav>
