<?php

global $tplData;

// pripojim objekt pro vypis hlavicky a paticky HTML

require(DIRECTORY_VIEWS ."/TemplateBasics.class.php");
$tplHeaders = new TemplateBasics();


// hlavicka
$tplHeaders->getHTMLHeader($tplData['title']);


$res = '
<div class="intro">
    <img src="img/introbg.jpeg">
    <div class="intro_photo_prekryti col-12 d-flex align-items-center">
        <h1 class="mb-5 col-12 text-white text-center">
            Zápis na tréninky a zápasy
        </h1>
    </div>
</div>
';
$res .= '<div class="akceBox pt-5 pb-5">';
$res .= '<h2 class="col-10 akceBox__nadpis">Zápasy</h2>';
foreach ($tplData['events'] as $e) {
    if ($e['id_typ_akce'] == 1) {
        if ($e['popis_akce'] == null) {
            $e['popis_akce'] = "Nebyl vložen žádný popis k této akci";
        }
        $res .= '
         <div class="akceBox__box">
             <a href="index.php?page=detail-akce&id-akce='."$e[id]".'" class="akceBox__box__text"
                style="">
                <div class="akceBox__box__text__nadpis">
                    <i class="fa-solid fa-futbol"></i>
                    <h2>Zápas</h2>
                </div>
                <p>'
                    ."$e[popis_akce]"
                .'</p>
            </a>


            <div class="akceBox__box__paticka">
                <div class="akceBox__box__paticka__datum">
                    <p>'
                        ."$e[datum_konani_zacatek] <br> - $e[datum_konani_konec]"
                    .'</p>
                </div>
                <div class="akceBox__box__paticka__potvrzeni">
                    <form method="post">
                        <!-- Další pole formuláře -->
                    
                        <!-- Prvek pro potvrzení účasti s ikonou -->
                        <div class="akceBox__box__paticka__potvrzeni__ano">
                            <input type="hidden" name="id_akce" value='."$e[id]".'>
                            <button type="submit" name="potvrzeni_ucasti" value="ano" title="Zúčastním se">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </div>
                    </form>
                    <form method="post">
                        <!-- Další pole formuláře -->
                    
                        <!-- Prvek pro potvrzení neúčasti s ikonou -->
                        <div class="akceBox__box__paticka__potvrzeni__ne">
                            <input type="hidden" name="id_akce" value='."$e[id]".'>
                            <button type="submit" name="potvrzeni_ucasti" value="ne" title="Nemůžu se zúčastnit - omluvenka">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
            
        </div>';
    }
}

$res .= '<h2 class="col-10 akceBox__nadpis">Tréninky</h2>';
foreach ($tplData['events'] as $e) {
    if ($e['id_typ_akce'] == 2) {
        if ($e['popis_akce'] == null) {
            $e['popis_akce'] = "Nebyl vložen žádný popis k této akci";
        }
        $res .= '
         <div class="akceBox__box" style="background-color: #2f2fa8">
         
            <a href="index.php?page=detail-akce&id-akce='."$e[id]".'" class="akceBox__box__text"
                style="">
                <div class="akceBox__box__text__nadpis">
                    <i class="fa-solid fa-dumbbell"></i>
                    <h2>Trénink</h2>
                </div>
                <p>'
            ."$e[popis_akce]"
            .'</p>
            </a>

            <div class="akceBox__box__paticka" style="background-color: #1717a8">
                <div class="akceBox__box__paticka__datum">
                    <p>'
            ."$e[datum_konani_zacatek] <br> - $e[datum_konani_konec]"
            .'</p>
                </div>
                <div class="akceBox__box__paticka__potvrzeni">
                    <form method="post">
                        <!-- Další pole formuláře -->
                    
                        <!-- Prvek pro potvrzení účasti s ikonou -->
                        <div class="akceBox__box__paticka__potvrzeni__ano">
                            <input type="hidden" name="id_akce" value='."$e[id]".'>
                            <button type="submit" name="potvrzeni_ucasti" value="ano" title="Zúčastním se">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </div>
                    </form>
                    <form method="post">
                        <!-- Další pole formuláře -->
                    
                        <!-- Prvek pro potvrzení neúčasti s ikonou -->
                        <div class="akceBox__box__paticka__potvrzeni__ne">
                            <input type="hidden" name="id_akce" value='."$e[id]".'>
                            <button type="submit" name="potvrzeni_ucasti" value="ne" title="Nemůžu se zúčastnit - omluvenka">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
            
        </div>';
    }
}

$res .= '<h2 class="col-10 akceBox__nadpis">Ostatní</h2>';
foreach ($tplData['events'] as $e) {
    if ($e['id_typ_akce'] == 3) {
        if ($e['popis_akce'] == null) {
            $e['popis_akce'] = "Nebyl vložen žádný popis k této akci";
        }
        $res .= '
         <div class="akceBox__box" style="background-color: #ad8027">
         
            <a href="index.php?page=detail-akce&id-akce='."$e[id]".'" class="akceBox__box__text"
                style="">
                <div class="akceBox__box__text__nadpis">
                    <i class="fa-solid fa-people-group"></i>
                    <h2>Ostatní</h2>
                </div>
                <p>'
            ."$e[popis_akce]"
            .'</p>
            </a>
       
            <div class="akceBox__box__paticka" style="background-color: #6e4e17">
                <div class="akceBox__box__paticka__datum">
                    <p>'
            ."$e[datum_konani_zacatek] <br> - $e[datum_konani_konec]"
            .'</p>
                </div>
                <div class="akceBox__box__paticka__potvrzeni">
                    <form method="post">
                        <!-- Další pole formuláře -->
                    
                        <!-- Prvek pro potvrzení účasti s ikonou -->
                        <div class="akceBox__box__paticka__potvrzeni__ano">
                            <input type="hidden" name="id_akce" value='."$e[id]".'>
                            <button type="submit" name="potvrzeni_ucasti" value="ano" title="Zúčastním se">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </div>
                    </form>
                    <form method="post">
                        <!-- Další pole formuláře -->
                    
                        <!-- Prvek pro potvrzení neúčasti s ikonou -->
                        <div class="akceBox__box__paticka__potvrzeni__ne">
                            <input type="hidden" name="id_akce" value='."$e[id]".'>
                            <button type="submit" name="potvrzeni_ucasti" value="ne" title="Nemůžu se zúčastnit - omluvenka">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>';
    }
}



$res .= "</div>";
echo $res;

$tplHeaders->getHTMLFooter();

?>