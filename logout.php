<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // Détruire toutes les données de session
    session_destroy();

    // Rediriger l'utilisateur vers la page de connexion ou autre page de votre choix
    header('Location: login.php');
    exit();
} else {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header('Location: login.php');
    exit();
}
?>
