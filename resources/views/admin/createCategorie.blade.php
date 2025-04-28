<x-AdminDashboardNav>
@if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg shadow-md flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg shadow-md" id="validationalert">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-semibold">Please fix the following erros</span>
                    </div>
                    <button onclick="document.getElementById('validationalert').remove()" class="text-red-700 hover:text-red-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <ul class="mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="p-6">
        <h1 class="font-bold text-lg">Categorie formulaire</h1>
        <form action="{{isset($data) && $data ? route('updateCategorie') : route('insertCategorie')}}" method="post">
            @csrf 
            <div class="mt-3">
            @if (isset($data) && $data)
                <input type="hidden" name="id" value="{{ $data->id }}">
            @endif
            <div class="">
                <label for="">Name</label>
                <input type="text" name="nom" placeholder="Name" value="{{$data->nom ?? ''}}" class="w-full p-3 rounded-lg border placeholder:pl-4 mt-1">
            <div class="mt-3">
                <label for="">Description</label>
                <textarea name="description" placeholder="Description" class="w-full p-3 rounded-lg border placeholder:pl-4 resize-none h-[150px] mt-1">{{$data->description ?? '' }}</textarea>
            </div>
            <button class="bg-black px-4 py-2 rounded-lg mt-3 text-white text-md">submit</button>
            </div>
        </form>
    </div>
</x-AdminDashboardNav>