import './bootstrap';

var images = [
    '/images/1.jpg',
    '/images/2.jpg',
    '/images/3.jpg',
    '/images/4.jpg',
    '/images/5.jpg',
];

var currentIndex = 0;

function changeBackground() {
    document.getElementById('dynamic-background').style.backgroundImage = 'url("' + images[currentIndex] + '")';
    currentIndex = (currentIndex + 1) % images.length;
}

setInterval(changeBackground, 3000);