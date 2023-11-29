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
                    <form>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="option" id="option1" value="option1" required checked>
                                <label class="form-check-label" for="option1">Trénink</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="option" id="option2" value="option2" required>
                                <label class="form-check-label" for="option2">Zápas</label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" id="description" rows="4" placeholder="Popis..." required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="date">Datum konání</label>
                            <input type="date" class="form-control" id="date" required>
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
