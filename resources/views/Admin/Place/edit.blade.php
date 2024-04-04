<x-admin.dashboard>

    <div class="  mb-4 rounded bg-gray-100 dark:bg-gray-800">
        <section class="container px-6 mx-auto">
            <div class="text-bold  sm:flex sm:items-center sm:justify-between">
                <div>
                    <div class="flex items-center gap-x-3">
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Activity Places</h2>
                        <span
                            class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ $countPlaces }}
                            places</span>
                    </div>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Place encompass a broad spectrum of
                        locations and environments that offer distinct experiences for visitors</p>
                </div>
                <div class="flex items-center mt-4 gap-x-3">
@if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
            <form action="{{ route('admin.places.update', $place->id) }}" method="POST" class="space-y-4 p-10">
                @method('put')
                @csrf
                <div>
                    <label class="sr-only" for="name">Name</label>
                    <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Name"
                        type="text" id="name" name="name" value="{{$place->name}}" />
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="sr-only" for="email">Email</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm"
                            placeholder="Email address" type="email" id="email"
                            name="email" value="{{$place->email}}" />
                    </div>

                    <div>
                        <label class="sr-only" for="phone">Phone</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm"
                            placeholder="Phone Number" type="tel" id="phone"
                            name="phone" value="{{$place->phone}}" />
                    </div>
                </div>
                <select id="cities" name="city_id"
                    class="w-full rounded-lg border-gray-200 p-3 text-sm">
                    <option value="{{$place->city->id}}"  disabled selected>{{$place->city->name}}</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                <select id="cities" name="type_id"
                    class="w-full rounded-lg border-gray-200 p-3 text-sm">
                    <option value="{{$place->type->id}}" disabled selected>{{$place->type->name}}</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                <div>
                    <label class="sr-only" for="message">Address</label>
                    <textarea name="address" class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Address" rows="2"
                        id="message">{{$place->address}}</textarea>
                </div>

                <div class="mt-4">
                    <button type="submit"
                        class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto">
                        update place
                    </button>
                </div>
            </form>
        </section>
    </div>

</x-admin.dashboard>
