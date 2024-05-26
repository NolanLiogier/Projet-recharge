<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body id="login-body">
<?php
require('config.php');
session_start();

if (isset($_POST['nom'])){
  $nom = stripslashes($_REQUEST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom);
  $_SESSION['nom'] = $nom;
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE nom='$nom' 
  and password='".hash('sha256', $password)."'";
  
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    $_SESSION['logged_in'] = true;
    if ($user['type'] == 'admin') {
      header('location: admin/home.php');      
    }else{
      header('location: /PHP/utilisateur/utilisateur.php');
    }
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
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
<section id="login">
  <form class="login-box" action="" method="post" name="login">
    <h1 class="box-title">Connexion</h1>
    <input type="text" class="box-input" name="nom" placeholder="Nom d'utilisateur">
    <input type="password" class="box-input" name="password" placeholder="Mot de passe">
    <input type="submit" value="Connexion " name="submit" class="box-button">
    <p class="box-title">Vous êtes nouveau ici? <br>
      <a class="retour" href="register.php">S'inscrire</a>
    </p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</section>
</body>
</html> 
