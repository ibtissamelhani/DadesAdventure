const searchInput = document.querySelector("#search-input");
const guidesWrapper = document.querySelector(".guide-wrapper");



searchInput.addEventListener("keyup", async function(){
    var response = await fetch("search?searchItem=" + searchInput.value);
    console.log(searchInput.value);
    if(response.ok){
        const data = await response.json();
        console.log(data);

        
        if (data.length > 0) {
            guidesWrapper.innerHTML = '';
            data.forEach(guide => {
                guidesWrapper.insertAdjacentHTML("beforeend", generateHTML(guide));
            });
        } else {
            guidesWrapper.innerHTML = 'No results found.';
        }
        }
});

function generateHTML(guide) {

    return `<a href=""
        class="flex flex-col items-center p-8 transition-colors duration-300 transform border cursor-pointer rounded-xl hover:border-transparent group hover:bg-blood-red dark:border-gray-700 dark:hover:border-transparent">
        <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300"
            src="${guide.profile}"
            alt="">
        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white">
            ${guide.first_name} ${guide.last_name}</h1>

        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">Guide</p>

        <div class="flex mt-3 -mx-2 group-hover:text-white">
        ${guide.city.name}
        </div>
    </a> `;
}
