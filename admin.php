<!DOCTYPE html>
<html>
<head>
    <title>Administration</title>
</head>
<body>
    <h1>Administration</h1>

    <?php
    session_start(); // Démarrer la session

    // Vérifier si l'utilisateur est connecté (et qu'il est administrateur, vous devrez implémenter cette vérification)
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php'); // Rediriger vers la page de connexion s'il n'est pas connecté
        exit();
    }

    // Afficher un formulaire pour gérer les propriétés des comptes
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Traitement du formulaire (vous devrez personnaliser cette partie)
        $property1 = $_POST['property1'];
        $property2 = $_POST['property2'];

        // Mettez à jour les propriétés dans la base de données (vous devrez personnaliser cette partie)
        require 'db.php'; // Incluez le fichier de connexion à la base de données
        $user_id = $_SESSION['user_id'];
        $sql = "UPDATE users SET property1 = '$property1', property2 = '$property2' WHERE id = $user_id";
        mysqli_query($conn, $sql);

        echo '<p>Propriétés mises à jour avec succès !</p>';
    }

    // Afficher le formulaire pour mettre à jour les propriétés des comptes
    require 'db.php'; // Incluez le fichier de connexion à la base de données
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = $user_id"; // Remplacez "users" par le nom de votre table utilisateur
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
    }
    ?>

    <form method="POST">
        <label for="property1">Propriété 1 :</label>
        <input type="text" id="property1" name="property1" value="<?php echo $row['property1']; ?>"><br><br>

        <label for="property2">Propriété 2 :</label>
        <input type="text" id="property2" name="property2" value="<?php echo $row['property2']; ?>"><br><br>

        <input type="submit" value="Mettre à jour">
    </form>

    <p><a href="index.php">Retour à la page d'accueil</a></p>
</body>
</html>
