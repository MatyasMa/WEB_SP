<?php

class ControllerBasics
{
    public function overPrihlaseni() {
        session_start();
        if (!$_SESSION['prihlaseny']) {
            header("Location: index.php");;
        }
    }

    public function menuTlacitka(){
        if ($_POST['akce'] == "logout") {
            if ($_SESSION['prihlaseny'] == true) {
                $_SESSION['prihlaseny'] = false;
                header("Location: index.php");
            }
        } else if ($_POST['akce'] == "user") {
            header("Location: index.php?page=o-clenovi");
        }
    }
}