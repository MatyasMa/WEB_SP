<?php


// nactu rozhrani kontroleru
require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");
require_once(DIRECTORY_CONTROLLERS."/ControllerBasics.class.php");

class EventDetailController extends ControllerBasics implements IController
{
    private $db;
    public function __construct()
    {
        require_once(DIRECTORY_MODELS."/DatabaseModel.class.php");
        $this->db = new DatabaseModel();
    }

    public function show(string $pageTitle):string
    {
        //// vsechna data sablony budou globalni
        global $tplData;
        $tplData = [];
        // nazev
        $tplData['title'] = $pageTitle;




        $this->overPrihlaseni();

        $this->menuTlacitka();



        if(isset($_POST['action']) and $_POST['action'] == "delete"
            and isset($_POST['id_event']) and isset($_POST['id_member'])
        ){
            $id_a = $_POST['id_event'];
            $id_m = $_POST['id_member'];

            $tplData['delete'] = "";

            $ok = $this->db->deleteAttending(intval($_POST['id_event']), intval($_POST['id_member']));
            if($ok){
                $tplData['delete'] = "OK: Účast uživatele s ID:$id_m na akci s ID:$id_a byla smazána";
            } else {
                $tplData['delete'] = "CHYBA: Uživateli s ID:$id_m na akci s ID:$id_a se nepodařila smazat účast.";
            }
            echo "<script>alert('$tplData[delete]');</script>";



        }

        $tplData['members'] = $this->db->getAllMembers();
        $tplData['rights'] = $this->db->getAllRights();

        // Získání hodnoty ID z URL
        $id_akce = isset($_GET['id-akce']) ? $_GET['id-akce'] : null;
        $tplData['is_attending'] = $this->db->getAllIsAttending($id_akce);



        //// vypsani prislusne sablony
        // zapnu output buffer pro odchyceni vypisu sablony
        ob_start();
        // pripojim sablonu, cimz ji i vykonam
        require(DIRECTORY_VIEWS ."/EventDetailTemplate.tpl.php");
        // ziskam obsah output bufferu, tj. vypsanou sablonu
        $obsah = ob_get_clean();

        // vratim sablonu naplnenou daty
        return $obsah;
    }
}