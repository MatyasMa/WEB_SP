<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Semestrálka webovky</title>

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

<!-- NAVIGACE -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container col-lg-12 col-10">
        <a class="navbar-brand fs-2" href="indexxx.php">Fotbalový tým</a>

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
                    <li class="nav-item">
                        <a class="nav-link" href="event_registration.php">Zápis na akce</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="members.php">Členové</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_event.php">Přidání akce</a>
                    </li>
                </ul>
                <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                    <a href="login.php" class="text-white text-decoration-none prihlaseni">Přihlášení</a>
                    <a href="registration.php" class="text-white text-decoration-none px-4 py-1 rounded-3"
                        style="background-color: indianred">Registrace</a>
                </div>
            </div>
        </div>
    </div>
</nav>