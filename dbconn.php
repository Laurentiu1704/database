<?php
// Databaseverbinding instellen
$hostname = "localhost";
$username = "jouw_gebruikersnaam";
$password = "jouw_wachtwoord";
$db_name = "winkel";

$mysqli = new mysqli($hostname, $username, $password, $db_name);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
