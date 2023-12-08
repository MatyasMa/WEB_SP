<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "semestralni_prace";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}

// Získání uživatelských údajů podle emailu
$email = $_POST['loginEmail']; // Předpokládáme, že email byl odeslán formulářem
$sql = "SELECT * FROM clenove WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo 'Uživatel existuje.<br>';
    $row = $result->fetch_assoc();
    $hashedPasswordFromDatabase = $row['heslo'];
    $passwordFromUser = $_POST['loginPassword']; // Předpokládáme, že heslo bylo odesláno formulářem

    if (password_verify($passwordFromUser, $hashedPasswordFromDatabase)) {
        // Hesla se shodují - uživatel je přihlášen
        echo "Přihlášení úspěšné!";
    } else {
        // Hesla se neshodují - neúspěšné přihlášení
        echo "Nesprávné heslo.";
    }
} else {
    echo "Uživatel s tímto emailem neexistuje.";
}




$conn->close();

?>