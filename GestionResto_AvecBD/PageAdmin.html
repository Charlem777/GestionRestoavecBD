<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des plats</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Gestion des plats</h1>

  <div class="plats-container">
    <div class="plats-list">
      <h2>Liste des plats</h2>
      <ul id="platsList"></ul>
    </div>

    <div class="plats-details">
      <h2>Détails du plat</h2>
      <form id="platForm">
        <label for="platSelect">Sélectionnez un plat :</label>
        <select id="platSelect" onchange="loadPlatDetails()">
          <option value="">-- Sélectionnez un plat --</option>
          <?php
// Inclure le fichier de configuration de la base de données
require_once 'config.php';

// Requête SQL pour récupérer tous les plats
$sql = "SELECT * FROM plat";

// Exécuter la requête SQL
$result = mysqli_query($conn, $sql);

// Vérifier si des plats ont été trouvés
if ($result && mysqli_num_rows($result) > 0) {
    // Parcourir les résultats et générer les options
    while ($plat = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $plat['idPlat'] . '">' . $plat['nomPlat'] . '</option>';
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>

        </select>

        <label for="nomPlat">Nom du plat :</label>
        <input type="text" id="nomPlat" readonly>

        <label for="caloPlat">Calories :</label>
        <input type="text" id="caloPlat" readonly>

        <label for="protPlat">Protéines :</label>
        <input type="text" id="protPlat" readonly>

        <label for="prixPlat">Prix initial :</label>
        <input type="text" id="prixPlat">

        <label for="prixFinal">Prix final :</label>
        <input type="text" id="prixFinal">

        <label for="quantite">Quantité :</label>
        <input type="text" id="quantite">

        <button type="button" onclick="updatePlat()">Mettre à jour</button>
        <button type="button" onclick="deletePlat()">Supprimer</button>
      </form>

      <h2>Ajouter un plat</h2>
      <form id="addPlatForm">
        <label for="nomPlatAdd">Nom du plat :</label>
        <input type="text" id="nomPlatAdd">

        <label for="caloPlatAdd">Calories :</label>
        <input type="text" id="caloPlatAdd">

        <label for="protPlatAdd">Protéines :</label>
        <input type="text" id="protPlatAdd">

        <label for="prixPlatAdd">Prix initial :</label>
        <input type="text" id="prixPlatAdd">

        <label for="prixFinalAdd">Prix final :</label>
        <input type="text" id="prixFinalAdd">

        <label for="quantiteAdd">Quantité :</label>
        <input type="text" id="quantiteAdd">

        <button type="button" onclick="addPlat()">Ajouter</button>
      </form>
    </div>
  </div>

  <script src="script.js"> </script>
</body>
</html>
