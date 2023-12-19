<?php

global $tplData;

require(DIRECTORY_VIEWS ."/TemplateBasics.class.php");
$tplHeaders = new TemplateBasics();


// hlavicka
$tplHeaders->getHTMLHeader($tplData['title']);

$res = '
<div class="d-flex align-items-center justify-content-center  table-responsive" style="height: 100vh">
        <div class="col-md-10 mt-md-5 col-12">
';

if ($tplData['is_attending'] != null) {
    $res .= '
        <table class="table table-hover table-light mb-md-5 table-striped">
        <thead>
            <tr>
            <th class="bg-primary" style="color: white">Člen ID</th>
            <th class="bg-primary" style="color: white">Jméno</th>
            <th class="bg-primary" style="color: white">Právo</th>
            <th class="bg-primary" style="color: white">Zúčastní se</th>';


    if ($_SESSION['pravo'] == 1 || $_SESSION['pravo'] == 2) {
        $res .= '<th class="bg-primary" style="color: white">Smazání</th>
            </tr></thead><tbody>';
    }

    foreach($tplData['is_attending'] as $a){
        $poleClenove = $tplData['members'];
        $clen = $poleClenove[0];
        foreach ($poleClenove as $c) {
            if ($c['id'] == $a['id_clena']) {
                $clen = $c;
            }
        }
        $polePrava = $tplData['rights'];
        $pravoClena = $polePrava[$clen['id_pravo'] - 1];
        if ($a['muze_se_ucastnit'] == 1) {
            $barva = "table-success";
        } else if ($a['muze_se_ucastnit'] == 0) {
            $barva = "table-danger";
        }
        $res .= "<tr>
                <td class='$barva'>$clen[id]</td>
                <td  class='$barva'>$clen[jmeno] $clen[prijmeni]</td>
                <td  class='$barva'>$pravoClena[nazev_prava]</td>";
                if ($a['muze_se_ucastnit'] == 1) {
                    $res .= "<td  class='$barva'>Ano</td>";
                } else if ($a['muze_se_ucastnit'] == 0) {
                    $res .= "<td  class='$barva'>Ne</td>";
                }
        if ($_SESSION['pravo'] == 1 || $_SESSION['pravo'] == 2) {
            $res .= "
                    <td class='$barva'><form method='post'>
                    <input type='hidden' name='id_event' value='$a[id_akce]'>
                    <input type='hidden' name='id_member' value='$a[id_clena]'>
                    <script>var msg = 'Opravdu chcete smazat účast tohoto člena na akci?';</script>
                    <button class='btn btn-secondary' type='submit' name='action' value='delete'
                        onclick='return confirm(msg)'>Smazat</button>
                    </form></td>";
        }

        $res .= "</tr>";
    }
    $res .= "</tbody></table>";

} else {
    $res .= "<h2 class='col-10 m-auto' style='color: white; text-align: center'>Na tuto akci ještě žádný člen nezareagoval...</h2>";
}

$res .= "</div></div>";

echo $res;


$tplHeaders->getHTMLFooter();

?>
