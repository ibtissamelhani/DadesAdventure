<x-admin.dashboard>
    <a href="{{ route('admin.providers.index') }}">
        <svg class="w-6 h-6 hover:text-cornell-red text-gray-800 dark:text-white" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
        </svg>
    </a>
    <section class="bg-white dark:bg-gray-900">
        <div class="relative flex">
            <div class="min-h-screen lg:w-1/3"></div>
            <div class="hidden w-3/4 min-h-screen bg-gray-100 dark:bg-gray-800 lg:block"></div>

            <div
                class="container flex flex-col justify-center w-full min-h-screen px-6 py-10 mx-auto lg:absolute lg:inset-x-0">
                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">
                    Provider: <span class="text-green-500">{{ $provider->first_name }} <br> {{ $provider->last_name }}
                    </span>
                </h1>

                <div class="mt-10 lg:mt-20 lg:flex lg:items-center">
                    <img class="object-cover object-center w-full lg:w-[32rem] rounded-lg h-96"
                        src="{{ $provider->getFirstMediaUrl('profiles') }}" alt="profile">

                    <div class="mt-8 lg:px-10 lg:mt-0">
                        <p class="max-w-lg text-gray-500 dark:text-gray-400">
                            <span class="text-gray-900 text-lg font-semibold">First name</span> :
                            {{ $provider->first_name }}
                        </p>
                        <p class="max-w-lg mt-6 text-gray-500 dark:text-gray-400">
                            <span class="text-gray-900 text-lg font-semibold">Last name</span> : {{ $provider->last_name }}
                        </p>

                        <p class="max-w-lg mt-6 text-gray-500 dark:text-gray-400">
                            <span class="text-gray-900 text-lg font-semibold">Email</span> : {{ $provider->email }}
                        </p>

                        <p class="max-w-lg mt-6 text-gray-500 dark:text-gray-400">
                            <span class="text-gray-900 text-lg font-semibold">Phone</span> : {{ $provider->phone }}
                        </p>

                        <p class="max-w-lg my-6 text-gray-500 dark:text-gray-400">
                            <span class="text-gray-900 text-lg font-semibold">City</span> : {{ $provider->city->name }}
                        </p>

                        @if ($provider->status === 1)
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                <p class="whitespace-nowrap text-sm">Active</p>
                            </span>
                        @else
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-red-100 px-2.5 py-0.5 text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>

                                <p class="whitespace-nowrap text-sm">blocked</p>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="flex items-center justify-between mt-12 lg:justify-start">
                    @if ($provider->status === 1)
                        <form action="{{ route('admin.provider.block', $provider->id) }}" method="post">
                            @method('put')
                            @csrf
                            <button title="block user"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                block
                            </button>
                        </form>
                    @elseif($provider->status === 0)
                        <form action="{{ route('admin.provider.unblock', $provider->id) }}" method="post">
                            @method('put')
                            @csrf
                            <button title="unblock user"
                                class="focus:outline-none text-white bg-yellow-600 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                unblock
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-admin.dashboard>
