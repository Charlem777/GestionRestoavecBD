<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestionresto";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer les données du formulaire POST
$nomPlat = $_POST['nomPlatAdd'];
$caloPlat = $_POST['caloPlatAdd'];
$protPlat = $_POST['protPlatAdd'];
$prixPlat = $_POST['prixPlatAdd'];
$description = $_POST['descriptionAdd'];
$image = $_FILES['imageAdd'];

// Chemin de stockage des images
$uploadDir = "C:/xampp/htdocs/";

// Nom de fichier unique pour éviter les conflits
$imageName = uniqid() . "_" . $image['name'];

// Chemin complet de l'image
$imagePath = $uploadDir . $imageName;

// Déplacer l'image vers le répertoire de stockage
if (move_uploaded_file($image['tmp_name'], $imagePath)) {
    // Requête SQL pour ajouter le plat à la base de données
    $sql = "INSERT INTO Plats (nomPlat, description, calories, proteines, prix, image) VALUES ('$nomPlat','$protPlat','$description','$caloPlat','$prixPlat','$imageName')";

    if ($conn->query($sql) === TRUE) {
        echo "Plat ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout du plat: " . $conn->error;
    }
} else {
    echo "Erreur lors de l'upload de l'image";
}

$conn->close();
?>
