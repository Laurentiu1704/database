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
// Controleren of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Gegevens ophalen
    $naam = $_GET["naam"];
    $achternaam = $_GET["achternaam"];
    $leeftijd = $_GET["leeftijd"];
    $adres = $_GET["adres"];
    $email = $_GET["email"];

    // Gegevens weergeven
    echo "<h2>Ingevoerde Gegevens:</h2>";
    echo "<p><strong>Naam:</strong> $naam</p>";
    echo "<p><strong>Achternaam:</strong> $achternaam</p>";
    echo "<p><strong>Leeftijd:</strong> $leeftijd</p>";
    echo "<p><strong>Adres:</strong> $adres</p>";
    echo "<p><strong>Email:</strong> $email</p>";
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
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
