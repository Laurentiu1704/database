<?php
// Start de sessie
session_start();

// Controleer of de sessievariabelen zijn ingesteld
if (isset($_SESSION['naam']) && isset($_SESSION['email'])) {
    // Haal de variabelen op uit de sessie
    $naam = $_SESSION['naam'];
    $email = $_SESSION['email'];

    // Toon de variabelen op de nieuwe pagina
    echo "<h2>Sessievariabelen op variabele.php</h2>";
    echo "<p>Naam: $naam</p>";
    echo "<p>Email: $email</p>";
} else {
    echo "Sessievariabelen zijn niet ingesteld.";
}
?>
