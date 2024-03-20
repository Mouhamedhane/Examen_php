<?php
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'ajouter':
        header("Location: ajouter.php");
        exit();
    case 'modifier':
        header("Location: modifier.php");
        exit();
    case 'supprimer':
        header("Location: supprimer.php");
        exit();
    default:
        echo "Action non reconnue.";
        exit();
}
?>
