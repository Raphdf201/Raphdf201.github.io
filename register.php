<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>

    <?php
    session_start(); // Démarrer la session

    // Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION['user_id'])) {
        header('Location: index.php'); // Rediriger vers la page d'accueil s'il est déjà connecté
        exit();
    }

    // Vérifier si le formulaire d'inscription a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Valider les données (vous devrez ajouter des vérifications de sécurité ici)

        // Enregistrez les informations de l'utilisateur dans la base de données (vous devrez personnaliser cette partie)
        // Exemple basique pour stocker en mémoire (ne pas utiliser en production réelle)
        $_SESSION['user_id'] = 1; // Vous devrez générer un ID utilisateur unique
        $_SESSION['username'] = $username;

        // Rediriger l'utilisateur vers la page d'accueil après l'inscription (vous pouvez choisir une autre page)
        header('Location: index.php');
        exit();
    }
    ?>

    <form method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="S'inscrire">
    </form>

    <p>Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
</body>
</html>
