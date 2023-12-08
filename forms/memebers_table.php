<?php
// Připojení k databázi (upravte připojovací údaje podle vaší konfigurace)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "semestralni_prace";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola připojení
if ($conn->connect_error) {
    die("Chyba připojení k databázi: " . $conn->connect_error);
}

// SQL příkaz pro výběr dat
$sql = "SELECT `id`, `jmeno`, `prijmeni`, `email`, `tel`, `datum_narozeni`, `id_pravo`, `id_pozice` FROM `CLENOVE`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Výpis dat do tabulky
    echo "<table>";
    echo "<tr><th>ID</th><th>Jméno</th><th>Příjmení</th><th>Email</th><th>Telefon</th><th>Datum narození</th><th>Právo</th><th>Pozice</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["jmeno"] . "</td>";
        echo "<td>" . $row["prijmeni"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["tel"] . "</td>";
        echo "<td>" . $row["datum_narozeni"] . "</td>";

        // Získání názvu pro id_pravo
        $id_pravo = $row["id_pravo"];
        $pravo_query = "SELECT `nazev_prava` FROM `pravo` WHERE `id` = $id_pravo";
        $pravo_result = $conn->query($pravo_query);
        $pravo_row = $pravo_result->fetch_assoc();
        $nazev_pravo = $pravo_row["nazev_prava"];

        echo "<td>" . $nazev_pravo . "</td>";


        if ($nazev_pravo == "hrac") {
            // Získání názvu pro id_pozice
            $id_pozice = $row["id_pozice"];
            $pozice_query = "SELECT `nazev_pozice` FROM `pozice` WHERE `id` = $id_pozice";
            $pozice_result = $conn->query($pozice_query);
            $pozice_row = $pozice_result->fetch_assoc();
            $nazev_pozice = $pozice_row["nazev_pozice"];
        } else {
            $nazev_pozice = "";
        }

        echo "<td>" . $nazev_pozice . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Žádná data k dispozici.";
}

// Uzavření připojení k databázi
$conn->close();
?>