<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Mémoires</title>
    <link rel="stylesheet" href="etudiant.css"> 
</head>
<body> 
    <div class="logo">
        <img src="logo.png">
        <ul>
            <li><a href="index.php" onclick="return(confirm('Vous vous déconnectez ?'));"><button type="submit"  class="disconnect" >Déconnexion</button></a></li>
        </ul>
    </div>
    <div class="container">
    <h1 class="anime">
    <span>L</span><span>i</span><span>s</span><span>t</span><span>e</span>
    <span> </span>
    <span>d</span><span>e</span><span>s</span>
    <span> </span>
    <span>M</span><span>é</span><span>m</span><span>o</span><span>i</span><span>r</span><span>e</span><span>s</span>
    </h1>
        
      
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Rechercher par thèmes ou domaines...">
            <button type="submit">Rechercher</button>
        </form>
     
        <div class="memoires">
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
                    echo "<div class='memoire'>";
                    echo "<h2>" . $memoire['nom_memoire'] . "</h2>";
                    echo "<p>Date de création: " . $memoire['date_creation'] . "</p>";
                    echo "<p>Thème: " . $memoire['nom_theme'] . "</p>";
                    echo "<p>Domaine: " . $memoire['nom_domaine'] . "</p>";
                    echo "<a href='" . $memoire['fichier'] . "' download>Télécharger</a>";
                    echo "</div>";
                }

                if (empty($memoires)) {
                    echo "<p>Aucun mémoire trouvé.</p>";
                }
            } catch (PDOException $e) {
                echo "<p>Erreur : " . $e->getMessage() . "</p>";
            }
            ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.anime').classList.add('scrollAnimation');
        });
    </script>
</body>
</html>
