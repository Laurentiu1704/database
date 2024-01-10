<?php
require_once("dbconn.php");

// Deel 1: Gegevens uit de database selecteren en weergeven
$query_select = "SELECT * FROM producten ORDER BY product_code";
$result_select = $mysqli->query($query_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten Overzicht</title>
</head>
<body>

<h2>Alle Producten</h2>
<table border="1">
    <tr>
        <th>Product Code</th>
        <th>Product Naam</th>
        <th>Prijs per Stuk</th>
        <th>Omschrijving</th>
    </tr>
    <?php
    while ($row = $result_select->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['product_code']}</td>";
        echo "<td>{$row['product_naam']}</td>";
        echo "<td>{$row['prijs_per_stuk']}</td>";
        echo "<td>{$row['omschrijving']}</td>";
        echo "</tr>";
    }
    ?>
</table>

<!-- Link naar delete.php met product_code=2 -->
<a href="delete.php?product_code=2">Verwijder product 2</a>

</body>
</html>

<?php
$mysqli->close();
?>
