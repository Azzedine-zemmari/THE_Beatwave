<x-AdminDashboardNav>
@if(session('success'))
    <div id="alert" class="fixed top-4 right-4 z-50">
        <div class="bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg flex items-center max-w-sm">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <div class="flex-1">
                <p class="font-medium">Success!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
            <button
                type="button"
                onclick="this.parentElement.remove()"
                class="ml-3 text-white hover:text-gray-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif
    @if ($errors->any())
<div class="fixed top-4 left-4 right-4 md:left-auto md:right-4 z-50 max-w-md" id="alert">
    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg shadow-lg">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-semibold text-sm">Please fix the following errors</span>
            </div>
            <button 
                type="button" 
                onclick="this.closest('#validationalert').remove()" 
                class="text-red-600 hover:text-red-800 transition-colors"
                aria-label="Close"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <ul class="mt-2 text-sm list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
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
    <script>
        setTimeout(() => {
            document.getElementById('alert').remove();
        }, 3000)
    </script>
</x-AdminDashboardNav>