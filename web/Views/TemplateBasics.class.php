<?php

/**
 * Trida vypisujici HTML hlavicku a paticku stranky.
 */
class TemplateBasics
{

    const PAGE_INTRO = "LoginTemplate.tpl.php";

    /**
     *  Vrati vrsek stranky az po oblast, ve ktere se vypisuje obsah stranky.
     *  @param string $pageTitle    Nazev stranky.
     */
    public function getHTMLHeader(string $pageTitle) {
    ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title><?php echo $pageTitle; ?></title>

            <!--    Bootstrap import -->
            <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
            <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>

            <!--    Font awesome icons import-->
            <link href="fontawesome-free-6.4.2-web/css/fontawesome.css" rel="stylesheet">
            <link href="fontawesome-free-6.4.2-web/css/brands.css" rel="stylesheet">
            <link href="fontawesome-free-6.4.2-web/css/solid.css" rel="stylesheet">
            <script defer src="fontawesome-free-6.4.2-web/js/brands.js"></script>
            <script defer src="fontawesome-free-6.4.2-web/js/solid.js"></script>
            <script defer src="fontawesome-free-6.4.2-web/js/fontawesome.js"></script>

            <!--    My import -->
            <link rel="stylesheet" href="css/style.css">
            <script src="js/app.js"></script>

        </head>
        <body class="vh-100 overflow-x-hidden">

        <?php
        if ( $pageTitle != "Přihlášení") {
        ?>
        <!-- NAVIGACE -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container col-lg-12 col-10">
                <a class="navbar-brand fs-2" href="index.php">FC FAV</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight">
                    <span class="navbar-toggler-icon"></span></button>


                <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header text-white border-bottom">
                        <h5 id="offcanvasRightLabel">Navigace</h5>
                        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body flex-lg-row d-flex flex-column p-3">
                        <ul class="navbar-nav justify-content-center align-items-center flex-grow-1 pe-3 fs-4">
                            <?php

                            session_start();
                            if ($_SESSION['pravo'] == 4) {
                                // vypis menu
                                foreach(WEB_PAGES as $key => $pInfo){
                                    if ($key == "prihlaseni" || $key == "o-clenovi" || $key == "detail-akce"
                                        || $key == "pridani-akce" || $key == "registrace" || $key == "prehled-akci") {
                                        continue;
                                    }
                                    echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='index.php?page=$key'>$pInfo[nav_title]</a>
                                </li> 
                                ";
                                }
                            } else if($_SESSION['pravo'] == 3) {
                                // vypis menu
                                foreach(WEB_PAGES as $key => $pInfo){
                                    if ($key == "prihlaseni" || $key == "o-clenovi" || $key == "detail-akce"
                                        || $key == "registrace") {
                                        continue;
                                    }
                                    echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='index.php?page=$key'>$pInfo[nav_title]</a>
                                </li> 
                                ";
                                }
                            } else {
                                // vypis menu
                                foreach(WEB_PAGES as $key => $pInfo){
                                    if ($key == "prihlaseni" || $key == "o-clenovi" || $key == "detail-akce") {
                                        continue;
                                    }
                                    echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='index.php?page=$key'>$pInfo[nav_title]</a>
                                </li> 
                                ";
                                }
                            }
                            ?>

                        </ul>
                        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">

                            <form method="post">
                                <button type="submit"
                                        name="akce" value="user"
                                        class="btn btn-light">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </form>
                            <form method="post">
                                <button type="submit"
                                        name="akce" value="logout"
                                        class="btn btn-light">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </button>
                            </form>


                            <!--
                            <a href="login.php" class="text-white text-decoration-none prihlaseni">Přihlášení</a>
                            <a href="registration.php" class="text-white text-decoration-none px-4 py-1 rounded-3"
                               style="background-color: indianred">Registrace</a>
                           -->
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <?php
    }
    }
     /**
     *  Vrati paticku stranky.
     */
    public function getHTMLFooter(){

        ?>

            <div class="col-12 text-white text-center footer">

                © 2023 - Matyáš Mašek

            </div>

            </body>
            </html>

        <?php
    }

    public function odhlasit() {


    }

}
?>