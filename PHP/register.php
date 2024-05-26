<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="register-body">
    <?php
    require('config.php');

    $message = ''; // Initialisation du message

    if (isset($_POST['submit'])) {
        $nom = mysqli_real_escape_string($conn, stripslashes($_POST['nom']));
        $email = mysqli_real_escape_string($conn, stripslashes($_POST['email']));
        $password = mysqli_real_escape_string($conn, stripslashes($_POST['password']));

        // Rechercher le plus petit ID disponible
        $query_select = "SELECT ID FROM users ORDER BY ID ASC";
        $result_select = mysqli_query($conn, $query_select);
        $new_id = 1;

        // Parcourir les ID existants pour trouver le premier trou
        while ($row = mysqli_fetch_assoc($result_select)) {
            if ($row['ID'] != $new_id) {
                // Trouvé un trou dans la séquence d'ID
                break;
            }
            $new_id++;
        }

        $hashed_password = hash('sha256', $password);
        $query = "INSERT into `users` (ID, nom, email, type, password)
                VALUES ('$new_id', '$nom', '$email', 'user', '$hashed_password')";
        $res = mysqli_query($conn, $query);

        if ($res) {
            $message = 'Inscription réussie !'; 
        } else {
            $message = 'Une erreur s\'est produite. Veuillez réessayer.'; 
        }        
    }
    ?>
    <header id="tete">
        <a id="logo" href="#"><img src="../Documents/logo-2.png"></a>
        <nav id="burger">
            <label for="toggle">☰</label>
            <input type="checkbox" id="toggle">
            <div id="menu-burger">
                <a href="../../Html/page1.html">ACCUEIL</a>
                <a href="actu.html">ACTUALITE</a>
                <a href="#">LE PROJET</a>
                <a href="FAQ.html">FAQ</a>
            </div>
        </nav>
    </header>
<section id="register">
    <form class="register-box" action="" method="post">
        <h1 class="box-title">S'inscrire</h1>
        <input type="text" class="box-input" name="nom" placeholder="Nom d'utilisateur" required />
        <input type="text" class="box-input" name="email" placeholder="Email" required />
        <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
        <input type="submit" name="submit" value="S'inscrire" class="box-button" />
        <?php if ($message != ''): ?>
            <p class="box-title"><?php echo $message; ?> <br> <a class="retour" href="login.php">Connectez-vous ici</a> </p>
        <?php else: ?>
            <p class="box-title">Déjà inscrit? <br> <a class="retour" href="login.php">Connectez-vous ici</a></p> <!-- Affichage du lien d'inscription -->
        <?php endif; ?>
    </form>
</section>
</body>
</html>
