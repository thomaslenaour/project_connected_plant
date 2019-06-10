<?php

// --------------------------- //
//       ERRORS DISPLAY        //
// --------------------------- //

// //!\\ A enlever lors du déploiement
error_reporting(E_ALL);
ini_set('display_errors', true);


// --------------------------- //
//          SESSIONS           //
// --------------------------- //

ini_set('session.cookie_lifetime', false);
session_start();

date_default_timezone_set('Europe/Paris');


// --------------------------- //
//         CONSTANTS           //
// --------------------------- //

// Paths
define("PATH_REQUIRE", substr($_SERVER['SCRIPT_FILENAME'], 0, -9)); // Pour fonctions d'inclusion php
define("PATH", substr($_SERVER['PHP_SELF'], 0, -9)); // Pour images, fichiers etc (html)

// Website informations
define("WEBSITE_TITLE", "Connected Flowers");
define("WEBSITE_NAME", "Connected Flowers");
define("WEBSITE_URL", "https://connected-flowers.000webhostapp.com");
define("WEBSITE_DESCRIPTION", "Connected Flowers");
define("WEBSITE_KEYWORDS", "Connected Flowers");
define("WEBSITE_LANGUAGE", "fr-FR");
define("WEBSITE_AUTHOR", "Connected Flowers");
define("WEBSITE_AUTHOR_MAIL", "thomas.lenaour@ynov.com");

// Facebook Open Graph tags
define("WEBSITE_FACEBOOK_NAME", "");
define("WEBSITE_FACEBOOK_DESCRIPTION", "");
define("WEBSITE_FACEBOOK_URL", "");
define("WEBSITE_FACEBOOK_IMAGE", "");

// DataBase informations
define("DATABASE_HOST", "localhost");
define("DATABASE_NAME", "db_name");
define("DATABASE_USER", "db_user");
define("DATABASE_PASSWORD", "db_pass");