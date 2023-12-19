<?php

require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");
require_once(DIRECTORY_CONTROLLERS."/ControllerBasics.class.php");
class RegistrationController extends ControllerBasics implements IController
{
    private $db;
    public function __construct()
    {
        require_once(DIRECTORY_MODELS."/DatabaseModel.class.php");
        $this->db = new DatabaseModel();
    }

    public function show(string $pageTitle):string {
        //// vsechna data sablony budou globalni
        global $tplData;
        $tplData = [];
        // nazev
        $tplData['title'] = $pageTitle;

        $this->overPrihlaseni();

        $this->menuTlacitka();

        if ($_SESSION['pravo'] == 4 || $_SESSION['pravo'] == 3) {
            header("Location: index.php?page=zapis-na-akce");
        }


        if(isset($_POST['name']) and isset($_POST['surname']) and isset($_POST['email'])
            and isset($_POST['phone']) and isset($_POST['date']) and isset($_POST['password'])
            and isset($_POST['password2']) and isset($_POST['pravo']) and isset($_POST['date'])
            and $_POST['action'] == "add_member"
        ) {
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $date = $_POST["date"];
            $description = $_POST["description"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
            $right = $_POST["pravo"];
            $position = $_POST["pozice"];


            $tplData['alert'] = "";
            if ($password == $password2) {
                $ok = $this->db->registrateMember($name,$surname,$email,$phone,$date,
                    $description,$password,$right,$position);

                if ($ok) {
                    $tplData['alert'] = "OK: ". $name . " " . $surname ." byl úspěšně zaregistrován.";
                } else {
                    // $tplData['alert'] = "Chyba: ". $name . " ". $surname ." se nepodařilo úspěšně zaregistrovat.";
                }
            } else {
                $tplData['alert'] = "Chyba: hesla se neshodují! Proveďte registraci znovu.";
            }

            if($tplData['alert'] != ""){
                echo "<script>alert('$tplData[alert]');</script>";
            }


            $photo_name = $_FILES["photo"]["name"];
            $photo_tmp = $_FILES["photo"]["tmp_name"];

            // Zkontrolujte, zda byl soubor nahrán bez chyb
            if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {

                // Odstranění diakritiky ve jménu a příjmení
                $diakritika = array(
                    'á' => 'a', 'č' => 'c', 'ě' => 'e',
                    'é' => 'e', 'í' => 'i', 'ň' => 'n',
                    'ó' => 'o', 'ř' => 'r', 'š' => 's',
                    'ť' => 't', 'ú' => 'u', 'ů' => 'u',
                    'ý' => 'y', 'ž' => 'z',
                    'Á' => 'A', 'Č' => 'C', 'Ě' => 'E',
                    'É' => 'E', 'Í' => 'I', 'Ň' => 'N',
                    'Ó' => 'O', 'Ř' => 'R', 'Š' => 'S',
                    'Ť' => 'T', 'Ú' => 'U', 'Ů' => 'U',
                    'Ý' => 'Y', 'Ž' => 'Z'
                );
                $nameBezDia = strtr($name, $diakritika);
                $surnameBezDia = strtr($surname, $diakritika);


                // Odstranění mezev při možnosti napřklad 2 příjmení
                $nameBezDiaAMezer = str_replace(' ', '', $nameBezDia);
                $surnameBezDiaAMezer = str_replace(' ', '', $surnameBezDia);

                // Název složky, kterou chcete vytvořit
                $slozka = __DIR__ . "/photos/" . $nameBezDiaAMezer . "_" . $surnameBezDiaAMezer . "_" . $date;

                echo "$slozka";

                // Vytvoření složky
                if (!file_exists($slozka)) {
                    // todo: nefunguje!!!
                    $result = mkdir($slozka, 0777, true); // třetí parametr true znamená vytvořit i nadřazené složky, pokud neexistují
                    echo $result;
                    //error_reporting(E_ALL);
                    //ini_set('display_errors', 1);
                    echo 'Složka byla úspěšně vytvořena.';die();
                } else {
                    echo $slozka;
                    echo "složka existuje";die();
                    echo 'Složka již existuje.';
                }


                // Získání názvu a cesty k nahrávanému souboru
                $targetFile = $slozka . basename($photo_name);

                echo $targetFile;
                // Přesunutí souboru do cílové složky
                if (move_uploaded_file($photo_tmp, $targetFile)) {
                    echo "Soubor " . htmlspecialchars(basename($photo_name)) . " byl úspěšně nahrán.";
                } else {
                    echo "Chyba při přesouvání souboru.";
                }
            }
        }

        //// vypsani prislusne sablony
        // zapnu output buffer pro odchyceni vypisu sablony
        ob_start();
        // pripojim sablonu, cimz ji i vykonam
        require(DIRECTORY_VIEWS ."/RegistrationTemplate.tpl.php");
        // ziskam obsah output bufferu, tj. vypsanou sablonu
        $obsah = ob_get_clean();

        // vratim sablonu naplnenou daty
        return $obsah;
    }
}


?>