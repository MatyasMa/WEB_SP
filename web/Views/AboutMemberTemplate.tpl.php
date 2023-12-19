<?php
global $tplData;

require(DIRECTORY_VIEWS ."/TemplateBasics.class.php");
$tplHeaders = new TemplateBasics();


// hlavicka
$tplHeaders->getHTMLHeader($tplData['title']);

$res = "";

$m = $tplData['current_member'][0];
$polePrava = $tplData['rights'];
$pravoClena = $polePrava[$m['id_pravo'] - 1];
$polePozice = $tplData['positions'];
$poziceClena = $polePozice[$m['id_pozice'] - 1];
$res .= '
 
<div class="intro">
    <img src="img/player2.jpeg">
    <div class="intro_photo_prekryti col-12 d-flex justify-content-center align-items-center">
        <div class="new_event_background mt-5 p-4 rounded-5 col-lg-8 col-10 text-white">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-10">
                    <h2 class="new_event_headline mb-4 col-12 ">'
                        ."$m[jmeno] $m[prijmeni]"
                    ."</h2>
                    <div class='d-flex justify-content-between flex-wrap' style='max-height: 100vh'>
                        <div class='col-sm-7 col-12'>
                            <p><b>E-mail:</b><br>$m[email]</p>
                            <p><b>Telefonní číslo:</b><br> $m[tel]</p>
                            <p><b>Datum narození:</b><br> $m[datum_narozeni]</p>
                            <p><b>O členovi:</b><br> $m[o_clenovi]</p>
                            <p><b>Právo:</b><br> $pravoClena[nazev_prava]</p>";

                            if ($poziceClena['id_pozice'] != null){
                                $res .= "
                                <p>Pozice: $poziceClena[id_pozice]</p>
                                ";
                            }
                        $res .= "</div>
                        <div class='col-sm-4 col-6 m-auto'
                        >";

                        $diakritika = array(
                            'á' => 'a', 'č' => 'c', 'ě' => 'e',
                            'é' => 'e', 'í' => 'i', 'ň' => 'n',
                            'ó' => 'o', 'ř' => 'r', 'š' => 's',
                            'ť' => 't', 'ú' => 'u', 'ů' => 'u',
                            'ý' => 'y', 'ž' => 'z',
                            'Á' => 'A', 'Č' => 'C', 'Ě' => 'E',
                            'É' => 'E', 'Í' => 'I', 'Ň' => 'N',
                            'Ó' => 'O', 'Ř' => 'R', 'Š' => 'S',
                            'Ť' => 'T', 'Ú' => 'U', 'Ů' => 'U',
                            'Ý' => 'Y', 'Ž' => 'Z'
                        );
                        $nameBezDia = strtr($m['jmeno'], $diakritika);
                        $surnameBezDia = strtr($m['prijmeni'], $diakritika);


                        // Odstranění mezev při možnosti napřklad 2 příjmení
                        $nameBezDiaAMezer = str_replace(' ', '', $nameBezDia);
                        $surnameBezDiaAMezer = str_replace(' ', '', $surnameBezDia);

                        // Název složky, kterou chcete vytvořit
                        $slozka = $nameBezDiaAMezer . "_" . $surnameBezDiaAMezer . "_" . $m['datum_narozeni'];

                        if (glob('photos/'.$slozka.'/' . '*')){
                            $files = glob('photos/'.$slozka.'/' . '*');
                            $imgSrc = $files[0];
                        } else {
                            $imgSrc = "photos/ball.jpeg";
                        }
                        $res .= "
                        
                        <img style='
                        width: 100%;
                        height: 100%!important;
                        object-fit: cover;
                        position: relative;
                        ' 
                        src='$imgSrc'
                        class='m-auto'>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";

echo $res;

$tplHeaders->getHTMLFooter();

?>