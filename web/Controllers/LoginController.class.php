<?php

// nactu rozhrani kontroleru
require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");
require_once(DIRECTORY_CONTROLLERS."/ControllerBasics.class.php");

class LoginController extends ControllerBasics implements IController
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


        if (isset($_POST['loginEmail']) and isset($_POST['loginPassword']) and $_POST['action'] == "login"){
            $email = $_POST['loginEmail'];
            $password = $_POST['loginPassword'];

            $ok = $this->db->login($email, $password);

            if (!$ok) {
                echo '<script>alert("Chyba: Přihlášení se nezdařilo.");</script>';
            }
        }

        session_start();
        if($_SESSION['prihlaseny'] == true) {
            header("Location: index.php?page=zapis-na-akce");
        } else {
            ob_start();
            // pripojim sablonu, cimz ji i vykonam
            require(DIRECTORY_VIEWS ."/LoginTemplate.tpl.php");
        }


        //// vypsani prislusne sablony
        // zapnu output buffer pro odchyceni vypisu sablony


        // ziskam obsah output bufferu, tj. vypsanou sablonu
        $obsah = ob_get_clean();

        // vratim sablonu naplnenou daty
        return $obsah;
    }
}