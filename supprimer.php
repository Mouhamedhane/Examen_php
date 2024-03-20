<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = $connect->prepare("DELETE FROM etudiant WHERE id_etudiant=?");
        $testquery = $query->execute([$id]);

        if ($testquery) {
            echo "Utilisateur supprimé avec succès";
        } else {
            echo "Erreur lors de la suppression de l'utilisateur";
        }
    } else {
        echo "L'identifiant de l'utilisateur n'est pas défini";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimer</title>
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
        <h1>Supprimer un User<br> </h1>
     <form action="" method="POST">
        <label for="id">ID de l'utilisateur à supprimer:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit">Supprimer</button>
    </form>
        <div class="img_admin"><img src="image/admin.webp" alt=""></div>
    </div>
</body>
</html>
