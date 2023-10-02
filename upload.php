<!DOCTYPE html>
<html>
<head>
    <title>Téléchargement de fichiers</title>
</head>
<body>
    <h1>Téléchargement de fichiers</h1>

    <?php
    session_start(); // Démarrer la session

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php'); // Rediriger vers la page de connexion s'il n'est pas connecté
        exit();
    }

    // Gestion du téléchargement du fichier
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        $targetDirectory = 'uploads/';
        $fileName = basename($_FILES['file']['name']);
        $targetPath = $targetDirectory . $fileName;

        // Valider et limiter les types de fichiers (vous devrez ajouter des vérifications de sécurité ici)
        $allowedFileTypes = array('pdf', 'txt', 'jpg', 'png'); // Par exemple
        $fileExtension = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedFileTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
                echo '<p>Fichier téléchargé avec succès !</p>';

                // Enregistrez l'information du fichier dans la base de données (vous devrez personnaliser cette partie)
                require 'db.php'; // Incluez le fichier de connexion à la base de données
                $user_id = $_SESSION['user_id'];
                $sql = "INSERT INTO files (user_id, file_name) VALUES ($user_id, '$fileName')";
                mysqli_query($conn, $sql);
            } else {
                echo '<p>Une erreur s\'est produite lors du téléchargement du fichier.</p>';
            }
        } else {
            echo '<p>Le type de fichier n\'est pas autorisé.</p>';
        }
    }
    ?>

    <form method="POST" enctype="multipart/form-data">
        <label for="file">Sélectionnez un fichier :</label>
        <input type="file" id="file" name="file" required><br><br>

        <input type="submit" value="Télécharger">
    </form>

    <p><a href="index.php">Retour à la page d'accueil</a></p>
</body>
</html>
