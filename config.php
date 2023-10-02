<?php
// Paramètres de connexion à la base de données
$servername = "localhost"; // Adresse du serveur MySQL
$username = "votre_utilisateur"; // Nom d'utilisateur MySQL
$password = "votre_mot_de_passe"; // Mot de passe MySQL
$database = "votre_base_de_données"; // Nom de la base de données

// Créer une connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $database);

// Vérifier la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
?>
