<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <?php
    session_start(); // Démarrer la session

    // Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION['user_id'])) {
        header('Location: index.php'); // Rediriger vers la page d'accueil s'il est déjà connecté
        exit();
    }

    // Vérifier si le formulaire de connexion a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Valider les données (vous devrez ajouter des vérifications de sécurité ici)

        // Comparer les informations avec celles de la base de données (utilisateur fictif ici)
        if ($username === 'votre_nom_utilisateur' && $password === 'votre_mot_de_passe') {
            // Authentification réussie
            $_SESSION['user_id'] = 1; // Vous devrez récupérer l'ID de l'utilisateur depuis la base de données
            $_SESSION['username'] = $username;
            header('Location: index.php'); // Rediriger vers la page d'accueil après la connexion
            exit();
        } else {
            // Authentification échouée
            echo '<p>Identifiant ou mot de passe incorrect.</p>';
        }
    }
    ?>

    <form method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Se connecter">
    </form>

    <p><a href="register.php">S'inscrire</a></p>
</body>
</html>
