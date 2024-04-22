<x-provider.dashboard>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between md:flex md:items-center md:justify-between flex-wrap">
            <div class="text-center sm:text-left">
                <h1 class="text-2xl font-bold text-cornell-red sm:text-3xl">Activities !</h1>

                <p class="mt-1.5 text-sm text-gray-500">Manage activities and track reservations </p>
            </div>

            <div class="relative">
                <form action="{{route('provider.activities.search')}}" method="GET">
                    @csrf
                <label for="Search" class="sr-only"> Search </label>
                <input type="text" id="Search" placeholder="Search for..." name="search"
                    class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm" />
    
                <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                    <button type="submit" class="text-gray-600 hover:text-blood-red">
                        <span class="sr-only">Search</span>
    
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </span></form>
            </div>

            <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
                <a href="{{ route('provider.activities.create') }}"
                    class="block rounded-lg bg-blood-red px-5 py-3 text-sm font-medium text-white transition hover:bg-cornell-red focus:outline-none focus:ring">
                    Create Activity
                </a>
            </div>
        </div>
    </div>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4 p-4 bg-gray-50">
        @forelse($proActivities as $proActivity)
            <div class="max-w-sm mt-12 rounded-lg bg-white shadow-md dark:bg-gray-600">
                <img class="h-48 w-full rounded-t-lg object-cover object-center"
                    src="{{ $proActivity->getFirstMediaUrl('images') }}" alt="Photo">
                <div class="p-5">
                    <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">{{ $proActivity->name }}</h5>
                    @if ($proActivity->status == 1)
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
                    <p class="text-sm text-gray-500 pt-4">Activity date : {{ $proActivity->date }}</p>
                </div>
                <div class="flex justify-end gap-4 pb-5 px-6">
                    <a href="{{ route('provider.activities.show', $proActivity->id) }}" class="hover:text-blue-500">
                        <span class="material-symbols-outlined hover:text-blue-500">
                            visibility
                        </span>
                    </a>
                    <a href="{{ route('provider.activities.edit', $proActivity->id) }}" class="hover:text-yellow-500">
                        <span class="material-symbols-outlined hover:text-yellow-500">
                            edit
                        </span>
                    </a>
                    <form action="{{ route('provider.activities.destroy', $proActivity->id) }}" method="post">
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
            <li>No Activities Yet, Creat One!.</li>
        @endforelse
        <div class="flex justify-center w-full mt-8 mx-auto">
            {{ $proActivities->links('pagination::tailwind') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @if (session('success'))
    <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonClass: 'btn btn-success',
                confirmButtonText: 'Cancel',
            });
        }, {{ session('delay', 0) }});
    </script>
@endif

</x-provider.dashboard>
