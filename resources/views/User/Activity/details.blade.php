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
        <h1 class="{{$activity->capacity === 0? 'line-through text-red-500' : 'text-gray-100 text-xl' }}"><i class="fa-solid fa-chair"></i> places left : {{ $activity->capacity }}</h1>
        <h1 class="text-gray-100 text-xl"><i class="fa-solid fa-dollar-sign"></i> {{ $activity->price }} / person </h1>
        <h1 class="text-gray-100 text-xl"><i class="fa-solid fa-calendar-days"></i> date : {{ $activity->date }}</h1>
        <h1 class="text-gray-100 text-xl"><i class="fa-regular fa-clock"></i> duration : {{ $activity->duration }} hours
        </h1>
    </div>
    <section class="bg-white dark:bg-gray-900">
        <div class="container flex flex-col items-center px-4 py-12 mx-auto xl:flex-row">
            <div class="flex justify-center xl:w-1/2">
                <img class="h-80 w-80 sm:w-[28rem] sm:h-[28rem] flex-shrink-0 object-cover rounded-lg"
                    src="{{ $activity->getFirstMediaUrl('images') }}" alt="">
            </div>

            <div class="flex flex-col items-center mt-6 xl:items-start xl:w-1/2 xl:mt-0">
                <p class="block max-w-2xl mt-4 text-blue-500 dark:text-blue-500">Category :
                    {{ $activity->category->name }} </p>
                <h2 class="text-2xl font-semibold tracking-tight text-gray-800 xl:text-3xl dark:text-white">
                    {{ $activity->name }}
                </h2>
                <p class="block max-w-2xl mt-4 text-gray-500 dark:text-gray-300">{{ $activity->description }} </p>
                <p class="block max-w-xl mt-4 text-red-800 dark:text-red-500">Address : {{ $activity->place->name }},
                    {{ $activity->place->address }}, {{ $activity->place->city->name }} Morocco</p>
                <div class="flex p-4  mt-6 sm:-mx-2">
                    @if ($activity->guide)
                        <div
                            class="flex w-full max-w-sm overflow-hidden bg-gray-200 rounded-lg shadow-md dark:bg-gray-800">
                            <div class="w-2 bg-gray-800 dark:bg-gray-900"></div>
                            <div class="flex items-center px-2 py-3">
                                <img class="object-cover w-10 h-10 rounded-full" alt="User avatar"
                                    src="{{ $activity->guide->getfirstMediaUrl('profiles') }}">

                                <div class="mx-3">
                                    <p class="text-gray-600 dark:text-gray-200">Official Tour Guide : <a
                                            class="text-blue-500 dark:text-blue-300 hover:text-blue-400 hover:underline">
                                            {{ $activity->guide->first_name }} {{ $activity->guide->last_name }}</a>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($activity->capacity === 0)
                        <a
                            class="inline-flex items-center justify-center w-full px-2 text-sm py-2.5 overflow-hidden text-white transition-colors duration-300 bg-red-900 rounded-lg shadow sm:w-auto sm:mx-2 hover:bg-red-700 dark:bg-red-800 dark:hover:bg-gray-700 focus:ring focus:ring-gray-300 focus:ring-opacity-80 cursor-not-allowed">Souled
                            out</a>
                    @else
                        <a href="{{ route('user.reservation', $activity) }}"
                            class="inline-flex items-center justify-center w-full px-2 text-sm py-2.5 overflow-hidden text-white transition-colors duration-300 bg-gray-900 rounded-lg shadow sm:w-auto sm:mx-2 hover:bg-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 focus:ring focus:ring-gray-300 focus:ring-opacity-80">
                            <span class="mx-2">
                                Book Activity
                            </span>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <section class="bg-blood-red/5 dark:bg-gray-900">
        <div class="container flex flex-col items-center px-4 py-12 mx-auto text-center">
            <h2
                class="max-w-2xl mx-auto text-2xl font-semibold tracking-tight text-gray-800 xl:text-3xl dark:text-white">
                Does this look like fun? Book your tickets today!
            </h2>
            <div class="inline-flex w-full mt-6 sm:w-auto">
                @if ($activity->capacity === 0)
                <a 
                class="inline-flex items-center justify-center w-full cursor-not-allowed px-6 py-2 text-white duration-300 bg-cornell-red rounded-lg hover:bg-blood-red focus:ring focus:ring-red-300 focus:ring-opacity-80">
                sold out </a>
                @else
                     <a href="{{ route('user.reservation', $activity) }}"
                    class="inline-flex items-center justify-center w-full px-6 py-2 text-white duration-300 bg-cornell-red rounded-lg hover:bg-blood-red focus:ring focus:ring-red-300 focus:ring-opacity-80">
                    Book Activity </a>
                @endif
               
            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-2xl font-semibold text-center text-gray-800 capitalize lg:text-3xl dark:text-white">
                Reviews from our <span class="text-blue-500 ">guests</span>
            </h1>

            <p class="max-w-2xl mx-auto mt-6 text-center text-gray-500 dark:text-gray-300">
                Discover what our clients are saying about their experiences with us at Dades Adventures. From thrilling
                treks through the Atlas Mountains to immersive cultural tours of ancient Berber villages.
            </p>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @forelse ($reviews as $review)
                        
                    <div class="swiper-slide">
                        <div class=" mx-auto mt-8 xl:mt-10 max-w-2xl">
                            <div class="p-6 bg-gray-100 rounded-lg dark:bg-gray-800 md:p-8">
                                <p class="leading-loose text-gray-500 dark:text-gray-300">
                                    “{{$review->description}}”.
                                </p>

                                <div class="flex items-center mt-6">
                                    <img class="object-cover rounded-full w-14 h-14"
                                        src="{{ $review->user->getFirstMediaUrl('profiles') }}"
                                        alt="">

                                    <div class="mx-4">
                                        <h1 class="font-semibold text-blue-500">{{ $review->user->first_name}} {{ $review->user->last_name}}</h1>
                                        <span class="text-sm text-gray-500 dark:text-gray-300">client at DadesAdventures</span>
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
</x-user.navbar>
