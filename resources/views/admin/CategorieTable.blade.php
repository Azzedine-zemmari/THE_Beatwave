<x-AdminDashboardNav>
    <div class="p-6">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($data as $categorie)
                <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$categorie->nom }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{$categorie->description }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <span>Edit</span>|<span>Delete</span>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</x-AdminDashboardNav>