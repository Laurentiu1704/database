<?php
// Functie om gegevens uit de database te selecteren en weer te geven
function selectData() {
    global $mysqli;
    $query = "SELECT * FROM jouw_tabel";
    $result = $mysqli->query($query);

    echo "<h2>Geselecteerde gegevens:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['column1']} - {$row['column2']} - {$row['column3']}</li>";
    }
    echo "</ul>";
}

// Functie om gegevens in de database op te slaan
function insertData($product_naam, $prijs_per_stuk, $omschrijving) {
    global $mysqli;
    $query = "INSERT INTO jouw_tabel (product_naam, prijs_per_stuk, omschrijving) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sds", $product_naam, $prijs_per_stuk, $omschrijving);
    $stmt->execute();
}

// Functie om gegevens in de database te wijzigen
function updateData($product_naam, $prijs_per_stuk, $omschrijving, $product_code) {
    global $mysqli;
    $query = "UPDATE jouw_tabel SET product_naam = ?, prijs_per_stuk = ?, omschrijving = ? WHERE product_code = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sdsi", $product_naam, $prijs_per_stuk, $omschrijving, $product_code);
    $stmt->execute();
}

// Functie om gegevens uit de database te verwijderen
function deleteData($product_code) {
    global $mysqli;
    $query = "DELETE FROM jouw_tabel WHERE product_code = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $product_code);
    $stmt->execute();
}
?>
