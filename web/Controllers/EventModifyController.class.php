<?php

// nactu rozhrani kontroleru
require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");
require_once(DIRECTORY_CONTROLLERS."/ControllerBasics.class.php");

class EventModifyController extends ControllerBasics implements IController
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

        $tplData['events'] = $this->db->getAllEvents();
        $tplData['event_types'] = $this->db->getAllEventTypes();

        // $this->db–>$this->seradAkcePodleData();

        $this->overPrihlaseni();

        $this->menuTlacitka();

        if ($_SESSION['pravo'] == 4) {
            header("Location: index.php?page=zapis-na-akce");
        }

        if(isset($_POST['action']) and $_POST['action'] == "delete"
            and isset($_POST['id_akce'])
        ){

            // provedu smazani uzivatele
            $ok = $this->db->deleteEvent(intval($_POST['id_akce']));
            if($ok){
                $tplData['delete'] = "OK: Akce s ID:$_POST[id_akce] byla smazána z databáze.";
            } else {
                $tplData['delete'] = "CHYBA: Akci s ID:$_POST[id_akce] se nepodařilo smazat z databáze.";
            }
            echo "<script>alert('$tplData[delete]');</script>";

        }

        //// vypsani prislusne sablony
        // zapnu output buffer pro odchyceni vypisu sablony
        ob_start();
        // pripojim sablonu, cimz ji i vykonam
        require(DIRECTORY_VIEWS ."/EventModifyTemplate.tpl.php");
        // ziskam obsah output bufferu, tj. vypsanou sablonu
        $obsah = ob_get_clean();

        // vratim sablonu naplnenou daty
        return $obsah;
    }

}