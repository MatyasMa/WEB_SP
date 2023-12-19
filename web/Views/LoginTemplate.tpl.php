<?php
global $tplData;

// pripojim objekt pro vypis hlavicky a paticky HTML

require(DIRECTORY_VIEWS ."/TemplateBasics.class.php");
$tplHeaders = new TemplateBasics();


// hlavicka

$tplHeaders->getHTMLHeader($tplData['title']);


$res = '
<div class="intro">
    <img src="img/loginbg.jpeg">
    <div class="intro_photo_prekryti col-12 d-flex align-items-center">
        <div class="login_form_background container p-lg-5 p-4 rounded-5 col-lg-8 col-10 text-white">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 col-10">
                    <h2 class="fs-2 login_headline mb-4 text-center">Přihlášení</h2>
                    <form method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="E-mail" required>
                            <input type="password" class="form-control mt-4" id="password" name="loginPassword" placeholder="Heslo" required>
                        </div>
                        
                        <div class="form-group d-flex justify-content-center mt-lg-5 mt-4">
                            <button type="submit" class="col-6 p-2 btn margin-auto"
                                    name="action" value="login"
                                    style="background-color: indianred" >
                                Přihlásit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
';

/*
    <div class="form-group form-check mt-4">
        <input type="checkbox" class="form-check-input" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Pamatovat si pro příští přihlášení</label>
    </div>
 */

echo $res;

// hlavicka
$tplHeaders->getHTMLFooter();


?>