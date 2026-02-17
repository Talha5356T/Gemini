let cookies = document.getElementById('kcieu37cy');
let acceptcookies = document.getElementById('jcmeo84mx7');
let rejectcookies = document.getElementById('kcjur74ks');

// Check karein ke kya user ne pehle hi choice save kar li hai
if (localStorage.getItem('cookieChoice') === 'done') {
    cookies.style.display = 'none';
}

// Function jo choice save karegi aur banner hide karegi
function handleCookieClick(event) {
    event.preventDefault();

    // Choice ko browser memory mein save karna
    localStorage.setItem('cookieChoice', 'done');

    // Div ko hide karna
    cookies.style.display = 'none';
}

// Dono buttons par same function apply karna
acceptcookies.addEventListener('click', handleCookieClick);
rejectcookies.addEventListener('click', handleCookieClick);

document.getElementById('mci438o38k').addEventListener('submit', function (e) {
    e.preventDefault();

    const email = document.getElementById('userEmail').value;
    const status = document.getElementById('statusMessage');
    const btn = document.getElementById('submitBtn');

    // Loading state
    status.style.display = 'block';
    status.innerText = 'Subscribing...';
    status.style.color = '#bebebe';
    btn.disabled = true;

    // Data sending to mail.php
    const formData = new FormData();
    formData.append('email', email);

    fetch('mail.php', {
        method: 'POST',
        body: formData
    })
        .then(res => res.text())
        .then(data => {
            if (data.trim() === 'success') {
                status.innerText = 'Congratulations! Subscribed successfully.';
                status.style.color = '#4CAF50';
                document.getElementById('mci438o38k').reset();
            } else {
                status.innerText = 'Error: ' + data;
                status.style.color = '#ff4d4d';
            }
        })
        .catch(err => {
            status.innerText = 'Connection error!';
            status.style.color = '#ff4d4d';
        })
        .finally(() => {
            btn.disabled = false;
        });
});