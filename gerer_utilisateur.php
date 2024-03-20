<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gerer utlisateur</title>
    <link rel="stylesheet" href="admin.css">
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
        <h1>Redirection validez votre option<br> </h1>
        <form action="redirect.php" method="post">
    <input type="radio" id="ajouter" name="action" value="ajouter">
    <label for="ajouter">Ajouter</label><br>
    <input type="radio" id="modifier" name="action" value="modifier">
    <label for="modifier">Modifier</label><br>
    <input type="radio" id="supprimer" name="action" value="supprimer">
    <label for="supprimer">Supprimer</label><br><br>
    <input type="submit" value="Valider">
</form>
        <div class="img_admin"><img src="image/admin.webp" alt=""></div>
    </div>
</body>
</html>
