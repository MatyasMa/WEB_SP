<?php

use JetBrains\PhpStorm\NoReturn;

/**
     * Trida spravujici databazi.
     */
class DatabaseModel {

    /** @var \PDO $pdo  Objekt pracujici s databazi prostrednictvim PDO. */
    private PDO $pdo;

    /**
     * Inicializace pripojeni k databazi.
     */
    public function __construct(){
        // inicializace DB
        $this->pdo = new \PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASS);
        // vynuceni kodovani UTF-8
        $this->pdo->exec("set names utf8");
    }


    /**
     *  Smaze daneho uzivatele z DB.
     *  @param int $userId  ID uzivatele.
     */
    public function deleteMember(int $memberID):bool {

        $vyberClena = "SELECT * FROM ".TABLE_MEMBERS." WHERE id = $memberID";

        $mazanyClen = $this->pdo->query($vyberClena)->fetchAll();
        $pravoMazaneho = $mazanyClen[0]['id_pravo'];

        session_start();

        if ($_SESSION['pravo'] == 2 && $pravoMazaneho == 1) {
            return false;
        } else {
            // pripravim dotaz
            $q = "DELETE FROM ".TABLE_MEMBERS." WHERE id = $memberID";
            // provedu dotaz
            $res = $this->pdo->query($q);
            // pokud neni false, tak vratim vysledek, jinak null
            if ($res) {
                // neni false
                return true;
            } else {
                // je false
                return false;
            }
        }

    }

    public function deleteAttending(int $id_event, int $id_member):bool {
        // pripravim dotaz
        $q = "DELETE FROM ".TABLE_IS_ATTENDING." WHERE id_akce = $id_event AND id_clena = $id_member";
        // provedu dotaz
        $res = $this->pdo->query($q);
        // pokud neni false, tak vratim vysledek, jinak null
        if ($res) {
            // neni false
            return true;
        } else {
            // je false
            return false;
        }
    }

    public function deleteEvent(int $akceID):bool {
        // pripravim dotaz
        $q = "DELETE FROM ".TABLE_EVENTS." WHERE id = $akceID";
        // provedu dotaz
        $res = $this->pdo->query($q);
        // pokud neni false, tak vratim vysledek, jinak null
        if ($res) {
            // neni false
            return true;
        } else {
            // je false
            return false;
        }
    }

    public function addEvent($des, $date_start, $date_end, $option):bool
    {

        $id_typ_akce = ($option == "zapas") ? 1 : (($option == "trenink") ? 2 : 3);

        // Převod do formátu DateTime
        $date_start_obj = new DateTime($date_start);
        $date_end_obj = new DateTime($date_end);

        $description = htmlspecialchars($des);

        // Příprava SQL dotazu s připraveným dotazem
        $sql = "INSERT INTO AKCE (popis_akce, datum_konani_zacatek, datum_konani_konec, id_typ_akce) VALUES (:description, :date_start, :date_end, :id_typ_akce)";

        // Příprava připraveného dotazu
        $stmt = $this->pdo->prepare($sql);

        // Nastavení hodnot pro připravený dotaz
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $format = $date_start_obj->format('Y-m-d H:i:s');
        $stmt->bindParam(':date_start', $format, PDO::PARAM_STR);
        $format1 = $date_end_obj->format('Y-m-d H:i:s');
        $stmt->bindParam(':date_end', $format1, PDO::PARAM_STR);
        $stmt->bindParam(':id_typ_akce', $id_typ_akce, PDO::PARAM_INT);

        try {
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Chyba při provádění dotazu: " . $e->getMessage();

            return false;
        }

     }

    public function registrateMember($name, $surname, $email, $phone, $date, $description, $password, $right, $position):bool
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $date_obj = new DateTime($date);

        $jmeno = htmlspecialchars($name);
        $prijmeni = htmlspecialchars($surname);
        $mail = htmlspecialchars($email);
        $tel = htmlspecialchars($phone);
        $popis = htmlspecialchars($description);


        if($position == 0){
            $sql = "INSERT INTO `CLENOVE` (`jmeno`, `prijmeni`, `email`, `tel`, `datum_narozeni`, `o_clenovi`, `heslo`,
                           `id_pravo`) VALUES (:jmeno, :prijmeni,:mail, :tel,:date, :popis,
                                                            '$hashedPassword','$right')";
        } else {
            $sql = "INSERT INTO `CLENOVE` (`jmeno`, `prijmeni`, `email`, `tel`, `datum_narozeni`, `o_clenovi`, `heslo`,
                           `id_pravo`, `id_pozice`) VALUES (:jmeno, :prijmeni,:mail, :tel,:date, :popis,
                                                            '$hashedPassword','$right','$position')";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':jmeno', $jmeno, PDO::PARAM_STR);
        $stmt->bindParam(':prijmeni', $prijmeni, PDO::PARAM_STR);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindParam(':popis', $popis, PDO::PARAM_STR);
        $format = $date_obj->format('Y-m-d H:i:s');
        $stmt->bindParam(':date', $format, PDO::PARAM_STR);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            $a = $e->getCode();
            if ($a == 23000) {
                echo "<script>alert('V týmu je již člen se stejným e-mailem, použijte prosím jiný.');</script>";
            } else {
                echo "Chyba při provádění dotazu: " . $e->getMessage();
                die();
            }

            return false;
        }


    }

    public function login($email, $password):bool
    {


        $mail = htmlspecialchars($email);
        $heslo = htmlspecialchars($password);

        $sql = "SELECT * FROM clenove WHERE email = '$mail'";


        $res = $this->pdo->query($sql);
        $user = $res->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            echo "<script>alert('Uživatel s tímto e-mailem neexistuje.')</script>";
            return false;
        }

        if (password_verify($heslo, $user['heslo'])) {
            // Zde můžete provést další akce, například vytvořit sezení
            session_start();
            // Uložení informací o uživateli do sezení
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['pravo'] = $user['id_pravo'];
            $_SESSION['prihlaseny'] = true;

            // Přesměrování na hlavní stránku (změňte URL podle svých potřeb)
            header("Location: index.php?page=zapis-na-akce");

            exit(); // Zajištění, že se další kód neprovede po přesměrování

            return true;
        } else {
            // Heslo není platné
            return false;
        }
    }

    public function getAllMembers():array {
        // pripravim dotaz
        $q = "SELECT * FROM ".TABLE_MEMBERS;
        // provedu a vysledek vratim jako pole
        // protoze je o uzkazku, tak netestuju, ze bylo neco vraceno
        return $this->pdo->query($q)->fetchAll();
    }

    public function getAllRights():array {
        // pripravim dotaz
        $q = "SELECT * FROM ".TABLE_RIGHT;
        // provedu a vysledek vratim jako pole
        // protoze je o uzkazku, tak netestuju, ze bylo neco vraceno
        return $this->pdo->query($q)->fetchAll();
    }

    public function getAllPositions():array {
        // pripravim dotaz
        $q = "SELECT * FROM ".TABLE_POSITION;
        // provedu a vysledek vratim jako pole
        // protoze je o uzkazku, tak netestuju, ze bylo neco vraceno
        return $this->pdo->query($q)->fetchAll();
    }

    public function getAllEvents():array {
        // pripravim dotaz
        //$q = "SELECT * FROM ".TABLE_EVENTS;
        // serazene podle data
        $q = 'SELECT * FROM '.TABLE_EVENTS.' ORDER BY datum_konani_zacatek ASC';
        // provedu a vysledek vratim jako pole
        // protoze je o uzkazku, tak netestuju, ze bylo neco vraceno
        return $this->pdo->query($q)->fetchAll();
    }

    public function getAllEventTypes():array
    {
        // pripravim dotaz
        $q = "SELECT * FROM " . TABLE_EVENT_TYPE;
        // provedu a vysledek vratim jako pole
        // protoze je o uzkazku, tak netestuju, ze bylo neco vraceno
        return $this->pdo->query($q)->fetchAll();
    }

    public function getAllIsAttending($id_akce):array
    {
        // pripravim dotaz
        $q = "SELECT * FROM " . TABLE_IS_ATTENDING . " WHERE id_akce = $id_akce ORDER BY muze_se_ucastnit DESC";
        // provedu a vysledek vratim jako pole
        // protoze je o uzkazku, tak netestuju, ze bylo neco vraceno
        return $this->pdo->query($q)->fetchAll();
    }

    public function getCurrentMember($id):array
    {
        $q = "SELECT * FROM ".TABLE_MEMBERS." WHERE id = $id";

        return $this->pdo->query($q)->fetchAll();
    }

    public function zapisHraceNaAkci($id_clena, $id_akce, $muze):bool{
        $sql = "INSERT INTO SE_UCASTNI (id_clena, id_akce, muze_se_ucastnit) VALUES (:id_clena, :id_akce, :muze)";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute([
                ':id_clena' => $id_clena,
                ':id_akce' => $id_akce,
                ':muze' => $muze,
            ]);

            return true;
        } catch (PDOException $e) {
            echo "<script>alert('Na tuto akci jste již zapsaný!');</script>";
            return false;
        }
    }



}

?>