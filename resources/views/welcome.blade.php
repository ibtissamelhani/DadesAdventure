<x-user.navbar :experiences="$experiences" :destinations="$destinations">
    <section id="dynamic-background" class="bg-center  bg-cover bg-no-repeat h-screen bg-gray-700/50 bg-blend-multiply">
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

            <div class="mt-6">
                <form id="form" class="flex justify-center gap-5 flex-wrap">
                    <select id="category" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected value="">Choose a category</option>
                        @foreach ($experiences as $experience)
                            <option value="{{ $experience->id }}">{{ $experience->name }}</option>
                        @endforeach
                    </select>
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative">
                        <input type="text" id="title" name="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search..." />
                    </div>

                    <div class="flex items-center flex-wrap">
                        <div class="relative">
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="date" id="from" name="from"  />
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">

                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="date" id="to" name="to" />
                        </div>
                    </div>

                    <button type="submit" id="submit"
                        class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blood-red rounded-lg border border-blood-red hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>Search
                    </button>
                </form>

            </div>
            <div class="grid grid-cols-1 gap-2 mt-8 xl:mt-12 xl:gap-4 md:grid-cols-2 xl:grid-cols-4" id="activityWrapper">
                @forelse ($activities as $activity)
                    <a href="{{ route('details', $activity) }}" 
                        class=" overflow-hidden bg-cover rounded-lg  cursor-pointer h-96 group"
                        style="background-image:url('{{ asset($activity->getFirstMediaUrl('images')) }}')">
                        <div
                            class="flex flex-col justify-center items-center w-full h-full px-8 py-4 transition-opacity duration-700 opacity-0 backdrop-blur-sm bg-gray-800/60 group-hover:opacity-100">
                            <p class="mt-2 text-lg tracking-wider text-gray-100">{{ $activity->date }}</p>
                            <h1 class="mt-4 text-xl font-semibold text-white capitalize">{{ $activity->category->name }}
                            </h1>
                            <h2 class="mt-4 text-xl font-semibold text-white capitalize">{{ $activity->name }}</h2>
                            <p class="mt-2 text-lg tracking-wider text-cornell-red font-semibold uppercase ">
                                {{ $activity->place->city->name }}</p>
                            <p class="mt-2 text-lg tracking-wider text-white ">{{ $activity->price }} $ /person</p>
                        </div>
                    </a>
                @empty
                    <li>No Activities!.</li>
                @endforelse
                <div class="flex w-full mt-8">
                    {{ $activities->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </section>
    <section class="bg-blood-red/5 dark:bg-gray-900">
        <div class="container px-6 py-10 max-w-screen-xl mx-auto">
            <div class="text-left">
                <h1 class="text-3xl font-semibold text-cornell-red capitalize dark:text-white">Top destinations for your
                    next holiday</h1>

                <p class="max-w-lg   mt-4 text-gray-800">
                    Here's where your fellow travellers are headed
                </p>
            </div>
            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                @foreach ($topCities as $city)
                    <div class="lg:flex">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                            src="{{ $city->getFirstMediaUrl('cities') }}" alt="photo">

                        <div class="flex flex-col gap-4 py-6 lg:mx-6">
                            <a href="#"
                                class="text-xl font-semibold text-cornell-red hover:underline dark:text-white ">
                                {{ $city->name }}
                            </a>

                            <span class="text-sm text-gray-500 dark:text-gray-300">Explore the colors, flavors, and
                                stories that weave through these captivating destinations in North Africa</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-2xl font-semibold text-center text-gray-800 capitalize lg:text-3xl dark:text-white">
                What our <span class="text-cornell-red ">clients</span> say
            </h1>

            <p class="max-w-2xl mx-auto mt-6 text-center text-gray-500 dark:text-gray-300">
                Discover what our valued clients have to say about their experience with us. Our commitment to
                excellence shines through in the testimonials we receive.
            </p>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @forelse ($reviews as $review)
                        <div class="swiper-slide">
                            <div class=" mx-auto mt-8 xl:mt-10 max-w-2xl">
                                <div class="p-6 bg-gray-100 rounded-lg dark:bg-gray-800 md:p-8">
                                    <p class="leading-loose text-gray-500 dark:text-gray-300">
                                        “{{ $review->description }}”.
                                    </p>

                                    <div class="flex items-center mt-6">
                                        <img class="object-cover rounded-full w-14 h-14"
                                            src="{{ $review->user->getFirstMediaUrl('profiles') }}" alt="">

                                        <div class="mx-4">
                                            <h1 class="font-semibold text-blue-500">{{ $review->user->first_name }}
                                                {{ $review->user->last_name }}</h1>
                                            <span class="text-sm text-gray-500 dark:text-gray-300">client at
                                                DadesAdventures</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <p>---</p>
                    @endforelse
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </div>
    </section>
    @auth


        <section class="bg-gray-100">
            <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                    <div class="lg:col-span-2 lg:py-12">
                        <p class="max-w-xl text-lg">
                            We value your opinion! Your feedback is instrumental in helping us improve and tailor our
                            services to better meet your needs. If you've had a positive experience with us, we'd be
                            immensely grateful if you could take a moment to share your thoughts. Thank you for choosing us,
                            and we look forward to hearing about your experience
                        </p>


                    </div>

                    <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
                        <form action="{{ route('user.reviews.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <input class="w-full rounded-lg border-gray-200 p-3 text-sm" type="hidden"
                                    id="user_id" name="user_id" value="{{ Auth::user()->id }}" />
                            </div>
                            <div>
                                <label class="sr-only" for="message">Review</label>
                                <textarea class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Review" rows="8" id="message"
                                    name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <button type="submit"
                                    class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto">
                                    Send Your Review
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endauth

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script src="{{ asset('js/searchActivity.js') }}"></script>
</x-user.navbar>
