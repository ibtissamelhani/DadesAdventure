<x-profile.profile :user="Auth::user()">
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-6xl px-6 py-10 mx-auto">
            <p class="text-xl font-medium text-red-500 ">My Reservation for: </p>

            <h1 class="mt-2 text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">
                {{ $reservation->activity->category->name }}
            </h1>

            <main class="relative z-20 w-full mt-8 md:flex md:items-center xl:mt-12">
                <div class="absolute w-full bg-gray-50 -z-10 md:h-96 rounded-2xl"></div>

                <div
                    class="w-full p-6 bg-blood-red md:flex md:items-center rounded-2xl md:bg-transparent md:p-0 lg:px-12 md:justify-evenly">
                    <img class="h-24 w-24 md:mx-6 rounded-full object-cover shadow-md md:h-[32rem] md:w-80 lg:h-[36rem] lg:w-[26rem] md:rounded-2xl"
                        src="{{ $reservation->Activity->getFirstMediaUrl('images') }}" alt="photo" />

                    <div class="mt-2 md:mx-6">
                        <div>
                            <p class="text-xl font-medium tracking-tight text-black">{{ $reservation->activity->name }}
                            </p>
                            <p class="text-blue-500 ">City : {{ $reservation->activity->place->city->name }}</p>
                        </div>

                        <p class="mt-4 text-lg leading-relaxed text-gray-600 md:text-xl"> “{!! $reservation->activity->description !!}”.</p>
                        <div>
                            <span class="flex items-center">
                                <span class="h-px flex-1 bg-black"></span>
                                <span class="shrink-0 px-6">Activity address :</span>
                                <span class="h-px flex-1 bg-black"></span>
                            </span>
                            <p class="text-gray-600 py-4">{{ $reservation->activity->place->name }}
                                {{ $reservation->activity->place->address }} ,
                                {{ $reservation->activity->place->city->name }}</p>


                            <span class="flex items-center">
                                <span class="h-px flex-1 bg-black"></span>
                                <span class="shrink-0 px-6">date</span>
                                <span class="h-px flex-1 bg-black"></span>
                            </span>
                            <div class="flex items-center justify-center gap-8">
                                 <p class="text-gray-600 py-4">{{ $reservation->activity->date }} </p>
                            @php
                                $bookingDate = \Carbon\Carbon::parse($reservation->date); 
                                $today = \Carbon\Carbon::today();
                                $isPastBooking = $bookingDate->lt($today); 
                            @endphp
                            @if ($isPastBooking)
                                <span class=" text-red-800 bg-red-200 p-2  rounded">Past booking</span>
                            @else
                            <span class="  text-blue-800 bg-blue-200 p-2  rounded ">Upcoming booking</span>
                            @endif
                            </div>
                           

                            <span class="flex items-center">
                                <span class="h-px flex-1 bg-black"></span>
                                <span class="shrink-0 px-6">Activity price/person</span>
                                <span class="h-px flex-1 bg-black"></span>
                            </span>

                            <p class="text-gray-600 py-4">{{ $reservation->activity->price }} $/person</p>


                            <span class="flex items-center">
                                <span class="h-px flex-1 bg-black"></span>
                                <span class="shrink-0 px-6">Nunber of place reserved</span>
                                <span class="h-px flex-1 bg-black"></span>
                            </span>
                            <p class="text-gray-600 py-4">{{ $reservation->nbr_place }} places</p>

                            <span class="flex items-center">
                                <span class="h-px flex-1 bg-black"></span>
                                <span class="shrink-0 px-6">Price Payed</span>
                                <span class="h-px flex-1 bg-black"></span>
                            </span>
                            <p class="text-gray-600 py-4">{{ $reservation->amount }} $</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>
</x-profile.profile>
