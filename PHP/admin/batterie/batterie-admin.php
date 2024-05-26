<?php
session_start();
// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirige vers la page de connexion
    header("Location: ../../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations sur la batterie</title>
    <link rel="stylesheet" href="../../../CSS/batterie.css">
</head>
<body>
<header id="tete">
        <a id="logo" href="#"><img src="../../Documents/logo-2.png"></a>
        <h1 id="titre-principale">R'E-CHARGE</h1>
        <nav id="burger">
            <label for="toggle" id="burger-label">☰</label>
            <input type="checkbox" id="toggle">
            <div id="menu-burger">
                <a href="../PHP/login.php">CONNEXION</a>
                <a href="actu.html">ACTUALITE</a>
                <a href="#">LE PROJET</a>
                <a href="FAQ.html">FAQ</a>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Gestion de la batterie</h1>
        <div id="battery-info">
            <p>Niveau de la batterie : <span id="battery-level">En attente...</span></p>
            <p>Statut de la batterie : <span id="battery-status">En attente...</span></p>
        </div>
    </div>
    <a href="../../../PHP/logout.php">DECONNEXION</a>
    <script src="batterie.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggle = document.getElementById('toggle');
            var burgerLabel = document.getElementById('burger-label');
    
            toggle.addEventListener('change', function() {
                burgerLabel.style.position = toggle.checked ? 'fixed' : 'relative';
                // Si le toggle est coché, la position de burger-label est fixée, sinon elle est relative
                burgerLabel.style.top = toggle.checked ? '65px' : 'auto';
                // Si le toggle est coché, la position top est définie à 10px, sinon elle est laissée automatique
                burgerLabel.style.right = toggle.checked ? '0px' : 'auto';
                // Si le toggle est coché, la position left est définie à 10px, sinon elle est laissée automatique
            });
        });
    </script>
</body>
</html>