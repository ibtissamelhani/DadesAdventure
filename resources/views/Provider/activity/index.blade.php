<x-provider.dashboard>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="text-center sm:text-left">
                <h1 class="text-2xl font-bold text-cornell-red sm:text-3xl">Activities !</h1>

                <p class="mt-1.5 text-sm text-gray-500">Manage activities and track reservations </p>
            </div>

            <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
                <button
                    class="block rounded-lg bg-blood-red px-5 py-3 text-sm font-medium text-white transition hover:bg-cornell-red focus:outline-none focus:ring"
                    type="button">
                    Create Post
                </button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mb-4 p-4 bg-gray-50">
        @forelse($proActivities as $proActivitie)
            <div class="max-w-sm mt-12 rounded-lg bg-white shadow-md dark:bg-gray-600">
                <img class="h-48 w-full rounded-t-lg object-cover object-center"
                    src="" alt="Photo">
                <div class="p-5">
                    <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">{{ $orgEvent->name }}</h5>
                   
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <p class="whitespace-nowrap text-sm">published</p>
                        </span>
                    
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z" />
                            </svg>

                            <p class="whitespace-nowrap text-sm">Pending</p>
                        </span>
                    
                    <p class="text-sm text-gray-500 pt-4">Event date : </p>
                </div>
                <div class="flex justify-end gap-4 pb-5 px-6">
                    <a href="" class="hover:text-blue-500">
                        <span class="material-symbols-outlined hover:text-blue-500">
                            visibility
                        </span>
                    </a>
                    <a href="" class="hover:text-yellow-500">
                        <span class="material-symbols-outlined hover:text-yellow-500">
                            edit
                        </span>
                    </a>
                    <form action="" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit">
                            <span class="material-symbols-outlined dark:hover:text-red-500 hover:text-red-500">
                                Delete
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <li>No Activities Yet creat one!.</li>
        @endforelse
    </div>
</x-provider.dashboard>
