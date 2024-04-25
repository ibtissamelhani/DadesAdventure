<x-admin.dashboard :totalActivities="$totalActivities" :totalUsers="$totalUsers" :totalReservation="$totalReservation">

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


                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-cornell-red rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blood-red/85 dark:hover:bg-blood-red dark:bg-blood-red"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Add Place
                    </button>

                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Add New Place
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('admin.places.store') }}" method="POST" class="space-y-4 p-10">
                                    @csrf
                                    <div>
                                        <label class="sr-only" for="name">Name</label>
                                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Name"
                                            type="text" id="name" name="name" />
                                    </div>

                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                        <div>
                                            <label class="sr-only" for="email">Email</label>
                                            <input class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                                placeholder="Email address" type="email" id="email"
                                                name="email" />
                                        </div>

                                        <div>
                                            <label class="sr-only" for="phone">Phone</label>
                                            <input class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                                placeholder="Phone Number" type="tel" id="phone"
                                                name="phone" />
                                        </div>
                                    </div>
                                    <select id="cities" name="city_id"
                                        class="w-full rounded-lg border-gray-200 p-3 text-sm">
                                        <option disabled selected>Choose a city</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <select id="cities" name="type_id"
                                        class="w-full rounded-lg border-gray-200 p-3 text-sm">
                                        <option disabled selected>Choose a type</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <div>
                                        <label class="sr-only" for="message">Address</label>
                                        <textarea name="address" class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Address" rows="2"
                                            id="message"></textarea>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit"
                                            class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto">
                                            add new place
                                        </button>
                                    </div>
                                </form>                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-x-3">
                                                <span># N°</span>
                                            </div>
                                        </th>

                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Place Name
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Address
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Email
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Type
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            City
                                        </th>

                                        <th scope="col" class="relative py-3.5 px-4">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @forelse ($places as $place)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center gap-x-3">
                                                    <div class="flex items-center gap-x-2">


                                                        <div>
                                                            <h2 class="font-normal text-gray-800 dark:text-white ">
                                                                {{ $place->id }}</h2>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-12 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                                {{ $place->name }}
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $place->address }}</td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $place->email }}</td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $place->type->name }}</td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $place->city->name }}</td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center gap-x-6">
                                                    <form action="{{ route('admin.places.destroy', $place->id) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button
                                                            class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-5 h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    
                                                    <a href="{{route('admin.places.edit', $place->id)}}" class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <div
                                            class="flex items-center mt-6 text-center border rounded-lg h-96 dark:border-gray-700">
                                            <div class="flex flex-col w-full max-w-sm px-4 mx-auto">
                                                <div
                                                    class="p-3 mx-auto text-blue-500 bg-blue-100 rounded-full dark:bg-gray-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                                    </svg>
                                                </div>
                                                <h1 class="mt-3 text-lg text-gray-800 dark:text-white">No Places
                                                    found</h1>
                                                <div class="flex items-center mt-4 sm:mx-auto gap-x-3">
                                                    <button
                                                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>

                                                        <span>Add Place</span>
                                                    </button>
                                                </div>
                                            </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="px-8 flex gap-10 py-2">
                            {{ $places->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

</x-admin.dashboard>
