<!DOCTYPE html>
<html>
<head>
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


if (isset($_REQUEST['nom'], $_REQUEST['email'], $_REQUEST['type'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur 
  $nom = stripslashes($_REQUEST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom); 
  // récupérer l'email 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  // récupérer le type (user | admin)
  $type = stripslashes($_REQUEST['type']);
  $type = mysqli_real_escape_string($conn, $type);

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

    $query_insert = "INSERT INTO users (ID, nom, email, type, password) VALUES ('$new_id', '$nom', '$email', '$type', '$hashed_password')";
    $res = mysqli_query($conn, $query_insert);

    if($res){
       echo "<div class='success'>
             <h1>Utilisateur ajouté !</h1>
       </div>";
    } else {
       echo "<div class='error'>
             <h1>Erreur lors de l'ajout.</h1>
             <p>Veuillez réessayer.</p>
       </div>";
    }
} else {
?>

<form class="box" action="" method="post">
    <h1>Ajouter un utilisateur</h1>
  <input type="text" class="box-input" name="nom" 
  placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" 
  placeholder="Email" required />
  <div>
      <select class="box-input" name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
  </div>
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="+ Add" class="box-button" />
</form>
<?php } ?>
<p class="box-title">
<a class="retour-menu" href="user.php">Menu</a>
</p>
</body>
</html>
