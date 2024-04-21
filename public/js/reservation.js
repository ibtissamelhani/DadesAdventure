const numberInput = document.getElementById('number_of_places');
    const totalAmountInput = document.getElementById('total_amount');
    const numberError = document.getElementById('numberError');
    const reserveButton = document.getElementById('card-button');


    numberInput.addEventListener('input', function() {
        const value = parseInt(this.value);
        if (value < 1 || value > 10) {
            numberError.classList.remove('hidden');
            numberInput.classList.add('border-red-500');
            totalAmountInput.value = ''; 
            reserveButton.setAttribute('disabled', 'disabled');
        } else {
            numberError.classList.add('hidden');
            numberInput.classList.remove('border-red-500');
            reserveButton.removeAttribute('disabled');
            const totalAmount = value * activityPrice;
            totalAmountInput.value = totalAmount.toFixed(2);
        }
    });