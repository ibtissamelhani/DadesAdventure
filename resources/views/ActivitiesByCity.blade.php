<x-user.navbar :experiences="$experiences" :destinations="$destinations">
    <div class="w-full bg-center bg-cover lg:py-10 h-72"
        style="background-image: url('{{ $city->getFirstMediaUrl('cities') }}');">
        <div class="flex items-center justify-center w-full h-full bg-black/50">
            <div class="text-center">
                <h1 class="text-3xl font-semibold text-white lg:text-4xl">Activities at <span
                        class="text-cornell-red">{{ $city->name }}</span> City</h1>
            </div>
        </div>
    </div>
    <div class="container px-6 py-10  max-w-screen-xl mx-auto">
      

        <div class="mt-6">
        </div>
        <div class="grid grid-cols-1 gap-2 mt-8 xl:mt-12 xl:gap-4 md:grid-cols-2 xl:grid-cols-4">
            @forelse ($activities as $activity)
                <a href="{{ route('details', $activity) }}"
                    class="activityWrapper overflow-hidden bg-cover rounded-lg  cursor-pointer h-96 group"
                    style="background-image:url('{{ asset($activity->getFirstMediaUrl('images')) }}')">
                    <div
                        class="flex flex-col justify-center items-center w-full h-full px-8 py-4 transition-opacity duration-700 opacity-0 backdrop-blur-sm bg-gray-800/60 group-hover:opacity-100">
                        <p class="mt-2 text-lg tracking-wider text-gray-100">{{ $activity->date }}</p>
                        <h1 class="mt-4 text-xl font-semibold text-white capitalize">{{ $activity->category->name }}
                        </h1>
                        <h2 class="mt-4 text-xl font-semibold text-white capitalize">{{ $activity->name }}</h2>
                        <p class="mt-2 text-lg tracking-wider text-cornell-red font-semibold uppercase ">
                            {{ $activity->place->city->name }}</p>
                        <p class="mt-2 text-lg tracking-wider text-white ">{{ $activity->price }} $ /person</p>
                    </div>
                </a>
            @empty
                <li>No Activities!.</li>
            @endforelse
            <div class="flex w-full mt-8">
                {{ $activities->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-user.navbar>
