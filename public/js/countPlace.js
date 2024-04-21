const numberInput = document.getElementById('Number_of_Places');
const reserveButton = document.getElementById('reserve-button');

numberInput.addEventListener('input', function () {

    const value = parseInt(this.value);
    
    setTimeout(() => {
        if (value < 1 || value > 10) {
            numberError.classList.remove('hidden');
            numberInput.classList.add('border-red-500');
        } else {
            numberError.classList.add('hidden');
            numberInput.classList.remove('border-red-500');
            localStorage.setItem('Number_of_Places', value);
        }
    }, 300); 
});


window.addEventListener('load', function() {
    const storedValue = localStorage.getItem('Number_of_Places');
    if (storedValue !== null) {
        numberInput.value = storedValue;
    }
});