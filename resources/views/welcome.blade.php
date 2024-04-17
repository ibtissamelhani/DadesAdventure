<x-user.navbar>
    <section id="dynamic-background" class="bg-center  bg-cover bg-no-repeat  bg-gray-700/50 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl "> Welcome to
                DadesAdventures, Dive into adventure! </h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Embark on unforgettable
                journeys with us. Explore our curated tours and activities for boundless exploration and exhilarating
                adventures. Book now!</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                @guest
                    <a href="{{ route('register') }}"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-cornell-red hover:bg-cornell-red/60 focus:ring-4 focus:ring-red-300 dark:focus:ring-cornell-red">
                        Get started
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                    <a href="{{ route('login') }}"
                        class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                        Log In
                    </a>
                @endguest
            </div>
        </div>
    </section>
    <section class="dark:bg-gray-900">
        <div class="container px-6 py-10  max-w-screen-xl mx-auto">
            <div class="text-center">
                <h1 class="text-2xl font-semibold text-delft-blue capitalize lg:text-3xl dark:text-white">Popular Things
                    To Do</h1>

                <p class="max-w-lg mx-auto mt-4 text-gray-400">
                    Chosen by our best seller experiences. Discover the most loved activities and top-rated tours
                    curated just for you.
                </p>
            </div>

            <div class="bg-blood-red/50 mt-6 py-10">
                <form class="flex justify-around flex-wrap">
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                      </select>
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative">
                        <input type="text" id="voice-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Mockups, Logos, Design Templates..." required />
                    </div>

                    <div date-rangepicker class="flex items-center flex-wrap">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input name="start" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date start">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input name="end" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date end">
                        </div>
                    </div>

                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>Search
                    </button>
                </form>

            </div>
            <div class="grid grid-cols-1 gap-2 mt-8 xl:mt-12 xl:gap-4 md:grid-cols-2 xl:grid-cols-4">
                @forelse ($activities as $activity)
                <div class="overflow-hidden bg-cover rounded-lg  cursor-pointer h-96 group"
                style="background-image:url('{{ asset($activity->getFirstMediaUrl('images')) }}')">
                <div
                        class="flex flex-col justify-center items-center w-full h-full px-8 py-4 transition-opacity duration-700 opacity-0 backdrop-blur-sm bg-gray-800/60 group-hover:opacity-100">
                        <p class="mt-2 text-lg tracking-wider text-gray-100">{{$activity->date}}</p>
                        <h1 class="mt-4 text-xl font-semibold text-white capitalize">{{$activity->category->name}}</h1>
                        <h2 class="mt-4 text-xl font-semibold text-white capitalize">{{$activity->name}}</h2>
                        <p class="mt-2 text-lg tracking-wider text-cornell-red font-semibold uppercase ">{{$activity->place->city->name}}</p>
                    </div>
                </div>
                @empty
                <li>No  Activities!.</li>
                @endforelse
            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 max-w-screen-xl mx-auto">
            <div class="text-left">
                <h1 class="text-2xl font-semibold text-gray-600 capitalize dark:text-white">Top destinations for your
                    next holiday</h1>

                <p class="max-w-lg   mt-4 text-gray-800">
                    Here's where your fellow travellers are headed
                </p>
            </div>
            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                        alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            How to use sticky note for problem solving
                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                    </div>
                </div>

                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                        alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#"
                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            How to use sticky note for problem solving
                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                    </div>
                </div>

                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="https://images.unsplash.com/photo-1544654803-b69140b285a1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                        alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#"
                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            Morning routine to boost your mood
                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 25 November 2020</span>
                    </div>
                </div>

                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="https://images.unsplash.com/photo-1530099486328-e021101a494a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1547&q=80"
                        alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#"
                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            All the features you want to know
                        </a>
                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 30 September 2020</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-user.navbar>
