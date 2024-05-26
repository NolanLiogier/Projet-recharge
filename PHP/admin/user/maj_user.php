<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css" />
    <title>Document</title>
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


if (!isset($_POST['submit'])) {
    // Afficher le formulaire de sélection de l'utilisateur
    $query = "SELECT nom FROM users";
    $result = mysqli_query($conn, $query);
?>
    <form class="box" action="" method="post">
        <h1 class="box-title">Sélectionner un utilisateur</h1>
        <select class="box-input" name="nom">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . htmlspecialchars($row['nom']) . "'>" . htmlspecialchars($row['nom']) . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit" value="Sélectionner" class="box-button" />
    </form>

<?php
} else {
    // Traitement de la mise à jour des informations de l'utilisateur
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $query = "SELECT * FROM users WHERE nom = '$nom'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
    <form class="box" action="" method="post">
        <h1 class="box-title">Mettre à jour les informations de l'utilisateur <?php echo htmlspecialchars($nom); ?></h1>
        <input type="hidden" name="nom" value="<?php echo htmlspecialchars($nom); ?>">
        <input type="text" class="box-input" name="email" placeholder="email" value="<?php echo htmlspecialchars($row['email']); ?>" />
        <input type="password" class="box-input" name="password" placeholder="Mot de passe" />
        <div>
            <select class="box-input" name="type" id="type">
                <option value="admin" <?php if ($row['type'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="user" <?php if ($row['type'] == 'user') echo 'selected'; ?>>User</option>
            </select>
        </div>
        <input type="submit" name="submit_update" value="Mettre à jour" class="box-button" />
    </form>
<?php
}

if (isset($_POST['submit_update'])) {
    // Traitement de la mise à jour des informations de l'utilisateur
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $updates = array();

    // Vérifier si chaque champ est rempli et les ajouter aux mises à jour
    if (!empty($_POST['email'])) {
        $updates[] = "email = '" . mysqli_real_escape_string($conn, $_POST['email']) . "'";
    }
    if (!empty($_POST['password'])) {
        $updates[] = "password = '" . hash('sha256', $_POST['password']) . "'";
    }
    if (!empty($_POST['type'])) {
        $updates[] = "type = '" . mysqli_real_escape_string($conn, $_POST['type']) . "'";
    }

    // Construire et exécuter la requête de mise à jour
    if (!empty($updates)) {
        $query_update = "UPDATE users SET " . implode(", ", $updates) . " WHERE nom = '$nom'";
        $result_update = mysqli_query($conn, $query_update);

        if ($result_update) {
            echo "<div class='success-message'>Les informations de l'utilisateur ont été mises à jour avec succès.</div>";
        } else {
            echo "<div class='error-message'>Erreur lors de la mise à jour des informations de l'utilisateur : " . mysqli_error($conn) . "</div>";
        }
        } else {
            echo "<div class='success-message'>Aucune information à mettre à jour.</div>";
        }
        
        
        
}
        
?>
<p class="box-title">
<a class="retour-menu" href="user.php">Menu</a>
</p>
</body>
</html>
