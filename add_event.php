<?php
    include('header.php');
?>

<div class="intro">
    <img src="img/eventbg.jpeg">
    <div class="intro_photo_prekryti col-12 d-flex justify-content-center align-items-center">
        <div class="new_event_background mt-5 p-4 rounded-5 col-lg-8 col-10 text-white">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-10">
                    <h2 class="new_event_headline mb-4">Přidání nové akce</h2>
                    <form id="pridani_akce" action="forms/new_event.php" method="post" onsubmit="return kontrolaDatumu(2);" enctype="multipart/form-data" >
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="option" id="trenink" value="trenink" required checked>
                                <label class="form-check-label" for="trenink">Trénink</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="option" id="zapas" value="zapas" required>
                                <label class="form-check-label" for="zapas">Zápas</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="option" id="jine" value="jine" required>
                                <label class="form-check-label" for="jine">Jiné</label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" id="description" rows="4" placeholder="Popis..." required></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mt-3">
                                <label for="date_start">Datum konání začátek</label>
                                <input type="datetime-local" class="form-control" id="date_start" name="date_start"
                                       onchange="kontrolaDatumu(1)" required>
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for="date_end">Datum konání konec</label>
                                <input type="datetime-local" class="form-control" id="date_end" name="date_end"
                                       onchange="kontrolaDatumu(1)" required>
                            </div>
                            <p id="vypis_kontrola_vstupu">&nbsp</p>
                        </div>
                        <button type="submit" class="col-7 p-2 btn margin-auto mt-5 text-white offset-md-5"
                                style="background-color: indianred">Odeslat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>
