<!DOCTYPE html>
<html>
<head>
    <title>Mon Site d'Hébergement de Fichiers</title>
</head>
<body>
    <h1>Mon Site d'Hébergement de Fichiers</h1>

    <?php
    // Vérifiez si l'utilisateur est connecté (vous devrez mettre en œuvre la gestion des sessions)
    session_start();
    if (isset($_SESSION['user_id'])) {
        echo '<p>Bienvenue, ' . $_SESSION['username'] . '!</p>';

        // Affichez la liste des fichiers de l'utilisateur à partir de la base de données
        require 'db.php'; // Incluez le fichier de connexion à la base de données
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM files WHERE user_id = $user_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<h2>Vos fichiers :</h2>';
            echo '<ul>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li><a href="uploads/' . $row['file_name'] . '">' . $row['file_name'] . '</a></li>';
            }
            echo '</ul>';
        } else {
            echo '<p>Vous n\'avez pas encore téléchargé de fichiers.</p>';
        }
    } else {
        // Si l'utilisateur n'est pas connecté, affichez un lien vers la page de connexion
        echo '<p><a href="login.php">Connectez-vous</a> pour accéder à vos fichiers.</p>';
    }
    ?>

    <p><a href="upload.php">Télécharger un fichier</a></p>
    <p><a href="logout.php">Déconnexion</a></p>
</body>
</html>
