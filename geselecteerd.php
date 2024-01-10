<?php
session_start();

// Controleer of de sessievariabelen zijn ingesteld
if (isset($_SESSION['selected_ids'])) {
    // Haal de geselecteerde ID's op uit de sessie
    $selected_ids = $_SESSION['selected_ids'];

    // Toon de geselecteerde ID's op de nieuwe pagina
    echo "<h2>Geselecteerde ID's</h2>";
    foreach ($selected_ids as $selected_id) {
        echo "<p>ID: $selected_id</p>";
    }
} else {
    echo "Geen geselecteerde ID's gevonden.";
}
?>
