<?php


// Připojení k databázi
// definice udaju pro pripojeni do databaze
define("DB_SERVER",'localhost');
define("DB_NAME",'semestralni_prace');
define("DB_USER",'root');
define("DB_PASS",'root');

// definice konkretnich nazvu tabulek
define("TABLE_CLENOVE","clenove");


$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

echo "ahoj<br>";
// Kontrola připojení
if ($conn->connect_error) {
    die("Připojení k databázi selhalo: " . $conn->connect_error);
}

// Zpracování odeslaného formuláře
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání hodnot z formuláře
    $option = $_POST["option"];
    $description = $_POST["description"];
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];

    // Mapování typu akce na ID
    $id_typ_akce = ($option == "zapas") ? 1 : (($option == "trenink") ? 2 : 3);

    // Příprava SQL dotazu
    $sql = "INSERT INTO AKCE (datum_konani_zacatek, datum_konani_konec, id_typ_akce) VALUES ('$date_start', '$date_end', $id_typ_akce)";

    echo $sql;
    // Provedení SQL dotazu
    if ($conn->query($sql) === TRUE) {
        echo "Data byla úspěšně vložena do tabulky AKCE.";
    } else {
        echo "Chyba při vkládání dat: " . $conn->error;
    }
}

// Uzavření připojení k databázi
$conn->close();


?>