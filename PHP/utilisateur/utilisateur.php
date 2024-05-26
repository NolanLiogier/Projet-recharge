<?php
session_start();
// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirige vers la page de connexion
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R'E-CHARGE</title>
    <link rel="stylesheet" href="../../CSS/page1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header id="tete">
        <a id="logo" href="#"><img src="../../Documents/logo-2.png"></a>
        <h1 id="titre-principale">R'E-CHARGE</h1>
        <nav id="burger">
            <label for="toggle" id="burger-label">☰</label>
            <input type="checkbox" id="toggle">
            <div id="menu-burger">
                <a href="batterie-user.php">BATTERIE</a>
                <a href="actu.html">ACTUALITE</a>
                <a href="../../Html/projet.html">LE PROJET</a>
                <a href="../../Html/FAQ.html">FAQ</a>
                <a href="../../PHP/logout.php">DECONNEXION</a>
            </div>
        </nav>
    </header>
    
    <section id="accueil">
        <div id="accueil-fond">
            <div id="img-fond">
                <p id="texte-centrale">La simplicité de l'écologie</p>
            </div>
        </div>
    </section>

    <section id="nous">
        <div id="nous-texte">
            <hr id="hr1">
            <h2>BIENVENUE CHEZ R'E-CHARGE !</h2>
            <p>Nous sommes une équipe dynamique de jeunes entrepreneurs, passionnés par l'innovation et le progrès. Inspirés par les défis que nous rencontrons en tant qu'étudiants, nous avons créé R'E-charge pour fournir des solutions concrètes à notre communauté.</p>
            <p>Notre mission est de créer un environnement de travail optimal tout en favorisant le bien-être de nos utilisateurs. Nous croyons en l'équilibre entre vie professionnelle et personnelle et nous nous engageons à vous accompagner dans cette démarche.</p>
            <p>Chaque membre de notre équipe contribue avec son expertise et son dévouement pour faire de R'E-charge une référence en innovation et en qualité de vie au travail.</p>
            <p>Contactez-nous pour en savoir plus sur notre projet et comment vous pouvez vous impliquer dans cette aventure passionnante !</p>
            <hr id="hr2">
        </div>
        <div id="nous-img">
            <img src="../../Documents/chef.jpg">
        </div>
    </section>

    <section id="projet">
        <div id="projet-titre"><h1>LE PROJET<br>T.R.E.</h1></div>
        <div id="div-projet">
            <div class="case-projet">
            <h2>Durabilité écologique :</h2>
            <hr>
            <ul>
                <li>Utilisation de l'énergie solaire pour la recharge des appareils.</li>
                <li>Autonomie totale grâce à l'énergie renouvelable.</li>
                <li>Contribution à la réduction de l'empreinte carbone en favorisant une source d'énergie propre.</li>
            </ul>
            </div>
            <div class="case-projet">
            <h2>Praticité et utilité :</h2>
            <hr>
            <ul>
                <li>Offre un espace de travail extérieur pratique pour les étudiants.</li>
                <li>Permet la recharge des appareils électroniques tout en travaillant.</li>
                <li>Crée un environnement propice à la productivité et à la concentration en plein air.</li>
            </ul>
            </div>
            <div class="case-projet">
            <h2>Technologie innovante :</h2>
            <hr>
            <ul>
                <li>Intégration de panneaux solaires dans une table d'extérieur.</li>
                <li>Contrôle optimal de la batterie à travers un site web développé par le groupe.</li>
                <li>Utilisation de la technologie pour assurer l'efficacité et la fiabilité du système de recharge.</li>
            </ul>
            </div>
        </div>
        <div id="projet-lien"><a id="savoir-plus" href="#">En savoir plus sur le projet</a></div>
    </section>

    <footer id="pied">
        <div id="foot-carte" class="grid-container">
            <div id="infos" class="foot-grille">
                <p>
                    <p id="titre-infos">Informations</p>
                    <p>Le Marais Sainte Thérèse,
                    <br> 48 Bd Thiers, 42000 Saint-Étienne
                    <br>
                    <br><a href="https://www.linkedin.com/in/nolan-liogier-105323278">© 2024 - Nolan LIOGIER<br>Tous droits réservés</a> 
                    </p>
                </p>
                    <ul id="icones">
                        <li>
                            <a class="lien-icones" href="https://www.instagram.com/recharge.eu">
                                <i class="fab fa-instagram"></i> 
                            </a>
                        </li>
                        <li>
                            <a class="lien-icones" href="https://www.youtube.com/@RE-charge-EU?si=C68HS7-RxztVyuKz">
                                <i class="fab fa-youtube"></i> 
                            </a>
                        </li>
                        <li>
                            <a class="lien-icones" href="mailto:r.e.charge.eu@gmail.com">
                                <i class="far fa-envelope"></i> 
                            </a>
                        </li>
                        <li>
                            <a class="lien-icones" href="tel:+33645124059">
                                <i class="fas fa-phone"></i> 
                            </a>
                        </li>
                    </ul>
            </div>
            <div class="foot-grille" id="menu-footer">
                <a href="#">ACCUEIL</a>
                <a href="batterie-user.php">BATTERIE</a>
                <a href="actu.html">ACTUALITE</a>
                <a href="../../Html/projet.html">LE PROJET</a>
                <a href="../../Html/FAQ.html">FAQ</a>
                <a href="../../PHP/logout.php">DECONNEXION</a>
            </div>
        </div>
    </footer>
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
