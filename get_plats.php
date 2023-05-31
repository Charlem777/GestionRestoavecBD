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

// Requête SQL pour récupérer tous les plats
$sql = "SELECT * FROM Plats";
$result = $conn->query($sql);

$plats = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $plats[] = $row;
    }
}

// Renvoyer les données au format JSON
echo json_encode($plats);

$conn->close();
?>
