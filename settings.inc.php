<?php
/** Globalni nastaveni aplikace */


// informace pro pripojeni k databazi
/** Adresa serveru. */
define("DB_SERVER","localhost");
/** Nazev databaze. */
define("DB_NAME","semestralni_prace");
/** Uzivatel databaze. */
define("DB_USER","root");
/** Heslo uzivatele databaze */
define("DB_PASS","");


// nazvy tabulek databaze
/** Tabulka s akcemi. */
define("TABLE_EVENTS", "AKCE");
/** Tabulka s uzivateli. */
define("TABLE_MEMBERS", "CLENOVE");
/** Tabulka s pozicemi. */
define("TABLE_POSITION", "POZICE");
/** Tabulka s pravy uzivatelu. */
define("TABLE_RIGHT", "PRAVO");
/** Tabulka s cleny, kteri se ucastni akce. */
define("TABLE_IS_ATTENDING", "SE_UCASTNI");
/** Tabulka s typy akci. */
define("TABLE_EVENT_TYPE", "TYP_AKCE");


// stranky webu
/** Adresar kontroleru. */
const DIRECTORY_CONTROLLERS = "web/Controllers";
/** Adresar modelu. */
const DIRECTORY_MODELS = "web/Models";
/** Adresar sablon */
const DIRECTORY_VIEWS = "web/Views";

/** Klic defaultni webove stranky. */
const DEFAULT_WEB_PAGE_KEY = "prihlaseni";


/** Dostupne webove stranky. */
const WEB_PAGES = array(
    //// Uvodni stranka ////
    "prihlaseni" => array(
        "title" => "Přihlášení",
        "nav_title" => "Přihlášení",

        //// kontroler
        "file_name" => "LoginController.class.php",
        "class_name" => "LoginController",
    ),
    //// KONEC: Uvodni stranka ////

    //// Zapis na akce ////
    "zapis-na-akce" => array(
        "title" => "Zápisování na akce",
        "nav_title" => "Zápis na akce",

        //// kontroler
        "file_name" => "EventSignUpController.class.php",
        "class_name" => "EventSignUpController",
    ),
    //// KONEC: Zapis na akce ////

    //// Pridani nove akce ////
    "pridani-akce" => array(
        "title" => "Přidání nové akce",
        "nav_title" => "Přidání akce",

        //// kontroler
        "file_name" => "AddEventController.class.php",
        "class_name" => "AddEventController",
    ),
    //// KONEC: Pridani nove akce ////

    //// Přehled všech akcí pro úpravy////
    "prehled-akci" => array(
        "title" => "Přehled akcí",
        "nav_title" => "Přehled akcí",

        //// kontroler
        "file_name" => "EventModifyController.class.php",
        "class_name" => "EventModifyController",
    ),
    //// KONEC: Přehled akcí ////

    //// Prehled clenu ////
    "clenove" => array(
        "title" => "Přehled členů",
        "nav_title" => "Členové",

        //// kontroler
        "file_name" => "MembersController.class.php",
        "class_name" => "MembersController",
    ),
    //// KONEC: Prehled clenu ////

    //// Registrace noveho clena ////
    "registrace" => array(
        "title" => "Registrace nového člena",
        "nav_title" => "Nový člen",

        //// kontroler
        "file_name" => "RegistrationController.class.php",
        "class_name" => "RegistrationController",
    ),
    //// KONEC: Prehled clenu ////


    //// Stránka o členovi ////
    "o-clenovi" => array(
        "title" => "O členovi",
        "nav_title" => "O členovi",

        //// kontroler
        "file_name" => "AboutMemberController.class.php",
        "class_name" => "AboutMemberController",
    ),
    //// KONEC: o členovi ////

    //// Detail akce ////
    "detail-akce" => array(
        "title" => "Detail akce",
        "nav_title" => "Detail akce",

        //// kontroler
        "file_name" => "EventDetailController.class.php",
        "class_name" => "EventDetailController",
    ),
    //// KONEC: detail akce ////

);

?>