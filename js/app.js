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
        } else if(passwordValue == "" && confirmValue == ""){
            password_match_message.textContent = "\u00A0";
        } else {
            password_match_message.textContent = "Hesla se shodují";
        }
    }

    password.addEventListener('input', validatePassword);
    confirm_password.addEventListener('input', validatePassword);
});

function vyberPrava() {
    // Získání odkazu na oba selectboxy
    var firstSelect = document.getElementById('pravo');
    var secondSelect = document.getElementById('pozice');

    // Získání vybrané hodnoty z prvního selectboxu
    var selectedValue = firstSelect.value;

    // Zablokování nebo povolení druhého selectboxu na základě vybrané hodnoty
    if (selectedValue === '4') {
        secondSelect.disabled = false; // Povolit druhý selectbox
    } else {
        secondSelect.disabled = true; // Zablokovat druhý selectbox
    }
}

function kontrolaDatumu(a) {
    var dateStartInput = document.getElementById('date_start');
    var dateEndInput = document.getElementById('date_end');

    var dateStart = new Date(dateStartInput.value);
    var dateEnd = new Date(dateEndInput.value);

    var text = document.getElementById('vypis_kontrola_vstupu');

    if (a === 1) {
        if (dateStart >= dateEnd) {
            text.textContent = "Druhý datum a čas musí být později než první!";
        } else {
            text.textContent = "\u00A0";
        }
    } else if (a === 2) {
        if (dateStart >= dateEnd) {
            alert("Zadaný datum konání není v pořádku.");
            return false;
        } else {
            return true;
        }
    }
}