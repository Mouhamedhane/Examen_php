<?php
require_once("connexion.php");

if(isset($_POST['id_memoire'], $_POST['nouveau_nom_memoire'], $_POST['nouvelle_date_creation'], $_POST['nouveau_chemin_fichier'])) {
    $id_memoire = $_POST['id_memoire'];
    $nouveau_nom_memoire = $_POST['nouveau_nom_memoire'];
    $nouvelle_date_creation = $_POST['nouvelle_date_creation'];
    $nouveau_chemin_fichier = $_POST['nouveau_chemin_fichier'];

    $query = $connect->prepare("UPDATE memoire SET nom_memoire = :nouveau_nom_memoire, date_creation = :nouvelle_date_creation, fichier = :nouveau_chemin_fichier WHERE id_memoire = :id_memoire");

    $query->bindParam(':id_memoire', $id_memoire);
    $query->bindParam(':nouveau_nom_memoire', $nouveau_nom_memoire);
    $query->bindParam(':nouvelle_date_creation', $nouvelle_date_creation);
    $query->bindParam(':nouveau_chemin_fichier', $nouveau_chemin_fichier);

    if($query->execute()) {
        header("Location: admin.php?success=1");
        exit();
    } else {
        header("Location: admin.php?error=1");
        exit();
    }
} else {
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="modifier_memoire.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_memoire" value="ID_DU_MEMOIRE_A_MODIFIER">
    <label for="nom_memoire">Nom du mémoire :</label>
    <input type="text" name="nom_memoire" id="nom_memoire" value="NOM_DU_MEMOIRE_EXISTANT" required><br>
    
    <label for="date_creation">Date de création :</label>
    <input type="date" name="date_creation" id="date_creation" value="DATE_DU_MEMOIRE_EXISTANT" required><br>
    
    <label for="fichier">Fichier :</label>
    <input type="file" name="fichier" id="fichier"><br>
    
    <input type="submit" value="Modifier Mémoire">
</form>

</body>
</html>