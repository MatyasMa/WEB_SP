<?php

// nactu rozhrani kontroleru
require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");
require_once(DIRECTORY_CONTROLLERS."/ControllerBasics.class.php");

class MembersController extends ControllerBasics implements IController
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



        if(isset($_POST['action']) and $_POST['action'] == "delete"
            and isset($_POST['id_member'])
        ){

            // provedu smazani uzivatele
            $ok = $this->db->deleteMember(intval($_POST['id_member']));
            if($ok){
                $tplData['alert'] = "OK: Uživatel s ID:$_POST[id_member] byl smazán z databáze.";
            } else {
                $tplData['alert'] = "CHYBA: Uživatele s ID:$_POST[id_member] se nepodařilo smazat z databáze.";
            }
            echo "<script>alert('$tplData[alert]');</script>";
        }
        


        $tplData['members'] = $this->db->getAllMembers();
        $tplData['rights'] = $this->db->getAllRights();
        $tplData['positions'] = $this->db->getAllPositions();



        //// vypsani prislusne sablony
        // zapnu output buffer pro odchyceni vypisu sablony
        ob_start();
        // pripojim sablonu, cimz ji i vykonam
        require(DIRECTORY_VIEWS ."/MembersTemplate.tpl.php");
        // ziskam obsah output bufferu, tj. vypsanou sablonu
        $obsah = ob_get_clean();

        // vratim sablonu naplnenou daty
        return $obsah;
    }
}

?>