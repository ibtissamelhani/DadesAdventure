<x-user.navbar :experiences="$experiences" :destinations="$destinations">
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

                    <form action="{{ route('register') }}" method="POST" class="mt-8 grid grid-cols-6 gap-6">
                        @csrf
                        <div class="col-span-6 sm:col-span-3">
                            <label for="FirstName" class="block text-sm font-medium text-gray-700">
                                First Name
                            </label>

                            <input type="text" id="FirstName" name="first_name"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" value="{{ old('first_name') }}" />
                            @error('first_name')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="LastName" class="block text-sm font-medium text-gray-700">
                                Last Name
                            </label>

                            <input type="text" id="LastName" name="last_name"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" value="{{ old('last_name') }}"/>
                                @error('last_name')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                              </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="Email" class="block text-sm font-medium text-gray-700"> Email </label>

                            <input type="email" id="Email" name="email"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" value="{{ old('email') }}"/>
                                @error('email')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone" class="block text-sm font-medium text-gray-700"> Phone </label>

                            <input type="text" id="phone" name="phone"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" value="{{ old('phone') }}"/>
                                @error('phone')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="Password" class="block text-sm font-medium text-gray-700"> Password </label>

                            <input type="password" id="Password" name="password"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" value="{{ old('password') }}" />
                                @error('password')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                              </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="PasswordConfirmation" class="block text-sm font-medium text-gray-700">
                                Password Confirmation
                            </label>

                            <input type="password" id="PasswordConfirmation" name="password_confirmation"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" value="{{ old('password_confirmation') }}" />
                                @error('password_confirmation')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                              </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button
                                class="inline-block shrink-0 rounded-md  bg-delft-blue px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-900  focus:outline-none focus:ring active:text-blue-500">
                                Create an account
                            </button>

                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                Already have an account?
                                <a href="/login" class="text-gray-700 underline hover:text-blue-600">Log in</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-user.navbar>
