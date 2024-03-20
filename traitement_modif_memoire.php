<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_memoire'])) {
    $idMemoire = $_POST['id_memoire'];
    $nomMemoire = $_POST['nom_memoire'];
    $dateCreation = $_POST['date_creation'];
    $fichier = $_POST['fichier'];
    $idTheme = $_POST['id_theme'];
    $idDomaine = $_POST['id_domaine'];

    try {
        $stmt = $connect->prepare("UPDATE memoire SET nom_memoire = ?, date_creation = ?, fichier = ?, id_theme = ?, id_domaine = ? WHERE id_memoire = ?");
        $stmt->execute([$nomMemoire, $dateCreation, $fichier, $idTheme, $idDomaine, $idMemoire]);

        echo "Le mémoire a été modifié avec succès.";

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Données de modification de mémoire manquantes ou méthode de requête incorrecte.";
}
?>
