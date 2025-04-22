<x-AdminDashboardNav>
    <div class="p-6">
            <!-- Table of Users -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                requested_role
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Row 1 -->
                         @foreach($data as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{$item->Firstname}} {{$item->LastName}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$item->requested_role == 1 ? 'organizer' : 'artist' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if($item->status == 'pending') bg-yellow-100 text-yellow-800 @elseif($item->status == 'approved') bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                    {{$item->status}}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <form action="{{route('role-change.approve',$item->id)}}" method="POST">
                                    @csrf
                                    <button class="text-green-600 hover:text-green-900 mr-2">Approve</button>
                                </form>
                                <form action="{{route('role-change.rejected',$item->id)}}" method="POST">
                                    @csrf
                                    <button class="text-red-600 hover:text-red-900">Reject</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-AdminDashboardNav>