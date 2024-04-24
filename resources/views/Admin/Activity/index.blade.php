<x-admin.dashboard>
    <div class="  mb-4 rounded bg-gray-100 dark:bg-gray-800">
        <h1 class="text-2xl font-semibold text-center text-gray-800 capitalize lg:text-3xl dark:text-white">Pending <span class="text-cornell-red">activities</span></h1>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4 p-4">
            @forelse($pendingActivities as $pendingActivity)
                <div class="max-w-sm mt-12 rounded-lg bg-white shadow-md dark:bg-gray-600">
                    <img class="h-48 w-full rounded-t-lg object-cover object-center"
                        src="{{ $pendingActivity->getFirstMediaUrl('images') }}" alt="Photo">
                    <div class="p-5">
                        <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">{{ $pendingActivity->name }}</h5>
                        @if ($pendingActivity->status == 1)
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
                        <p class="text-sm text-gray-500 pt-4">Activity date : {{ $pendingActivity->date }}</p>
                    </div>
                    <div class="flex justify-end gap-4 pb-5 px-6">
                        <a href="{{ route('admin.activities.show', $pendingActivity->id) }}" class="hover:text-blue-500">
                            <span class="material-symbols-outlined hover:text-blue-500">
                                visibility
                            </span>
                        </a>
                        
                        <form action="{{ route('admin.activities.destroy', $pendingActivity->id) }}" method="post">
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
                <li>No pending Activities!.</li>
            @endforelse
            <div class="flex justify-center w-full mt-8 mx-auto">
                {{ $pendingActivities->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
    <div class="mt-6 md:flex md:items-center md:justify-between">
        <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                Activities
            </button>
        </div>

        <div class="relative flex items-center mt-4 md:mt-0">
         </div>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>title</span>

                                        <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                        </svg>
                                    </button>
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Status
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    provider
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    city
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Date</th>

                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @forelse ($Activities as $Activitie)
                                
                            <tr>
                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                    <div>
                                        <h2 class="font-medium text-gray-800 dark:text-white ">{{$Activitie->name}}</h2>
                                    </div>
                                </td>
                                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                    <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                        {{$Activitie->status = 1? "published":""}}
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div>
                                        <h4 class="text-gray-700 dark:text-gray-200">{{$Activitie->provider->first_name}}</h4>
                                        <p class="text-gray-500 dark:text-gray-400">{{$Activitie->provider->last_name}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center">
                                        <p class="flex items-center justify-center w-6 h-6 -mx-1 text-xs text-gray-600 ">{{$Activitie->place->city->name}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center">
                                        <p class="flex items-center justify-center w-6 h-6 -mx-1 text-xs text-blue-600 ">{{$Activitie->date}}</p>
                                    </div>
                                </td>
                                <td class="flex gap-2 px-4 py-4 text-sm whitespace-nowrap">
                                    <a href="{{ route('admin.activities.show', $Activitie->id) }}" class="hover:text-blue-500">
                                        <span class="material-symbols-outlined hover:text-blue-500">
                                            visibility
                                        </span>
                                    </a>
                                    
                                    <form action="{{ route('admin.activities.destroy', $Activitie->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">
                                            <span class="material-symbols-outlined dark:hover:text-red-500 hover:text-red-500">
                                                Delete
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <li>No Activities!.</li>
                            @endforelse
                            <div class="flex justify-center w-full mt-8 mx-auto">
                                {{ $Activities->links('pagination::tailwind') }}
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-admin.dashboard>
