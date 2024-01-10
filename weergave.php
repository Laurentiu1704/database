<?php
// Verbinding maken met de database
$hostname = "localhost";
$username = "jouw_gebruikersnaam";
$password = "jouw_wachtwoord";
$db_name = "winkel";

$mysqli = new mysqli($hostname, $username, $password, $db_name);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query om alle data uit de tabel te selecteren
$query_select = "SELECT * FROM producten";
$result_select = $mysqli->query($query_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Weergave</title>
</head>
<body>

<h2>Alle Producten</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Product Naam</th>
        <!-- Voeg andere kolommen toe indien nodig -->
    </tr>
    <?php
    while ($row = $result_select->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['product_naam']}</td>";
        // Voeg andere kolommen toe indien nodig
        echo "</tr>";
    }
    ?>
</table>

<?php
// Sla geselecteerde ID's op in sessievariabelen
$selected_ids = array();
$result_select->data_seek(0); // Zet de resultaten weer terug naar de eerste rij voor hergebruik
while ($row = $result_select->fetch_assoc()) {
    $selected_ids[] = $row['id'];
}

$_SESSION['selected_ids'] = $selected_ids;

$mysqli->close();
?>

<br>
<a href="geselecteerd.php">Ga naar Geselecteerde ID's</a>

</body>
</html>
