<?php
require_once("dbconn.php");
require_once("functions.php");

// Deel 1: Gegevens uit de database selecteren en weergeven
selectData();

// Deel 2: Gegevens in de database opslaan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    insertData($product_naam, $prijs_per_stuk, $omschrijving);
}

// Deel 3: Gegevens in de database wijzigen
if (isset($_GET["product_code"]) && $_GET["action"] == "update") {
    $product_code = $_GET["product_code"];
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    updateData($product_naam, $prijs_per_stuk, $omschrijving, $product_code);
}

// Deel 4: Gegevens uit de database verwijderen
if (isset($_GET["product_code"]) && $_GET["action"] == "delete") {
    $product_code = $_GET["product_code"];
    deleteData($product_code);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Operaties</title>
</head>
<body>

<h2>Formulier om gegevens toe te voegen</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Product Naam: <input type="text" name="product_naam"><br>
    Prijs per Stuk: <input type="number" name="prijs_per_stuk"><br>
    Omschrijving: <textarea name="omschrijving"></textarea><br>
    <input type="submit" value="Toevoegen">
</form>

<!-- Code voor het wijzigen en verwijderen van gegevens -->

</body>
</html>

<?php
$mysqli->close();
?>
