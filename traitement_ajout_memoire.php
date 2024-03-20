<?php
require_once("connexion.php");

if(isset($_POST['nom_memoire'], $_POST['date_creation'], $_POST['fichier'], $_POST['id_domaine'], $_POST['nom_theme'])) {
    $nom_memoire = $_POST['nom_memoire'];
    $date_creation = $_POST['date_creation'];
    $fichier = $_POST['fichier'];
    $id_domaine = $_POST['id_domaine'];
    $nom_theme = $_POST['nom_theme'];

    $query_insert_theme = $connect->prepare("INSERT INTO theme (nom_theme) VALUES (:nom_theme)");
    $query_insert_theme->bindParam(':nom_theme', $nom_theme);
    $query_insert_theme->execute();

    $id_theme = $connect->lastInsertId();

    $query_insert_memoire = $connect->prepare("INSERT INTO memoire (nom_memoire, date_creation, fichier, id_domaine, id_theme) VALUES (:nom_memoire, :date_creation, :fichier, :id_domaine, :id_theme)");
    $query_insert_memoire->bindParam(':nom_memoire', $nom_memoire);
    $query_insert_memoire->bindParam(':date_creation', $date_creation);
    $query_insert_memoire->bindParam(':fichier', $fichier);
    $query_insert_memoire->bindParam(':id_domaine', $id_domaine);
    $query_insert_memoire->bindParam(':id_theme', $id_theme);

    if($query_insert_memoire->execute()) {
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
