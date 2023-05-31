<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des plats</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="index.html" class="back-link">Aller au site </a>

  <h1>Gestion des plats</h1>
  <div class="plats-container">
    <div class="plats-list">
      <h2>Liste des plats</h2>
      <ul id="platsList">
        <?php
        // Inclure le fichier de configuration de la base de données
        require_once 'config.php';

        // Requête SQL pour récupérer tous les plats
        $sql = "SELECT nomPlat,idPlat,description,calories,proteines,prix  FROM Plats";

        // Exécuter la requête SQL
        $result = mysqli_query($conn, $sql);

        // Vérifier si des plats ont été trouvés
        if ($result && mysqli_num_rows($result) > 0) {
          // Parcourir les résultats et générer les options
          while ($Plats = mysqli_fetch_assoc($result)) {
            echo '<li onclick="selectPlat(' . $Plats['idPlat'] . ')">' . $Plats['nomPlat'] . '</li>';
          }
        }

        // Fermer la connexion à la base de données
        
        ?>
      </ul>
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

          // Requête SQL pour sélectionner tous les plats
          $sql = "SELECT idPlat, nomPlat FROM Plats";

          // Exécuter la requête SQL
          $result = mysqli_query($conn, $sql);

          // Vérifier si des plats ont été trouvés
          if ($result && mysqli_num_rows($result) > 0) {
            // Afficher le formulaire de sélection des plats
            while ($row = mysqli_fetch_assoc($result)) {
              $platId = $row['idPlat'];
              $nomPlat = $row['nomPlat'];

              // Afficher chaque option du select avec l'ID et le nom du plat
              echo '<option value="' . $platId . '">' . $nomPlat . '</option>';
            }
          }

          // Fermer la connexion à la base de données
          mysqli_close($conn);
          ?>
        </select>
        

        <label for="nomPlat">Nom du plat :</label>
        <input type="text" id="nomPlat">

        <label for="caloPlat">Calories :</label>
        <input type="text" id="caloPlat">

        <label for="protPlat">Protéines :</label>
        <input type="text" id="protPlat" >

        <label for="prixPlat">Prix initial :</label>
        <input type="text" id="prixPlat">

        <label for="quantite">Quantité :</label>
        <input type="text" id="quantite">

        <label for="description">Description :</label>
        <textarea id="description"></textarea>

        <div id="imageContainer" ></div>

        <label for="image">Image :</label>
        <input type="file" id="image" accept="image/*">

        <button type="button" onclick="updatePlat()">Mettre à jour</button>
        <button type="button" onclick="deletePlat()">Supprimer</button>
      </form>

      <h2>Ajouter un plat</h2>
      <form id="addPlatForm" enctype="multipart/form-data">
        <label for="nomPlatAdd">Nom du plat :</label>
        <input type="text" id="nomPlatAdd" name="nomPlatAdd">

        <label for="caloPlatAdd">Calories :</label>
        <input type="text" id="caloPlatAdd" name="caloPlatAdd">

        <label for="protPlatAdd">Protéines :</label>
        <input type="text" id="protPlatAdd" name="protPlatAdd">

        <label for="prixPlatAdd">Prix initial :</label>
        <input type="text" id="prixPlatAdd" name="prixPlatAdd">


        <label for="descriptionAdd">Description :</label>
        <input type="text" id="descriptionAdd" name="descriptionAdd">

        <label for="imageAdd">Image :</label>
        <input type="file" id="imageAdd" name="imageAdd">

        <button type="button" onclick="addPlat()">Ajouter</button>
      </form>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
