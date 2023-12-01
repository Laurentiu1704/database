<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Toevoegen</title>
</head>
<body>

<h2>Product Toevoegen</h2>

<form method="post" action="">
    <label for="product_naam">Product Naam:</label>
    <input type="text" name="product_naam" required><br>

    <label for="prijs_per_stuk">Prijs per Stuk:</label>
    <input type="number" name="prijs_per_stuk" step="0.01" required><br>

    <label for="omschrijving">Omschrijving:</label>
    <textarea name="omschrijving" required></textarea><br>

    <input type="submit" value="Toevoegen">
</form>

<?php
$hostname = "localhost";
$username = "jouw_gebruikersnaam";
$password = "jouw_wachtwoord";
$db_name = "Winkel"; 


$mysqli = new mysqli($hostname, $username, $password);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $db_name";
if ($mysqli->query($sql) === TRUE) {
    echo "Database created successfully.<br>";
} else {
    echo "Error creating database: " . $mysqli->error . "<br>";
}

$mysqli->select_db($db_name);

$sql = "CREATE TABLE IF NOT EXISTS producten (
    product_code INT PRIMARY KEY AUTO_INCREMENT,
    product_naam VARCHAR(255) NOT NULL,
    prijs_per_stuk DECIMAL(10, 2) NOT NULL,
    omschrijving TEXT
)";
if ($mysqli->query($sql) === TRUE) {
    echo "Table 'producten' created successfully.<br>";
} else {
    echo "Error creating table: " . $mysqli->error . "<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    $sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES ('$product_naam', $prijs_per_stuk, '$omschrijving')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Product succesvol toegevoegd.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error . "<br>";
    }
}
