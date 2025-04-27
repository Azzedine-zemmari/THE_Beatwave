<x-AdminDashboardNav>
    <div class="p-6">
        <div class="bg-white rounded-lg shadow overflow-hidden">
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
                            <form method="post" action="{{route('archiveUser',$user->userId)}}">
                                @csrf 
                                <button>Archiver</button>   
                            </form>
                            <button>Active</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-AdminDashboardNav>