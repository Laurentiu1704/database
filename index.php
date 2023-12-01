<?php

$hostname = "localhost";
$username = "jouw_gebruikersnaam";
$password = "jouw_wachtwoord";
$db_name = "Winkel";


$mysqli = new mysqli($hostname, $username, $password, $db_name);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Connected to database ($db_name)";

$mysqli->close();
?>
