<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_memoire = $_POST["id_memoire"];

    $query = $connect->prepare("DELETE FROM memoire WHERE id_memoire=?");
    $query->execute([$id_memoire]);

    echo "Le mémoire a été supprimé avec succès.";
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
   
<form action="supprimer_memoire.php" method="post">
    <input type="hidden" name="id_memoire" value="<?php echo $memoire['id_memoire']; ?>">
    <input type="submit" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce mémoire ?');">
</form>

</body>
</html>