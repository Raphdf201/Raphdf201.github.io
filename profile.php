<!DOCTYPE html>
<html>
<head>
    <title>Profil de l'utilisateur</title>
</head>
<body>
    <h1>Profil de l'utilisateur</h1>

    <?php
    session_start(); // Démarrer la session

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php'); // Rediriger vers la page de connexion s'il n'est pas connecté
        exit();
    }

    // Récupérer les informations du profil depuis la base de données (vous devrez personnaliser cette partie)
    require 'db.php'; // Incluez le fichier de connexion à la base de données
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = $user_id"; // Remplacez "users" par le nom de votre table utilisateur
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        echo '<p>Nom d\'utilisateur : ' . $row['username'] . '</p>';
        // Affichez d'autres informations du profil si nécessaire
    } else {
        echo '<p>Profil non trouvé.</p>';
    }
    ?>

    <p><a href="index.php">Retour à la page d'accueil</a></p>
</body>
</html>
