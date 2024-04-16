<x-admin.dashboard>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between md:flex md:items-center md:justify-between flex-wrap">
            <div class="text-center sm:text-left">
                <h1 class="text-2xl font-bold text-green-500 sm:text-3xl">Activity Providers</h1>
            </div>
            <div class="relative">
                <form action="" method="GET">
                    @csrf
                    <label for="Search" class="sr-only"> Search </label>
                    <input type="text" id="search-input" placeholder="Search for..." name="searchItem"
                        class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm" />

                    <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                        <button type="submit" id="search-btn" class="text-gray-600 hover:text-red-600">
                            <span class="sr-only">Search</span>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                    </span>
                </form>
            </div>

            <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
                <a href="{{ route('admin.providers.create') }}"
                    class="block rounded-lg bg-blood-red px-5 py-3 text-sm font-medium text-white transition hover:bg-cornell-red focus:outline-none focus:ring">
                    Add Provider
                </a>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 guide-wrapper gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">
        @foreach ($providers as $provider)
            <a href="{{ route('admin.providers.show', $provider->id) }}"
                class="flex flex-col items-center p-8 transition-colors duration-300 transform border cursor-pointer rounded-xl hover:border-transparent group bg-gray-50 hover:bg-blood-red dark:border-gray-700 dark:hover:border-transparent">
                <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300"
                    src="{{ $provider->getFirstMediaUrl('profiles') }}" alt="">
                <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white">
                    {{ $provider->first_name }} {{ $provider->last_name }}</h1>

                <p class="mt-2 text-green-500 font-semibold capitalize dark:text-green-500 group-hover:text-green-300">Provider</p>

                <div class="flex mt-3 -mx-2 group-hover:text-white">
                    {{ $provider->city->name }}
                </div>
            </a>
        @endforeach
        <div class="flex justify-center w-full mt-8 mx-auto">
            {{ $providers->links('pagination::tailwind') }}
        </div>
    </div>
</x-admin.dashboard>
