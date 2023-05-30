<?php
// Inclure le fichier de configuration de la base de données
require_once 'config.php';

// Vérifier si l'ID du plat et les données sont passés en paramètres
if (isset($_POST['id']) && isset($_POST['prix']) && isset($_POST['description']) && isset($_FILES['image']) && isset($_POST['calories']) && isset($_POST['proteines'])) {
  $platId = $_POST['id'];
  $nouveauPrix = $_POST['prix'];
  $nouvelleDescription = $_POST['description'];
  $nouvellesCalories = $_POST['calories'];
  $nouvellesProteines = $_POST['proteines'];

  // Récupérer les informations de l'image
  $image = $_FILES['image'];
  $imageName = $image['name'];
  $imageTmpPath = $image['tmp_name'];
  $imageSize = $image['size'];

  // Vérifier si une nouvelle image a été téléchargée
  if ($imageName !== '') {
    // Déplacer l'image téléchargée vers le dossier des images
    $imagePath = 'uploads/' . $imageName;
    move_uploaded_file($imageTmpPath, $imagePath);
  }

  // Requête SQL pour mettre à jour les données du plat
  $sql = "UPDATE Plats SET prix = '$nouveauPrix', description = '$nouvelleDescription', calories = '$nouvellesCalories', proteines = '$nouvellesProteines'";

  // Vérifier si une nouvelle image a été téléchargée
  if ($imageName !== '') {
    $sql .= ", image = '$imageName'";
  }

  $sql .= " WHERE idPlat = $platId";

  // Exécuter la requête SQL
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "Le plat a été mis à jour avec succès.";
  } else {
    echo "Erreur lors de la mise à jour du plat : " . mysqli_error($conn);
  }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
