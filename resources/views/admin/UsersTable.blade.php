<x-AdminDashboardNav>
    <div class="p-6">
    <div class="mb-6">
            <form action="{{ route('UserSearch') }}" method="post" class="bg-white rounded-lg shadow p-4 flex items-center space-x-3">
                @csrf
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="name" 
                        placeholder="Enter user name..." 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                    >
                </div>
                <button 
                    type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 "
                >
                    Search
                </button>
            </form>
        </div>
        <div class="bg-white rounded-lg shadow overflow-auto lg:overflow-hidden">
            <table class="min-w-full divide-y divide-gray-50">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-meduim text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-meduim text-gray-500 uppercase tracking-wider">Role</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-meduim text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-meduim text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($data as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{$user->Firstname}} {{$user->LastName}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{$user->email}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{$user->type}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <p class="border rounded-full py-2 text-center @if($user->deleted_at === null) text-blue-600 bg-blue-200 border-blue-300 @else text-red-600 bg-red-200 border-red-300 @endif">{{$user->deleted_at === null ? 'Active' : 'Archive'}}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <button onclick="openModal('{{$user->userId}}','{{$user->Firstname}}','{{$user->type}}')">Archiver</button>   
                            <button>Active</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50 transition-opacity duration-300">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6 transform transition-all duration-300 scale-95" id="modal-content">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Archive user</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>   
            </div>
                <div class="mb-6">
                    <p class="text-gray-600" id="Modal-message"></p>
                </div>
                <form id="archive-form" action="" method="post">
                    @csrf 
                    <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover-bg-gray-300 focus:outline-none transition-colors">Cancel</button>
                            <button  class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none transition-colors">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    <script>
        const modal = document.getElementById('modal');
        const modalContent = document.getElementById('modal-content')
        const archiveForm = document.getElementById('archive-form')
        const ModalMessage = document.getElementById('Modal-message')

        function openModal(userId,userName,userRole){
            archiveForm.action = `/admin/ArchiveUser/${userId}`
            ModalMessage.textContent = `Are you sure you want to delete the ${userRole} ${userName} `;
            modal.classList.remove('hidden')
            modal.classList.add('opacity-100')
            modalContent.classList.remove('scale-95')
            modalContent.classList.add('scale-100')
        }
        function closeModal(){
            modal.classList.toggle('hidden')
        }
    </script>
</x-AdminDashboardNav>