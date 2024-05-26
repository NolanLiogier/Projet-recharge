<?php
require('/var/www/html/PHP/config.php');

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
    <link rel="stylesheet" href="../../style.css" />
    <title>Document</title>
</head>
<body>
    <div id="header">
      <a href="/PHP/admin/home.php">Accueil</a> 
      <a href="/PHP/admin/user/user.php">Gestion</a> 
      <a href="../../../PHP/logout.php">Déconnexion</a>
    </div>
    <h1>Gestion des utilisateurs</h1>
    <div class="menu-gestion">
        <a href="/PHP/admin/user/add_user.php">Nouveau</a>
        <a href="/PHP/admin/user/maj_user.php">Mettre à jour</a>
        <a href="/PHP/admin/user/suppr_user.php">Supprimer</a>
    </div>
<?php
// Requête SQL pour récupérer les informations sur les commandes
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Vérifier s'il y a des résultats
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nom</th><th>Mail</th><th>Type</th></tr>";
    // Affichage des données des commandes
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun utilisateur trouvé.";
}
?>
</body>
</html>
