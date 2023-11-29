<?php
// definice udaju pro pripojeni do databaze
define("DB_SERVER",'localhost');
define("DB_NAME",'semestralni_prace');
define("DB_USER",'root');
define("DB_PASS",'root');

// definice konkretnich nazvu tabulek
define("TABLE_CLENOVE","clenove");


$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($db) {
    echo "Připojeno k databázi: ".DB_NAME;
} else {
    echo "Chyba při připojování k databázi";
}
echo "<br>";


$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date = $_POST["date"];
$photo = $_POST["photo"];
$description = $_POST["description"];
$password = $_POST["password"];
$right = $_POST["pravo"];
$position = $_POST["pozice"];
$photo_name = $_FILES["photo"]["name"];
$photo_tmp = $_FILES["photo"]["tmp_name"];
// $photo_data = addslashes(file_get_contents($file));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // TODO: nastavení unikátnosti při vkládání členů?????
    if (!empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"])
        && !empty($_POST["phone"]) && !empty($_POST["date"]) && !empty($_POST["description"])) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `CLENOVE` (`jmeno`, `prijmeni`, `email`, `tel`, `datum_narozeni`, `o_clenovi`, `heslo`,
                           `id_pravo`, `id_pozice`) VALUES ('$name','$surname','$email','$phone','$date','$description',
                                                            '$hashedPassword','$right','$position')";
        echo "ahoj";
    } else {
        echo "chyba čtení dat";
    }


    // Zkontrolujte, zda byl soubor nahrán bez chyb
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $targetDirectory = "../photos/";  // Název složky, kam budete ukládat soubory

        // Získání názvu a cesty k nahrávanému souboru
        $targetFile = $targetDirectory . $name . "-" . $surname . "-" . basename($photo_name);

        // Přesunutí souboru do cílové složky
        if (move_uploaded_file($photo_tmp, $targetFile)) {
            echo "Soubor " . htmlspecialchars(basename($photo_name)) . " byl úspěšně nahrán.";
        } else {
            echo "Chyba při přesouvání souboru.";
        }
    } else {
        echo "Chyba při nahrávání souboru.";
    }

} else {
    echo "Neplatný požadavek.";
}

echo $sql;

if ($db->query($sql) === true) {
    echo "<br>data byla úspěšně vložena do tabulky";
} else {
    echo "<br>chyba při přidávání dat do tabulky";
    echo " $db->error";
}

?>