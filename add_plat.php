<?php
require_once 'config.php';

// Code pour gérer l'upload de l'image et obtenir son chemin
$imagePath = '<C:>xampp/htdocs/image';

if ($_FILES['imagePlat']['error'] === UPLOAD_ERR_OK) {
  $imageTmpPath = $_FILES['imagePlat']['tmp_name'];
  $imageName = $_FILES['imagePlat']['name'];
  $imagePath = 'uploads/' . $imageName; 

  if (move_uploaded_file($imageTmpPath, $imagePath)) {
    echo 'Image uploadée avec succès.';
  } else {
    echo 'Erreur lors de l\'upload de l\'image.';
  }
} else {
  echo 'Erreur lors de l\'upload de l\'image : ' . $_FILES['imagePlat']['error'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nomPlat = $_POST['nomPlat'];
  $caloPlat = $_POST['caloPlat'];
  $protPlat = $_POST['protPlat'];
  $prixPlat = $_POST['prixPlat'];
  $quantite = $_POST['quantite'];
  $description = $_POST['description'];
  
  // Code pour gérer l'upload de l'image et obtenir son chemin
  
  $sql = "INSERT INTO plats (nomPlat, caloPlat, protPlat, prixPlat, quantite, description, image) VALUES ('$nomPlat', $caloPlat, $protPlat, $prixPlat, $quantite, '$description', '$imagePath')";
  
  if (mysqli_query($conn, $sql)) {
    echo 'Plat ajouté avec succès.';
  } else {
    echo 'Erreur lors de l\'ajout du plat : ' . mysqli_error($conn);
  }
  
  mysqli_close($conn);
}
?>
