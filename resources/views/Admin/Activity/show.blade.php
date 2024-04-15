<x-admin.dashboard>
    <a href="{{ route('admin.activities.index') }}">
        <svg class="w-6 h-6 hover:text-cornell-red text-gray-800 dark:text-white" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
        </svg>
    </a>
    <section>
        <div class="container px-6 py-10 mx-auto">
            <div class="lg:-mx-6 lg:flex lg:items-center">
                <img class="object-cover object-center lg:w-1/2 lg:mx-6 w-full h-96 rounded-lg lg:h-[36rem]"
                    src="{{ $activity->getFirstMediaUrl('images') }}" alt="">

                <div class="mt-8 lg:w-1/2 lg:px-6 lg:mt-0">
                    <p class="text-5xl font-semibold text-cornell-red ">“</p>

                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white lg:text-3xl lg:w-96">
                        {{ $activity->name }}
                    </h1>

                    <p class="max-w-lg mt-6 text-gray-500 dark:text-gray-400 ">
                        “ {{ $activity->description }} ”
                    </p>

                    <h3 class="mt-6 mb-3 text-lg font-medium text-cornell-red">Activity Provider :
                        {{ $activity->provider->first_name }} {{ $activity->provider->last_name }}</h3>
                    <h3 class="mt-6 mb-3 text-lg font-medium text-delft-blue">N° places : {{ $activity->capacity }}</h3>
                    <h3 class="mb-3 text-lg font-medium text-delft-blue">Price per Person: {{ $activity->price }} £</h3>
                    <h3 class="mb-3 text-lg font-medium text-delft-blue">Place: {{ $activity->place->name }}</h3>
                    <h3 class="mb-3 text-lg font-medium text-delft-blue">Guide:
                        {{ $activity->guide ? $activity->guide->first_name : '---' }} </h3>
                    <p class="mt-6 text-gray-600 dark:text-gray-300">date : {{ $activity->date }}</p>
                    <p class="mb-3 text-gray-600 dark:text-gray-300">Category : {{ $activity->category->name }}</p>
                    @if ($activity->status == 1)
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <p class="whitespace-nowrap text-sm">published</p>
                        </span>
                    @else
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z" />
                            </svg>

                            <p class="whitespace-nowrap text-sm">Pending</p>
                        </span>
                    @endif
                    <div class="flex items-center justify-between gap-8 mt-12 lg:justify-start">
                        <form action="{{ route('admin.activity.publish', $activity->id) }}" method="POST">
                            @csrf
                            <button
                            class="p-3 text-gray-100 transition-colors duration-300 border rounded-full bg-yellow-500 rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 hover:bg-yellow-700">
                                Publish
                            </button>
                        </form>
                        <form action="{{ route('admin.activities.destroy', $activity->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="p-2 text-gray-800 transition-colors duration-300 border rounded-full rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 lg:mx-6">
                                <span class="material-symbols-outlined dark:hover:text-red-500 hover:text-red-500">
                                    Delete
                                </span>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-admin.dashboard>
