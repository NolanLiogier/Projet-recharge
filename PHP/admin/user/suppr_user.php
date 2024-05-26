<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un ID</title>
    <link rel="stylesheet" href="../../style.css" />
</head>
<body>
    <div id="header">
      <a href="/PHP/admin/home.php">Accueil</a> 
      <a href="/PHP/admin/user/user.php">Gestion</a> 
      <a href="../../../PHP/logout.php">Déconnexion</a>
    </div>
    

    <?php
    require('/var/www/html/PHP/config.php');

    session_start();
    // Vérifie si l'utilisateur est connecté
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        // Redirige vers la page de connexion
        header("Location: ../../login.php");
        exit;
    }
    
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    ?>
    <div class="suppr">
    <h2>Supprimer un utilisateur</h2>
    <form class="box" action="" method="post">
        <select class="box-input" name="nom">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . htmlspecialchars($row['nom']) . "'>" . htmlspecialchars($row['nom']) . "</option>";
                }
                ?>
        </select>
        <button class="box-button" type="submit" name="submit">Supprimer</button>
    </form>
    </div>
    <p class="box-title">
<a class="retour-menu" href="user.php">Menu</a>
</p>

    <?php
    if (isset($_POST['submit'])) {
        $nom_client = $_POST['nom'];
        // Prépare la requête DELETE
        $query_delete = "DELETE FROM `users` WHERE nom = '$nom_client'";

        
        // Exécute la requête
        if (mysqli_query($conn, $query_delete)) {
            echo "<p class='success-message'>L'utilisateur a été supprimé avec succès.</p>";
        } else {
            echo "<p class='errorMessage'>Erreur lors de la suppression :</p> " . htmlspecialchars(mysqli_error($conn));
        }
    }
    ?>

</body>
</html>
