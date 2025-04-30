<x-AdminDashboardNav>
    <div class="p-6">
        <div class="flex justify-end">
            <a  href="{{route('admin.addCategory')}}" class="bg-black text-white px-3 py-2 mb-2">Create Category</a>
        </div>
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
                    <form action="{{route('modifierCategorie',$categorie->id)}}">
                    <button class="bg-blue-500 text-white rounded-xl  hover:bg-blue-600 px-4 py-2 ">Edit</button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</x-AdminDashboardNav>