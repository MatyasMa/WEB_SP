<?php

global $tplData;

require(DIRECTORY_VIEWS ."/TemplateBasics.class.php");
$tplHeaders = new TemplateBasics();


// hlavicka
$tplHeaders->getHTMLHeader($tplData['title']);


echo '

<div class="intro_registration">
    <img src="img/registrationbg.jpeg">
    <div class="intro_photo_prekryti col-12 d-flex justify-content-center align-items-center">
        <div class="registration_form_background p-lg-5 p-4 rounded-5 col-10 text-white">
            <div class="row justify-content-center rounded-10">
                <div class="col-lg-8 col-11">
                    <h2 class="registration_headline mb-4">Registrace nového člena</h2>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6 mt-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Jméno" required>
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Příjmení" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control mt-3" id="email" name="email" placeholder="E-mail" required>
                            <input type="tel" class="form-control mt-3" id="phone" name="phone" placeholder="Telefonní číslo" required>
                            <label for="date" class="mt-2">Datum narození</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mt-3">
                                <input type="password" class="form-control" id="password" name="password" 
                                placeholder="Heslo" required>
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <input type="password" class="form-control" id="password2" name="password2"
                                       placeholder="Heslo znovu pro ověření" required>
                            </div>
                            <p id="password_match_message" class="mb-0">&nbsp</p>
                            <!-- TODO: oveřit zda se odevšle vždy nebo pouze pokud se shodují hesla -->
                        </div>

                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="pravo" class="col-3">Právo</label>
                                <select id="pravo" class="col-8 p-2" style="height: 40px" name="pravo" onchange="vyberPrava()" required>
                                    <option value="4" selected>Hráč</option>
                                    <option value="3">Trenér</option>
                                    <option value="2">Majitel</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 ">
                                <label for="pozice" class="col-3">Pozice</label>
                                <select id="pozice" class="col-8 p-2" style="height: 40px" name="pozice">
                                    <option value="1">Brankář</option>
                                    <option value="2">Obránce</option>
                                    <option value="3">Záložník</option>
                                    <option value="4">Útočík</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <label for="photo" class="mb-1 col-12">Fotografie</label>
                            <input type="file" class="file_upload form-control-file col-12" id="photo" name="photo" accept="image/*" >
                        </div>
                        <div class="form-group mt-4">
                            <label for="description" class="mb-2">Popis</label>
                            <textarea class="form-control" id="description" rows="4"
                                      placeholder="Zkušenosti, minulé týmy, konkrétní pozice, jiné pozice..."
                                      name="description"></textarea>
                        </div>


                        <button type="submit" class="col-md-7 col-10 p-2 btn margin-auto 
                                                mt-4 text-white offset-md-5 offset-2" 
                                name="action" value="add_member"
                                style="background-color: black">
                            Zaregistrovat
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

';


$tplHeaders->getHTMLFooter();

?>