<x-user.navbar>
    <section class="bg-white ">
        <div class="lg:grid lg:h-screen lg:grid-cols-12">
            <aside class="relative block lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt="" src="{{ asset('images/test.jpg') }}"
                    class="absolute inset-0 h-full w-full object-cover " />

            </aside>

            <main
                class="flex items-centerjustify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">
                    <img src="{{ asset('images/logoblack.png') }}" class="h-24" alt="logo">
                    </a>

                    <h1 class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                        Welcome to DadesAdventures
                    </h1>

                    <p class="mt-4 leading-relaxed text-gray-500">
                        Unlock the gateway to unforgettable experiences - reserve your adventure today!
                    </p>
                    <form class="w-full max-w-md">
                        <div class="relative flex items-center mt-8">
                            <span class="absolute">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>

                            <input type="email"
                                class="block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                placeholder="Email address">
                        </div>

                        <div class="relative flex items-center mt-4">
                            <span class="absolute">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>

                            <input type="password"
                                class="block w-full px-10 py-3 text-gray-700 bg-white border rounded-lg dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                placeholder="Password">
                        </div>

                        <div class="mt-6">
                            <button
                                class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-delft-blue rounded-lg hover:bg-blue-900 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Sign in
                            </button>
                            <div class="mt-6 text-center ">
                                <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                    Don’t have an account yet?
                                    <a href="/register" class="text-gray-700 underline hover:text-blue-600"> Sign up</a>.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-user.navbar>
