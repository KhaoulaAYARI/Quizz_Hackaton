<?php
session_start();

// Initialiser le score si nécessaire
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

// Vérifier si les données sont bien envoyées
if (!isset($_POST['question']) || !isset($_POST['answer'])) {
    die("Données invalides.");
}

// Rediriger vers la page de feedback
header("Location: feedback.php");
exit;
?>
 

