<?php
// Démarre la session
session_start();

// Vérifie si l'utilisateur est connecté
if(isset($_SESSION["username"])) {
    // Supprime toutes les variables de session
    session_unset();

    // Détruit la session
    session_destroy();

    // Redirige l'utilisateur vers la page de connexion ou toute autre page
    header("Location: ../Html/page1.html");
    exit();
} else {
    // Redirige l'utilisateur vers la page de connexion si la session n'existe pas
    header("Location: ../Html/page1.html");
    exit();
}
?>

