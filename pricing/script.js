let cookies = document.getElementById('kcieu37cy');
let acceptcookies = document.getElementById('jcmeo84mx7');
let rejectcookies = document.getElementById('kcjur74ks');

// Button par click hone ka event
acceptcookies.addEventListener('click', function (event) {
    // Page refresh hone se rokne ke liye (kyunke ye <a> tag hai)
    event.preventDefault();

    // Div ko hide karne ke liye
    cookies.style.display = 'none';
});
// Button par click hone ka event
rejectcookies.addEventListener('click', function (event) {
    // Page refresh hone se rokne ke liye (kyunke ye <a> tag hai)
    event.preventDefault();

    // Div ko hide karne ke liye
    cookies.style.display = 'none';
});

