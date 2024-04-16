<x-admin.dashboard>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between md:flex md:items-center md:justify-between flex-wrap">
            <div class="text-center sm:text-left">
                <h1 class="text-2xl font-bold text-cornell-red sm:text-3xl">Guides</h1>
            </div>
            <div class="relative">
                <form action="" method="GET">
                    @csrf
                    <label for="Search" class="sr-only"> Search </label>
                    <input type="text" id="Search" placeholder="Search for..." name="search"
                        class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm" />

                    <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                        <button type="submit" class="text-gray-600 hover:text-blood-red">
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
                <a href="{{ route('admin.guides.create') }}"
                    class="block rounded-lg bg-blood-red px-5 py-3 text-sm font-medium text-white transition hover:bg-cornell-red focus:outline-none focus:ring">
                    Add Guides
                </a>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">
        @foreach ($guides as $guide)
        <a href="{{route('admin.guides.show',$guide->id)}}"
            class="flex flex-col items-center p-8 transition-colors duration-300 transform border cursor-pointer rounded-xl hover:border-transparent group hover:bg-blood-red dark:border-gray-700 dark:hover:border-transparent">
            <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300"
                src="{{ $guide->getFirstMediaUrl('profiles') }}"
                alt="">
            <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white">
                {{$guide->first_name}} {{$guide->lasst_name}}</h1>

            <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">Guide</p>

            <div class="flex mt-3 -mx-2 group-hover:text-white">
                {{$guide->city->name}}
            </div>
        </a>
        @endforeach
    </div>
</x-admin.dashboard>
