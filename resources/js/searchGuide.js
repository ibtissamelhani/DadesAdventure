const searchInput = document.querySelector("#search-input"),
    searchBtn = document.querySelector("#search-btn"),
    guidesWrapper = document.querySelector(".guide-wrapper");

searchBtn.addEventListener("click", () => {
    fetchData();
});

// function that fetch the wanted events fron the back end
const fetchData = () => {
    const url =
        "http://127.0.0.1:8000/events?category=" +
        selectCategory.value +
        "&title=" +
        searchInput.value;

    categoriesWrapper.innerHTML = `
        <div role="status" class="mx-auto absolute left-1/2 translate-x-[-50%]">
            <svg aria-hidden="true" class="inline w-16 h-16 text-gray-200 animate-spin dark:text-gray-300 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    `;

    fetch(url)
        .then((res) => {
            if (!res.ok) {
                throw Error("can fetch the data from the back-end");
            }
            return res.json();
        })
        .then((guides) => {
            guidesWrapper.innerHTML = "";
            if (Object.keys(guides).length === 0) {
                guidesWrapper.innerHTML += `
                <h1></h1>
                <h1 class="mb-4 text-2xl text-center font-extrabold leading-none tracking-tight text-gray-600 md:text-3xl lg:text-4xl">Not Found</h1>
            `;
            } else {
                guides.forEach((guide) => {
                    guidesWrapper.innerHTML += `
                <a href="{{route('admin.guides.show',$guide->id)}}"
                class="flex flex-col items-center p-8 transition-colors duration-300 transform border cursor-pointer rounded-xl hover:border-transparent group hover:bg-blood-red dark:border-gray-700 dark:hover:border-transparent">
                <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300"
                    src="${guide.profile}"
                    alt="">
                <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white">
                    {{$guide->first_name}}${guide.first_name} ${guide.last_name}{{$guide->last_name}}</h1>
    
                <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">Guide</p>
    
                <div class="flex mt-3 -mx-2 group-hover:text-white">
                    {{$guide->city->name}}${guide.city.name}
                </div>
            </a>             
                `;
                });
            }
        })
        .catch((err) => {
            console.log(err);
        });
};