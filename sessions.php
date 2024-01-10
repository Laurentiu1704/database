<?php
// Start de sessie
session_start();

// Definieer variabelen en geef ze waarden
$naam = "John Doe";
$email = "john.doe@example.com";

// Sla de variabelen op in de sessie
$_SESSION['naam'] = $naam;
$_SESSION['email'] = $email;
?>
