<?php

// nactu rozhrani kontroleru
require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");
require_once(DIRECTORY_CONTROLLERS."/ControllerBasics.class.php");
class EventSignUpController extends ControllerBasics implements IController
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

        $tplData['events'] = $this->db->getAllEvents();
        $tplData['event_types'] = $this->db->getAllEventTypes();


        $this->overPrihlaseni();

        $this->menuTlacitka();


        if (isset($_POST["potvrzeni_ucasti"])) {
            $potvrzeni_ucasti = $_POST["potvrzeni_ucasti"];
            $id_akce = $_POST["id_akce"];

            // Zde můžete provést další akce podle hodnoty potvrzení účasti
            if ($potvrzeni_ucasti == "ano") {
                // Uživatel potvrdil účast
                $ok = $this->db->zapisHraceNaAkci($_SESSION['id'], $id_akce, 1);
                if ($ok) {
                    $tplData['alert'] = "OK: Byl jste zapsán na akci id: ".$id_akce.".";
                } else {
                    $tplData['alert'] = "";
                    // $tplData['alert'] = "Chyba: při zápisu na akci id:".$id_akce." došlo k chybě.";
                }

            } elseif ($potvrzeni_ucasti == "ne") {
                // Uživatel potvrdil neúčast
                $ok = $this->db->zapisHraceNaAkci($_SESSION['id'], $id_akce, 0);
                if ($ok) {
                    $tplData['alert'] = "OK: U akce id: ".$id_akce." jste zvolil, že se nemůžete účastnit.";
                } else {
                    $tplData['alert'] = "";
                    // $tplData['alert'] = "Chyba: Při volbě, že se nemůžete účastnit akce id: ".$id_akce." došlo k chybě.";
                }
            } else {
                // Neznámá hodnota potvrzení účasti
                echo "Neznámá hodnota potvrzení účasti";
            }
            if ($tplData['alert'] != "") {
                echo "<script>alert('$tplData[alert]');</script>";
            }
        }


        //// vypsani prislusne sablony
        // zapnu output buffer pro odchyceni vypisu sablony
        ob_start();
        // pripojim sablonu, cimz ji i vykonam
        require(DIRECTORY_VIEWS ."/EventSignUpTemplate.tpl.php");
        // ziskam obsah output bufferu, tj. vypsanou sablonu
        $obsah = ob_get_clean();

        // vratim sablonu naplnenou daty
        return $obsah;
    }
}