<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil de l'administrateur</title>
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
    <h1>Liste des mémoires</h1>
    <table>
        <tr>
            <th>Nom du mémoire</th>
            <th>Date de création</th>
            <th>Thème</th>
            <th>Domaine</th>
            <th>Fichier</th>
        </tr>
        <?php
        require_once("connexion.php");

        try {
            $query = $connect->query("
                SELECT m.nom_memoire, m.date_creation, m.fichier, t.nom_theme, d.nom_domaine
                FROM memoire m
                JOIN theme t ON m.id_theme = t.id_theme
                JOIN domaine d ON m.id_domaine = d.id_domaine
            ");
            $memoires = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($memoires as $memoire) {
                echo "<tr>";
                echo "<td>" . $memoire['nom_memoire'] . "</td>";
                echo "<td>" . $memoire['date_creation'] . "</td>";
                echo "<td>" . $memoire['nom_theme'] . "</td>";
                echo "<td>" . $memoire['nom_domaine'] . "</td>";
                echo "<td><a href='" . $memoire['fichier'] . "' target='_blank'>" . $memoire['fichier'] . "</a></td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "<tr><td colspan='5'>Erreur : " . $e->getMessage() . "</td></tr>";
        }
        ?>
    </table>
        
        <div class="img_admin"><img src="image/admin.webp" alt=""></div>
    </div>
</body>
</html>
