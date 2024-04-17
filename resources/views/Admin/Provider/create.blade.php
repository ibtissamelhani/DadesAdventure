<x-admin.dashboard>
    <a href="{{ route('admin.providers.index') }}">
        <svg class="w-6 h-6 hover:text-cornell-red text-gray-800 dark:text-white" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
        </svg>
    </a>
    <div class="rounded-lg bg-white  p-8 shadow-lg  lg:col-span-3 lg:p-12">
        <form action="{{ route('admin.providers.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
            @csrf
            <div class="col-span-2 flex flex-col items-center justify-center rounded-full">
                <label for="image-input" class="cursor-pointer">
                    <img id="preview-image" class="w-40 h-40 shadow-xl border-2  border-gray-400 rounded-full"
                        src="{{ asset('images/profile.jpg') }}" alt="image">
                </label>
                <input type="file" id="image-input" name="profile" class="hidden" onchange="previewImage(event)">
                @error('profile')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">First Name</label>
                <input type="text" placeholder="John" name="first_name"
                    class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                @error('first_name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Last name</label>
                <input type="text" placeholder="Snow" name="last_name"
                    class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                @error('last_name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Phone number</label>
                <input type="text" placeholder="XXX-XX-XXXX-XXX" name="phone"
                    class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                @error('phone')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email address</label>
                <input type="email" placeholder="johnsnow@example.com" name="email"
                    class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                @error('email')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Password</label>
                <input type="text" placeholder="Enter password" name="password"
                    class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                @error('password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">City</label>
                <select id="countries" name="city_id"
                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                <option disabled selected>Choose a city</option>
                @foreach ($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
                  </select>
                @error('city_id')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="col-span-2 flex flex-col items-center justify-center mx-auto px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-cornell-red hover:bg-blood-red rounded-lg focus:outline-none focus:ring  focus:ring-opacity-50">
                <span>Add New Provider </span>
            </button>
        </form>
    </div>

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
</x-admin.dashboard>
