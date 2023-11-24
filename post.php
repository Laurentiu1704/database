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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de ingevoerde gegevens op
    $naam = isset($_POST["naam"]) ? $_POST["naam"] : "";
    $achternaam = isset($_POST["achternaam"]) ? $_POST["achternaam"] : "";
    $leeftijd = isset($_POST["leeftijd"]) ? $_POST["leeftijd"] : "";
    $adres = isset($_POST["adres"]) ? $_POST["adres"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    // Toon de ingevoerde gegevens op de pagina
    echo "<h2>Ingevoerde Gegevens:</h2>";
    echo "<p><strong>Naam:</strong> $naam</p>";
    echo "<p><strong>Achternaam:</strong> $achternaam</p>";
    echo "<p><strong>Leeftijd:</strong> $leeftijd</p>";
    echo "<p><strong>Adres:</strong> $adres</p>";
    echo "<p><strong>Email:</strong> $email</p>";
}
?>

<form method="post">
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
