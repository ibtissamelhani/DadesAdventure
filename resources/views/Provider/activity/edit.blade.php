<x-provider.dashboard>
    <a href="{{ route('provider.activities.index') }}">
        <svg class="w-6 h-6 hover:text-cornell-red text-gray-800 dark:text-white" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
        </svg>
    </a>
    <div class="">
        <div class=" p-8  lg:col-span-3 lg:p-12">
            <form action="{{ route('provider.activities.update', $activity->id ) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @method('put')
                @csrf
                <div class="col-span-2 flex flex-col items-center justify-center">
                    <label for="image-input" class="cursor-pointer">
                        <img id="preview-image" class=" h-32 w-60  shadow-xl border-2 border-gray-400"
                            src="{{ $activity->getFirstMediaUrl('images') }}" alt="image">
                    </label>
                    <input type="file" id="image-input" name="image" class="hidden" onchange="previewImage(event)">
                    @error('image')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input class="w-full rounded-lg border-gray-200 p-3 text-sm" name="provider_id" type="hidden"
                        value="{{ Auth::user()->id }}" id="provider_id" />
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="text-blue-700 font-semibold">Title</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm" name="name" placeholder="Title"
                            type="text" id="name" value="{{ $activity->name }}" />
                        @error('name')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="location" class="text-blue-700 font-semibold">Location</label>
                        <select name="place_id" class="w-full rounded-lg border border-gray-200 p-3 text-sm">
                            <option value="{{ $activity->place->id }}" selected disabled>{{ $activity->place->name }}
                            </option>
                            @foreach ($places as $place)
                                <option value="{{ $place->id }}">{{ $place->name }}</option>
                            @endforeach
                        </select>
                        @error('place_id')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                    <div>
                        <label for="date" class="text-blue-700 font-semibold">Activity Date</label>
                        <input id="date" type="date"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm" name="date"
                            placeholder="Date" value="{{ $activity->date }}"
                            min="{{ \Carbon\Carbon::now()->toDateString() }}" />
                        @error('date')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="text-blue-700 font-semibold">Price per Person</label>
                        <input id="price" type="number"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm" name="price"
                            placeholder="Price" value="{{ $activity->price }}" />
                        @error('price')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="capacity" class="text-blue-700 font-semibold">Capacity</label>
                        <input id="capacity" type="number"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm" name="capacity"
                            placeholder="Capacity" value="{{ $activity->capacity }}" />
                        @error('capacity')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                    <div>
                        <input id="capacity" type="number"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm" name="duration"
                            placeholder="duration in hours" value="{{ $activity->duration }}" />
                            @error('duration')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                    </div>
                    <div>
                        <select name="guide_id" class="w-full rounded-lg border border-gray-200 p-3 text-sm">
                            @if ($activity->guide)
                                <option value="{{ $activity->guide->id }}" selected disabled>
                                    {{ $activity->guide->first_name }}</option>
                            @endif
                            @foreach ($guides as $guide)
                                <option value="{{ $guide->id }}">{{ $guide->name }}</option>
                            @endforeach
                        </select>
                        @error('guide_id')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <select id="category-select" name="category_id"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm">
                            <option value="{{ $activity->category->id }}" selected disabled>
                                {{ $activity->category->name }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="sr-only" for="message">Description</label>
                    <textarea class="w-full rounded-lg border-gray-200 p-3 text-sm" name="description" placeholder="Activity Description"
                        rows="8" id="message">{{ $activity->description }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="inline-block w-full rounded-lg bg-blood-red hover:bg-cornell-red px-5 py-3 font-medium text-white sm:w-auto">
                        Update Activity
                    </button>
                </div>
            </form>
        </div>
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
</x-provider.dashboard>
