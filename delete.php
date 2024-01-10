<?php
require_once("dbconn.php");

if (isset($_GET["product_code"])) {
    $product_code = $_GET["product_code"];

    // Deel 2: Gegevens uit de database verwijderen
    $query_delete = "DELETE FROM producten WHERE product_code = ?";
    $stmt_delete = $mysqli->prepare($query_delete);
    $stmt_delete->bind_param("i", $product_code);
    $stmt_delete->execute();
    
    // Terugkeren naar de indexpagina na verwijderen
    header("Location: index.php");
    exit();
} else {
    echo "Geen product_code opgegeven.";
}
?>

<?php
$mysqli->close();
?>
