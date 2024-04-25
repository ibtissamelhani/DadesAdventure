<x-provider.dashboard>
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
        @forelse ($activities as $activity)
        <a href="{{route('provider.getreservations',$activity->id)}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{$activity->getFirstMediaUrl('images')}}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{$activity->name}}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$activity->category->name}}.</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$activity->date}}.</p>
                <p class="inline-flex font-medium items-center text-blue-600 hover:underline">
                    See reservations of this activity
                </p>
            </div>
        </a>
        @empty
            <p>no activities</p>
        @endforelse
        <div class="flex justify-center w-full mt-8 mx-auto">
            {{ $activities->links('pagination::tailwind') }}
        </div>
      </div>
</x-provider.dashboard>