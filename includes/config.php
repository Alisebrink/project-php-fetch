<?php

    session_start(); // startar sessionen

    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.class.php';
    });

    $site_title = "Moment 3";
    $divider = " | ";
    $course = " DT093G";

// Aktivera felrapportering
error_reporting(-1);
ini_set("display_errors", 1);


// DB-settings gentemot phpMyAdmin
define("DBHOST", "studentmysql.miun.se");
define("DBUSER", "liis1800");
define("DBPASS", "89fby3tq");
define("DBDATABASE", "liis1800"); 


/*
// DB-settings gentemot localhost
define("DBHOST", "localhost");
define("DBUSER", "admin");
define("DBPASS", "password");
define("DBDATABASE", "admin");
*/