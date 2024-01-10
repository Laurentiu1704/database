<?php

$hostname = "localhost";
$username = "jouw_gebruikersnaam";
$password = "jouw_wachtwoord";
$db_name = "winkel";

$mysqli = new mysqli($hostname, $username, $password, $db_name);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Connected to database ($db_name)";

// Check of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang gegevens van het formulier
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    // Update het tweede product met de gegevens van het formulier
    $query_update = "UPDATE jouw_tabel SET product_naam = ?, prijs_per_stuk = ?, omschrijving = ? WHERE product_code = 2";
    $stmt_update = $mysqli->prepare($query_update);
    $stmt_update->bind_param("sds", $product_naam, $prijs_per_stuk, $omschrijving);
    $stmt_update->execute();
}

// Laad de gegevens van het tweede product
$query_load = "SELECT * FROM jouw_tabel WHERE product_code = 2";
$result_load = $mysqli->query($query_load);
$row_load = $result_load->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Formulier</title>
</head>
<body>

<h2>Product Formulier</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Product Naam: <input type="text" name="product_naam" value="<?php echo $row_load['product_naam']; ?>"><br>
    Prijs per Stuk: <input type="number" name="prijs_per_stuk" value="<?php echo $row_load['prijs_per_stuk']; ?>"><br>
    Omschrijving: <textarea name="omschrijving"><?php echo $row_load['omschrijving']; ?></textarea><br>
    <input type="submit" value="Opslaan">
</form>

</body>
</html>

<?php
$mysqli->close();
?>
