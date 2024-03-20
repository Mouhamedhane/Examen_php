<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body> 
    <div class="logo">
        <img src="logo.png">
        <ul>
            <li><a href="admin.php">Menu</a></li>
            <li><a href="#">Paramètres</a></li>
            <li><a href="profil_admin.php">Profil</a></li>
            <li><a href="index.php" onclick="return(confirm('Vous vous déconnectez ?'));"><button type="submit"  class="disconnect" >Déconnexion</button></a></li>
        </ul>
    </div>
    <div class="group">
        <h1>Dashboard admin <br> </h1>
        <ul class="nav-links">
            <li><a href="gerer_memoire.php">Gere Memoires</a></li>
            <li><a href="gerer_utilisateur.php"> compte user</a></li>
        </ul>
    </div>
</body>
</html>
