<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'], $_POST['username'], $_POST['prenom'], $_POST['email'], $_POST['password'], $_POST['type'])) {
        $id = $_POST['id'];
        $nom = $_POST['username'];
        $prenom = $_POST['prenom'];
        $login = $_POST['email']; 
        $passwd = $_POST['password'];
        $type = $_POST['type']; 

       
        if ($type !== "etudiant") {
            echo "Type d'utilisateur invalide";
            exit; 
        }

        $query = $connect->prepare("UPDATE etudiant SET nom_etudiant=?, prenom_etudiant=?, login_etudiant=?, password_etudiant=?, role=? WHERE id_etudiant=?");
        $testquery = $query->execute([$nom, $prenom, $login, $passwd, $type, $id]);

        if ($testquery) {
            echo "Utilisateur modifié avec succès";
        } else {
            echo "Erreur lors de la modification de l'utilisateur";
        }
    } else {
        echo "Les données nécessaires ne sont pas définies";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="script1.js"></script>
    <title>Modifier un utilisateur</title>
</head>
<body>
    <div class="signup-page">
        <div class="form">
            <form class="signup-form" id="signup-form" action="" method="POST">
                <input type="text" placeholder="ID" name="id" required>
                <input type="text" placeholder="Nom" name="username" required>
                <input type="text" placeholder="Prénom" name="prenom" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Mot de passe" name="password" required>
                <select name="type">
                    <option value="etudiant">Étudiant</option>
                </select>
                <button type="submit" id="myButton">Modifier</button>
                <p class="message">Retour à la <a href="admin.php">page Admin</a></p>
            </form>
        </div>
    </div>
</body>
</html>
