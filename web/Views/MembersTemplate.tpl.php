<?php

global $tplData;

// pripojim objekt pro vypis hlavicky a paticky HTML

require(DIRECTORY_VIEWS ."/TemplateBasics.class.php");
$tplHeaders = new TemplateBasics();


// hlavicka
$tplHeaders->getHTMLHeader($tplData['title']);

$res = '

<div class="d-flex align-items-center justify-content-center prehled_clenu table-responsive">
    <div class="col-md-10 mt-md-5 col-12">
    <table class="table table-hover table-light mb-md-5 table-striped">
    <thead>
        <tr>
        <th class="bg-dark" style="color: white">ID</th>
        <th class="bg-dark" style="color: white">Jméno</th>
        <th class="bg-dark" style="color: white">Příjmení</th>
        <th class="bg-dark" style="color: white">Email</th>
        <th class="bg-dark" style="color: white">Telefon</th>
        <th class="bg-dark" style="color: white">Datum narození</th>
        <th class="bg-dark" style="color: white">Právo</th>
        <th class="bg-dark" style="color: white">Pozice</th>';


        if ($_SESSION['pravo'] == 1 || $_SESSION['pravo'] == 2) {
            $res .= '<th class="bg-dark" style="color: white">Smazání</th>
            </tr></thead><tbody>';
        }


foreach($tplData['members'] as $u){
    $polePrava = $tplData['rights'];
    $pravoClena = $polePrava[$u['id_pravo'] - 1];
    $polePozice = $tplData['positions'];
    $poziceClena = $polePozice[$u['id_pozice'] - 1];
    $res .= "<tr><td>$u[id]</td><td>$u[jmeno]</td><td>$u[prijmeni]</td><td>$u[email]</td>
            <td>$u[tel]</td><td>$u[datum_narozeni]</td>"
        ."<td>$pravoClena[nazev_prava]</td>"
        ."<td>$poziceClena[nazev_pozice]</td>";


        if ($_SESSION['pravo'] == 1 || $_SESSION['pravo'] == 2) {
            $res .= "
                <td><form method='post'>
                <input type='hidden' name='id_member' value='$u[id]'>
                <script>var msg = 'Opravdu chcete tohoto člena smazat?';</script>
                <button class='btn btn-secondary' type='submit' name='action' value='delete'
                onclick='return confirm(msg)'>Smazat</button>
                </form></td>";
        }

        $res .= "</tr>";
}
$res .= "</tbody></table></div>";


$res .= "</div>";

echo $res;

$tplHeaders->getHTMLFooter();

?>