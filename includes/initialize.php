<?php
    // This file sets up the core API software

    // define named constants
    // DS = /
    // SITE_ROOT = root ditrectory of project
        // C:/xampp/htdocs/API-Exercies
        
    defined('DS') ? null ; define('DS', DIRECTORY_SEPERATOR);
    defined('SITE_ROOT') ? null : defined('SITE_ROOT', DS.'xampp'. DS.'htdocs'. DS.'API-Exercies');

    defined("CORE_PATH") ? null : defined("CORE_PATH", SITE_ROOT. DS. "core".DS);

    require_once("config.php");

    require_once(CORE_PATH."user.php");

?>