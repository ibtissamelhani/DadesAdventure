const title = document.querySelector("#title");
const category = document.querySelector("#category");
const from = document.querySelector("#from");
const to = document.querySelector("#to");
const form = document.querySelector("#form");
const activityWrapper = document.querySelector(".activityWrapper");


form.addEventListener("submit", async function (e) {

    e.preventDefault();

    var response = await fetch(
        "searchActivity?title=" +
            title.value +
            "&category" +
            category.value +
            "&from" +
            from.value +
            "&to" +
            to.value
    );


    if (response.ok) {
        const data = await response.json();
        console.log(data);

        if (data.length > 0) {
            activityWrapper.innerHTML = "";
            data.forEach((activity) => {
                activityWrapper.insertAdjacentHTML(
                    "beforeend",
                    generateHTML(activity)
                );
            });
        } else {
            activityWrapper.innerHTML = "No results found.";
        }
    }
});

function generateHTML(activity) {

    return `
    <a href="/details/${activity.id}" 
                        class="activityWrapper overflow-hidden bg-cover rounded-lg  cursor-pointer h-96 group"
                        style="background-image:url('${activity.image }')">
                        <div
                            class="flex flex-col justify-center items-center w-full h-full px-8 py-4 transition-opacity duration-700 opacity-0 backdrop-blur-sm bg-gray-800/60 group-hover:opacity-100">
                            <p class="mt-2 text-lg tracking-wider text-gray-100">${activity.date}</p>
                            <h1 class="mt-4 text-xl font-semibold text-white capitalize">${activity.category.name}
                            </h1>
                            <h2 class="mt-4 text-xl font-semibold text-white capitalize">${activity.name}</h2>
                            <p class="mt-2 text-lg tracking-wider text-cornell-red font-semibold uppercase ">
                                ${activity.place.city.name}</p>
                            <p class="mt-2 text-lg tracking-wider text-white ">${activity.price} $ /person</p>
                        </div>
                    </a> `;
}
