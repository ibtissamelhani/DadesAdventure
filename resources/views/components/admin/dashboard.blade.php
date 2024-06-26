<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite('resources/css/app.css')
    <title>DadesAdventures</title>
</head>

<body>
    <nav class="fixed top-0 z-50 w-full bg-blood-red border-b border-black dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="{{route('home')}}" class="flex ms-2 md:me-24">
                        <img src="{{ asset('images/logo2w.png') }}" class="h-8 me-3" alt="Logo" />

                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ Auth::user()->getMedia('profiles')->isNotEmpty() ? Auth::user()->getFirstMediaUrl('profiles') : asset('images/profile.jpg') }}"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    {{ Auth::user()->first_name }}
                                        {{ Auth::user()->last_name }}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Dashboard</a>
                                </li>


                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit">Logout</button>
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-blood-red border-r border-blood-red sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-blood-red dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{route('admin.dashboard')}}"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100/20 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <li>
                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-gray-100/20 dark:hover:bg-gray-700 dark:text-white group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="ms-3">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.guides.index') }}"
                        class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-gray-100/20 dark:hover:bg-gray-700 dark:text-white group">
                        <span
                            class="material-symbols-outlined  flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white">
                            assignment_ind
                        </span>
                        <span class="ms-3">Guides</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.providers.index') }}"
                        class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-gray-100/20 dark:hover:bg-gray-700 dark:text-white group">
                        <span
                            class="material-symbols-outlined  flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white">
                            person_pin_circle
                        </span>
                        <span class="ms-3">Providers</span>
                    </a>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <li>
                    <a href="{{ route('admin.activities.index') }}"
                        class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-gray-100/20 dark:hover:bg-gray-700 dark:text-white group">
                        <span
                            class="material-symbols-outlined flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white">
                            hub
                        </span>
                        <span class="ms-3">Activities</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-gray-100/20 dark:hover:bg-gray-700 dark:text-white group">
                        <span
                            class="material-symbols-outlined flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white">
                            category
                        </span>
                        <span class="ms-3">Activity Categories</span>
                    </a>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <li>
                    <a href="{{ route('admin.places.index') }}"
                        class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-gray-100/20 dark:hover:bg-gray-700 dark:text-white group">
                        <span
                            class="material-symbols-outlined flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white">
                            pin_drop
                        </span>
                        <span class="ms-3">Places</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.types.index') }}"
                        class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-gray-100/20 dark:hover:bg-gray-700 dark:text-white group">
                        <span
                            class="material-symbols-outlined flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white">
                            format_list_bulleted
                        </span>
                        <span class="ms-3">Place types</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.cities.index') }}"
                        class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-gray-100/20 dark:hover:bg-gray-700 dark:text-white group">
                        <span
                            class="material-symbols-outlined flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white">
                            home_work
                        </span>
                        <span class="ms-3">Cities</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside>
    @props(['totalReservation', 'totalActivities','totalUsers'])
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3  gap-4 mb-4">
                <article class="flex items-end justify-between rounded-lg border border-gray-100 bg-white p-6">
                    <div>
                        <p class="text-sm text-gray-500">total Activities</p>

                        <p class="text-2xl font-medium text-gray-900">{{$totalActivities}}</p>
                    </div>

                    <div class="inline-flex gap-2 rounded bg-green-100 p-1 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>

                        <span class="text-xs font-medium"> {{$totalActivities}}</span>
                    </div>
                </article>
                <article class="flex items-end justify-between rounded-lg border border-gray-100 bg-white p-6">
                    <div>
                        <p class="text-sm text-gray-500">Number of User</p>

                        <p class="text-2xl font-medium text-gray-900">{{$totalUsers}}</p>
                    </div>

                    <div class="inline-flex gap-2 rounded bg-green-100 p-1 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>

                        <span class="text-xs font-medium"> {{$totalUsers}} </span>
                    </div>
                </article>
                <article class="flex items-end justify-between rounded-lg border border-gray-100 bg-white p-6">
                    <div>
                        <p class="text-sm text-gray-500">Total Reservation</p>

                        <p class="text-2xl font-medium text-gray-900">{{$totalReservation}}</p>
                    </div>

                    <div class="inline-flex gap-2 rounded bg-green-100 p-1 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>

                        <span class="text-xs font-medium"> {{$totalReservation}} </span>
                    </div>
                </article>
                @if ($errors->any())
                    <div id="alert-3"
                        class="message-alert fixed top-28 right-5 lg:right-32 border border-red-300 max-w-88 z-50 flex items-center shadow-md hover:shadow-lg p-4 mb-4 text-red-800 rounded-lg bg-red-100"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm pr-4 font-medium">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        <button type="button"
                            class="ms-auto shadow -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                            data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
            {{ $slot }}
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @if (session('success'))
        <script>
            setTimeout(function() {
                Swal.fire({

                    position: "top-end",
                    icon: "success",
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 4000
                });
            }, {{ session('delay', 0) }});
        </script>
    @endif
    <script src="{{asset('alert.js')}}"></script>
</body>

</html>
