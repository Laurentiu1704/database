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

$query1 = "SELECT * FROM jouw_tabel";
$result1 = $mysqli->query($query1);

echo "<h2>Deel 1: Alle data uit de tabel</h2>";
echo "<ul>";
while ($row1 = $result1->fetch_assoc()) {
    echo "<li>{$row1['column1']} - {$row1['column2']} - {$row1['column3']}</li>";
}
echo "</ul>";

$product_code1 = 1;
$query2 = "SELECT * FROM jouw_tabel WHERE product_code = ?";
$stmt2 = $mysqli->prepare($query2);
$stmt2->bind_param("i", $product_code1);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2->fetch_assoc();

echo "<h2>Deel 2: Product met product_code 1</h2>";
echo "<p>{$row2['column1']} - {$row2['column2']} - {$row2['column3']}</p>";

$product_code2 = 2;
$query3 = "SELECT * FROM jouw_tabel WHERE product_code = :product_code";
$stmt3 = $mysqli->prepare($query3);
$stmt3->bind_param(":product_code", $product_code2, PDO::PARAM_INT);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();

echo "<h2>Deel 3: Product met product_code 2</h2>";
echo "<p>{$row3['column1']} - {$row3['column2']} - {$row3['column3']}</p>";

$mysqli->close();
?>

