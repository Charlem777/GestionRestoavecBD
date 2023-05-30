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

// Récupérer l'ID du plat à supprimer à partir des paramètres POST
if (isset($_POST['idPlat'])) {
    $platId = $_POST['idPlat'];

    // Requête SQL pour supprimer le plat sélectionné
    $sql = "DELETE FROM Plats WHERE idPlat = '$platId'";

    if ($conn->query($sql) === TRUE) {
        echo "Plat supprimé avec succès";
    } else {
        echo "Erreur lors de la suppression du plat: " . $conn->error;
    }
}

$conn->close();
?>
