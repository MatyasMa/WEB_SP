<?php

// nactu rozhrani kontroleru
require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");
require_once(DIRECTORY_CONTROLLERS."/ControllerBasics.class.php");

class AboutMemberController extends ControllerBasics implements IController
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

        $tplData['current_member'] = $this->db->getCurrentMember($_SESSION['id']);
        $tplData['rights'] = $this->db->getAllRights();
        $tplData['positions'] = $this->db->getAllPositions();


        //// vypsani prislusne sablony
        // zapnu output buffer pro odchyceni vypisu sablony
        ob_start();
        // pripojim sablonu, cimz ji i vykonam
        require(DIRECTORY_VIEWS ."/AboutMemberTemplate.tpl.php");
        // ziskam obsah output bufferu, tj. vypsanou sablonu
        $obsah = ob_get_clean();

        // vratim sablonu naplnenou daty
        return $obsah;
    }
}