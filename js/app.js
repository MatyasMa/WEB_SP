window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');

    if (window.scrollY > 0) {
        navbar.style.transition = 'height 0.3s';
        navbar.style.height = '10vh';
    } else {
        navbar.style.transition = 'height 0.3s';
        navbar.style.height = '15vh';
    }
});

document.addEventListener("DOMContentLoaded", function() {
    // Get the current file name
    var currentFileName = window.location.pathname.split('/').pop();

    // Get the navigation links
    var links = document.querySelectorAll("nav ul li a");

    // Loop through the links
    links.forEach(function(link) {
        // Check if the link's href matches the current path
        if (link.getAttribute("href") === (currentFileName)) {
            link.classList.add("active"); // Add the 'active' class to the current link
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("password2");
    var password_match_message = document.getElementById("password_match_message");

    function validatePassword() {
        var passwordValue = password.value;
        var confirmValue = confirm_password.value;

        if (passwordValue != confirmValue) {
            password_match_message.textContent = "Hesla se neshodují";
        } else {
            password_match_message.textContent = "Hesla se shodují";
        }
    }

    password.addEventListener('input', validatePassword);
    confirm_password.addEventListener('input', validatePassword);
});