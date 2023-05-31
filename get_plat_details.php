<?php
// Inclure le fichier de configuration de la base de données
require_once 'config.php';

// Vérifier si l'ID du plat est passé en paramètre
if (isset($_GET['id'])) {
    $platId = $_GET['id'];

  // Requête SQL pour récupérer les détails du plat en fonction de l'ID
  $sql = "SELECT idPlat,nomPlat,description,calories,proteines,prix,image FROM Plats WHERE idPlat = $platId";

  // Exécuter la requête SQL
  $result = mysqli_query($conn, $sql);

  // Vérifier si le plat a été trouvé
  if ($result && mysqli_num_rows($result) > 0) {
    // Récupérer les détails du plat dans un tableau associatif
    $plat = mysqli_fetch_assoc($result);

    // Convertir le tableau associatif en format JSON
    $jsonPlat = json_encode($plat);

    // Envoyer la réponse JSON
    header('Content-Type: application/json');
echo json_encode($plat);

  }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
