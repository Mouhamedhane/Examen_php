<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'],$_POST['username'], $_POST['prenom'], $_POST['email'], $_POST['password'], $_POST['role'])) {
        $id= $_POST['id']; 
        $nom = $_POST['username'];
        $prenom = $_POST['prenom'];
        $login = $_POST['email']; 
        $passwd = $_POST['password'];
        $role = $_POST['role'];
      
        if ($role !== "etudiant" && $role !== "admin") {
            echo "Rôle d'utilisateur invalide";
            exit; 
        }

        if ($role === "etudiant") {
            $query = $connect->prepare("INSERT INTO etudiant (id_etudiant, nom_etudiant, prenom_etudiant, login_etudiant, password_etudiant,role) VALUES (?, ?, ?, ?, ?,?)");
            $table = 'etudiant';
        } elseif ($role === "admin") {
            $query = $connect->prepare("INSERT INTO admin (id_admin, nom_admin, prenom_admin, login_admin, password_admin,role) VALUES (?, ?, ?, ?, ?,?)");
            $table = 'admin';
        }

        $testquery = $query->execute([$id, $nom, $prenom, $login, $passwd,$role]);

        if ($testquery) {
            echo "Bien inséré dans la table $table";
        } else {
            echo "Erreur lors de l'insertion";
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
    <title>Inscription</title>
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
                <select name="role">
                    <option value="etudiant">Étudiant</option>
                    <option value="admin">Administrateur</option>
                </select>
                <button type="submit" id="myButton">Ajouter Utilisateur</button><br>
                <p class="message">Retour à la <a href="admin.php">page Admin</a></p>
            </form>
        </div> 
    </div>
</body>
</html>
