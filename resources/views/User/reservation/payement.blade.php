<x-user.navbar  :experiences="$experiences" :destinations="$destinations">
    <div class="w-full bg-center bg-cover lg:py-10 h-72"
        style="background-image: url('{{ asset($activity->getFirstMediaUrl('images')) }}'); background-size: cover;">
        <div class="flex items-center justify-center w-full h-full bg-black/50">
            <div class="text-center">
                <h1 class="text-3xl font-semibold text-white lg:text-4xl">Book <span
                        class="text-cornell-red">{{ $activity->name }}</span> Now!</h1>
                <img src="{{ asset('images/logoWhite.png') }}" class="mx-auto w-36 " alt="logo">
            </div>
        </div>
    </div>
    <div class="flex items-center justify-around w-full h-full py-6 px-2 bg-blood-red flex-wrap">
        <h1 class="text-gray-100 text-xl"><i class="fa-solid fa-chair"></i>Left places : {{ $activity->capacity }}</h1>
        <h1 class="text-gray-100 text-xl"><i class="fa-solid fa-dollar-sign"></i> {{ $activity->price }} / person </h1>
        <h1 class="text-gray-100 text-xl"><i class="fa-solid fa-calendar-days"></i> date : {{ $activity->date }}</h1>
        <h1 class="text-gray-100 text-xl"><i class="fa-regular fa-clock"></i> duration : {{ $activity->duration }} hours
        </h1>
    </div>
    <div class="mt-2 dark:bg-gray-800">
        <div class="container flex items-center px-6 py-4 mx-auto overflow-x-auto whitespace-nowrap">


            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="{{ route('details', $activity) }}" class="flex items-center  text-gray-600 -px-2 dark:text-gray-200 hover:underline">
                <span class="mx-2">Reservation</span>
            </a>

            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="flex items-center text-blue-600 -px-2 dark:text-blue-400 hover:underline">
                <span class="mx-2">Payement</span>
            </a>
        </div>
    </div>
    <div class="max-w-md mx-auto mt-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-xl font-semibold mb-4">Stripe Payment</h1>
            
            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif
    
            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="card-element" class="block text-gray-700 text-sm font-bold mb-2">
                        Credit or debit card
                    </label>
                    <div id="card-element" class="border border-gray-300 rounded-md p-2"></div>
                    <!-- Used to display form errors -->
                    <div id="card-errors" role="alert" class="text-red-500 text-sm mt-2"></div>
                </div>
                <button id="card-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Pay $100
                </button>
            </form>
        </div>
    </div>
    
    <!-- Load Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>
    
    <!-- Custom JavaScript to handle Stripe -->
    <script>
        // Set up Stripe.js and Elements to use in checkout form
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        
        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        
        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});
        
        // Add an instance of the card Element into the `card-element` div.
        card.mount('#card-element');
        
        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
        
            // Submit the form
            form.submit();
        }
    </script>

</x-user.navbar>