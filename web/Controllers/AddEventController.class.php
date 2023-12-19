<?php

// nactu rozhrani kontroleru
require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");
require_once(DIRECTORY_CONTROLLERS."/ControllerBasics.class.php");

class AddEventController extends ControllerBasics implements IController
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

        if ($_SESSION['pravo'] == 4) {
            header("Location: index.php?page=zapis-na-akce");
        }



        //// neprisel pozadavek na smazani uzivatele?
        if(isset($_POST['option']) and isset($_POST['description']) and isset($_POST['date_start'])
            and isset($_POST['date_end']) and isset($_POST['action'])
            and $_POST['action'] == "add_event"
        ){
            $option = $_POST["option"];
            $description = $_POST["description"];
            $date_start = $_POST["date_start"];
            $date_end = $_POST["date_end"];


            $ok = $this->db->addEvent($description, $date_start, $date_end,  $option);

            if ($ok) {
                $tplData['alert'] = "OK: Událost: " . $_POST['option'] . " byla přidána do databáze.";
            } else {
                $tplData['alert'] = "Chyba: Nepodařilo se přidat událost: " . $_POST['option'] . " do databáze.";
            }
            echo "<script>alert('$tplData[alert]');</script>";
        }


        //// vypsani prislusne sablony
        // zapnu output buffer pro odchyceni vypisu sablony
        ob_start();
        // pripojim sablonu, cimz ji i vykonam
        require(DIRECTORY_VIEWS ."/AddEventTemplate.tpl.php");
        // ziskam obsah output bufferu, tj. vypsanou sablonu
        $obsah = ob_get_clean();

        // vratim sablonu naplnenou daty
        return $obsah;
    }
}

?>