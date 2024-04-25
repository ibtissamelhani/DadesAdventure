const messageAlerts = document.querySelectorAll('.message-alert');

// hide the alert after 4 seconds
setTimeout(() => {
    messageAlerts.forEach((el) => {
        el.classList.add('hidden');
    });
}, 7000);