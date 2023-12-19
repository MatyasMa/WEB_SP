<?php
global $tplData;

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
        <th class="bg-danger" style="color: white">ID</th>
        <th class="bg-danger" style="color: white">Popis</th>
        <th class="bg-danger" style="color: white">Začátek</th>
        <th class="bg-danger" style="color: white">Konec</th>
        <th class="bg-danger" style="color: white">Typ</th>';

if ($_SESSION['pravo'] == 1 || $_SESSION['pravo'] == 2) {
    $res .= ' 
                <th class="bg-danger" style="color: white">Smazání</th>
            </tr>
            </thead>
            <tbody>
     ';
}


foreach($tplData['events'] as $e){
    $poleTypyAkci = $tplData['event_types'];
    $typAkce = $poleTypyAkci[$e['id_typ_akce'] - 1];
    if ($e['popis_akce'] == null){
        $e['popis_akce'] = "Žádný popis";
    }
    $res .= "<tr>
                <td>$e[id]</td>
                <td>$e[popis_akce]</td>
                <td>$e[datum_konani_zacatek]</td>
                <td>$e[datum_konani_konec]</td>"
        ."<td>$typAkce[nazev_typu_akce]</td>";

    if ($_SESSION['pravo'] == 1 || $_SESSION['pravo'] == 2) {
        $res .= " "
            . "<td><form method='post'>"
            . "<input type='hidden' name='id_akce' value='$e[id]'>"
            . "<script>var msg = 'Opravdu chcete tuto akci smazat?';</script>"
            . "<button class='btn btn-secondary' type='submit' name='action' value='delete'
               onclick='return confirm(msg)'>Smazat</button>"
            . "</form></td></tr>";
    }
}
$res .= "</tbody></table></div>";


$res .= "</div>";



echo $res;

$tplHeaders->getHTMLFooter();

?>