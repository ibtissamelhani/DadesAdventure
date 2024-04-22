<x-profile.profile :user="$user">
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-8 grid grid-cols-6 gap-6">
        @method('patch')
        @csrf
        <div class="flex flex-col col-span-6 items-center justify-center">
            <label for="image-input" class="cursor-pointer">
                <img id="preview-image"
                    class="h-28 w-28 rounded-full shadow-xl border-2 border-gray-400"
                    src="{{ $user->getMedia('profiles')->isNotEmpty()? $user->getFirstMediaUrl('profiles') : asset('images/profile.jpg') }}" alt="logo">
            </label>
            <input type="file" id="image-input" name="image" class="hidden"
                onchange="previewImage(event)">
                @error('image')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="FirstName" class="block text-sm font-medium text-gray-700">
                First Name
            </label>

            <input type="text" id="FirstName" name="first_name"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" value="{{ $user->first_name }}" />
            @error('first_name')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="LastName" class="block text-sm font-medium text-gray-700">
                Last Name
            </label>

            <input type="text" id="LastName" name="last_name"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" value="{{ $user->last_name}}"/>
                @error('last_name')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="Email" class="block text-sm font-medium text-gray-700"> Email </label>

            <input type="email" id="Email" name="email"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" value="{{ $user->email }}"/>
                @error('email')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="phone" class="block text-sm font-medium text-gray-700"> Phone </label>

            <input type="text" id="phone" name="phone"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" value="{{ $user->phone }}"/>
                @error('phone')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
       

        <div class="col-span-6 mx-auto sm:flex sm:items-center sm:gap-4">
            <button
                class="inline-block shrink-0 rounded-md  bg-delft-blue px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-900  focus:outline-none focus:ring active:text-blue-500">
                Update account
            </button>
{{-- 
            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
               
                <a href="" class="text-red-700 underline hover:text-red-500">edit password</a>.
            </p> --}}
        </div>
    </form>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-profile.profile>