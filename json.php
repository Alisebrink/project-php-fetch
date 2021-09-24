<?php


// DB-settings gentemot phpMyAdmin
define("DBHOST", "studentmysql.miun.se");
define("DBUSER", "liis1800");
define("DBPASS", "89fby3tq");
define("DBDATABASE", "liis1800");

/*
// Konstanter för db-inställningar 
define("DBHOST", "localhost");
define("DBUSER", "admin");
define("DBPASS", "password");
define("DBDATABASE", "admin");
*/
/* DB-anslutning */
$db = mysqli_connect(DBHOST, DBUSER, DBPASS, DBDATABASE) or die('Fel vid anslutning');

/* Kontrollera om något argument angetts i adressraden */
$numrows = 999; // Maxvärde
if(isset($_GET['numrows'])) {
    $numrows = intval($_GET['numrows']);
}

/* SQL-fråga */
$sql = "SELECT * FROM guestbook LIMIT $numrows";
$result = mysqli_query($db, $sql) or die('Fel vid SQL-fråga');

/* Spara resultatet som en associativ array */
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

/* Konvertera till JSON */
$json = json_encode($rows, JSON_PRETTY_PRINT);

/* Utskrift */
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

echo $json;