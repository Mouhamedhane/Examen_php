<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des mémoires</title>
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
        <h1>Gestion des mémoires</h1>
        
        <h2>Ajouter un mémoire</h2>
        <form action="traitement_ajout_memoire.php" method="post">
    <label for="nom_memoire">Nom du mémoire :</label>
    <input type="text" name="nom_memoire" id="nom_memoire" required><br>
    
    <label for="date_creation">Date de création :</label>
    <input type="date" name="date_creation" id="date_creation" required><br>
    
    <label for="fichier">Chemin du fichier :</label>
    <input type="text" name="fichier" id="fichier" placeholder="Mettez le chemin du mémoire en PDF" required><br>
    
    <label for="id_domaine">Domaine :</label>
    <select name="id_domaine" id="id_domaine" required>
        <option value="">Sélectionnez le domaine</option>
        <option value="1">Santé</option>
        <option value="2">Marketing</option>
        <option value="3">Informatique</option>
        <option value="4">Transport Logistique</option>
    </select><br>
    
    <label for="nom_theme">Nom du thème :</label>
    <input type="text" name="nom_theme" id="nom_theme" required><br>
    
    <input type="submit" value="Ajouter Mémoire">
</form>
    <script>
    function showFilePath() {
        var input = document.getElementById("fichier");
        var chemin_fichier = document.getElementById("chemin_fichier");
        chemin_fichier.value = input.value;
    }
    </script>

        <h2>Modifier un mémoire</h2>
        <form action="modifier_memoire.php" method="post" enctype="multipart/form-data">
            <label for="id_memoire">Sélectionnez le mémoire à modifier :</label>
            <select name="id_memoire" id="id_memoire">
                <?php
                require_once("connexion.php");

                $query = $connect->query("SELECT id_memoire, nom_memoire FROM memoire");
                $memoires = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach ($memoires as $memoire) {
                    echo "<option value='" . $memoire['id_memoire'] . "'>" . $memoire['nom_memoire'] . "</option>";
                }
                ?>
            </select><br>
            
            <label for="nouveau_nom_memoire">Nouveau nom du mémoire :</label>
            <input type="text" name="nouveau_nom_memoire" id="nouveau_nom_memoire" required><br>
            
            <label for="nouvelle_date_creation">Nouvelle date de création :</label>
            <input type="date" name="nouvelle_date_creation" id="nouvelle_date_creation" required><br>
            
            <label for="nouveau_chemin_fichier">Nouveau chemin du fichier :</label>
            <input type="text" name="nouveau_chemin_fichier" id="nouveau_chemin_fichier" required><br>

            
            <input type="submit" value="Modifier Mémoire">
        </form>
        
        <h2>Supprimer un mémoire</h2>
        <form action="supprimer_memoire.php" method="post">
            <label for="id_memoire">Sélectionnez le mémoire à supprimer :</label>
            <select name="id_memoire" id="id_memoire">
                <?php
                foreach ($memoires as $memoire) {
                    echo "<option value='" . $memoire['id_memoire'] . "'>" . $memoire['nom_memoire'] . "</option>";
                }
                ?>
            </select><br>
            <input type="submit" value="Supprimer Mémoire" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce mémoire ?');">
        </form>
    </div>
</body>
</html>
