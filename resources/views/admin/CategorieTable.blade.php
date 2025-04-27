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
                    <form action="{{route('modifierCategorie',$categorie->id)}}">
                    <button>Edit</button>
                    </form>|<button onclick="openModal('{{$categorie->id}}','{{$categorie->nom}}')" id="DeleteButton">Delete</button>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50 transition-opacity duration-300">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6 transform transition-all duration-300 scale-95" id="modal-content">
        <!-- Modal Header -->
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Delete Category</h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="mb-6">
            <p class="text-gray-600" id="Modal-message"></p>
        </div>

        <form id="delete-form" action="" method="POST">
            @csrf
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none transition-colors">Cancel</button>
                <button  class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none transition-colors">Delete</button>
            </div>
        </form>
    </div>
</div>
    <script>
        const modal = document.getElementById('modal');
        const modalContent = document.getElementById('modal-content')
        const deleteForm = document.getElementById('delete-form')
        const modalMessage = document.getElementById('Modal-message')
        function openModal(categorieId,categorieName){
            deleteForm.action = `/admin/deletCategorie/${categorieId}`
            modalMessage.textContent = `Are you sure you want to delete the category ${categorieName}`
            modal.classList.remove('hidden');
            modal.classList.add('opacity-100');
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }
        function closeModal(){
            modal.classList.toggle('hidden');
        }
    </script>
</x-AdminDashboardNav>