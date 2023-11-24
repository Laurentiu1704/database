<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gegevens Formulier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Haal de ingevoerde gegevens op
    $naam = isset($_GET["naam"]) ? $_GET["naam"] : "";
    $achternaam = isset($_GET["achternaam"]) ? $_GET["achternaam"] : "";
    $leeftijd = isset($_GET["leeftijd"]) ? $_GET["leeftijd"] : "";
    $adres = isset($_GET["adres"]) ? $_GET["adres"] : "";
    $email = isset($_GET["email"]) ? $_GET["email"] : "";

    // Toon de ingevoerde gegevens op de pagina
    echo "<h2>Ingevoerde Gegevens:</h2>";
    echo "<p><strong>Naam:</strong> $naam</p>";
    echo "<p><strong>Achternaam:</strong> $achternaam</p>";
    echo "<p><strong>Leeftijd:</strong> $leeftijd</p>";
    echo "<p><strong>Adres:</strong> $adres</p>";
    echo "<p><strong>Email:</strong> $email</p>";
}
?>

<form method="get">
    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" required>

    <label for="achternaam">Achternaam:</label>
    <input type="text" id="achternaam" name="achternaam" required>

    <label for="leeftijd">Leeftijd:</label>
    <input type="number" id="leeftijd" name="leeftijd" required>

    <label for="adres">Adres:</label>
    <input type="text" id="adres" name="adres" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <input type="submit" value="Verzenden">
</form>

</body>
</html>
