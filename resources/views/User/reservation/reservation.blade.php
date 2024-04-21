<x-user.navbar :experiences="$experiences" :destinations="$destinations">
    <div class="w-full bg-center bg-cover lg:py-10 h-72"
        style="background-image: url('{{ asset($activity->getFirstMediaUrl('images')) }}'); background-size: cover;">
        <div class="flex items-center justify-center w-full h-full bg-black/50">
            <div class="text-center">
                <h1 class="text-3xl font-semibold text-white lg:text-4xl">Book <span
                        class="text-cornell-red">{{ $activity->name }}</span> Now!</h1>
                <img src="{{ asset('images/logoWhite.png') }}" class="mx-auto w-36 " alt="logo">
            </div>
        </div>
    </div>
    <div class="flex items-center justify-around w-full h-full py-6 px-2 bg-blood-red flex-wrap">
        <h1 class="text-gray-100 text-xl"><i class="fa-solid fa-chair"></i>Left places : {{ $activity->capacity }}</h1>
        <h1 class="text-gray-100 text-xl"><i class="fa-solid fa-dollar-sign"></i> {{ $activity->price }} / person </h1>
        <h1 class="text-gray-100 text-xl"><i class="fa-solid fa-calendar-days"></i> date : {{ $activity->date }}</h1>
        <h1 class="text-gray-100 text-xl"><i class="fa-regular fa-clock"></i> duration : {{ $activity->duration }} hours
        </h1>
    </div>
    <div class="mt-2 dark:bg-gray-800">
        <div class="container flex items-center px-6 py-4 mx-auto overflow-x-auto whitespace-nowrap">


            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="{{ route('details', $activity) }}"
                class="flex items-center  text-blue-600 -px-2 dark:text-gray-200 hover:underline">
                <span class="mx-2">Reservation</span>
            </a>

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="flex items-center text-gray-600 -px-2 dark:text-blue-400 hover:underline">
                <span class="mx-2">Payement</span>
            </a>
        </div>
    </div>

    <div class=" flow-root rounded-lg border border-gray-100 m-6 py-3 md:px-36 shadow-sm">
        <dl class="-my-3 divide-y divide-gray-100 text-sm">
            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Activity</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ $activity->name }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Activity Type</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ $activity->category->name }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Date</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ $activity->date }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Duration</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ $activity->duration }} Hours</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Left PLaces</dt>
                <dd class="text-red-600 sm:col-span-2">{{ $activity->capacity }} places</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Price</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ $activity->price }} $/person</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">number of places</dt>
                <dd class="text-gray-700 sm:col-span-2">

                    <div class="col-span-2 sm:col-span-1">
                        <div class="flex  py-4">
                            <input type="number" value="1" id="Number_of_Places" name="number_place"
                                class="bg-gray-50 border mx-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                min="1"
                                max="10"
                                required="">
                        </div>
                        <div id="numberError" class="text-red-500 text-sm hidden">Please enter a number between 1 and 10.</div>
                    </div>

                    <a href="{{ route('user.stripe', ['activity' => $activity]) }}"
                        class="text-white inline-flex items-center bg-cornell-red hover:bg-cornell-red focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Reserve
                    </a>
                </dd>
            </div>
        </dl>
    </div>

    <script src="{{ asset('js/countPlace.js') }}"></script>
   
</x-user.navbar>
