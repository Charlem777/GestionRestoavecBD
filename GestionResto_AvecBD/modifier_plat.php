<?php
// Inclure le fichier de configuration de la base de données
require_once 'config.php';

// Vérifier si le formulaire de modification a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'ID du plat à modifier
    $idPlat = $_POST['idPlat'];

    // Récupérer les nouvelles données du plat depuis le formulaire
    $nomPlat = $_POST['nomPlat'];
    $caloPlat = $_POST['caloPlat'];
    $protPlat = $_POST['protPlat'];
    $prixPlat = $_POST['prixPlat'];

    // Requête SQL pour mettre à jour le plat dans la table
    $sql = "UPDATE plat SET nomPlat='$nomPlat', caloPlat='$caloPlat', protPlat='$protPlat', prixPlat='$prixPlat' WHERE idPlat='$idPlat'";

    if (mysqli_query($conn, $sql)) {
        // Le plat a été modifié avec succès
        echo 'Le plat a été modifié avec succès.';
    } else {
        // Une erreur s'est produite lors de la modification du plat
        echo 'Une erreur s\'est produite lors de la modification du plat : ' . mysqli_error($conn);
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
