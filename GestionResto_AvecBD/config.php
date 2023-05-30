<?php
// Paramètres de connexion à la base de données
$servername = "localhost";  // Remplacez par l'adresse de votre serveur MySQL
$username = "root";  // Remplacez par votre nom d'utilisateur MySQL
$password = "";  // Remplacez par votre mot de passe MySQL
$dbname = "gestionresto";  // Remplacez par le nom de votre base de données
// Informations de connexion à la base de données
define('DB_HOST', $servername);
define('DB_USER', $username);
define('DB_PASSWORD', $password);
define('DB_NAME', $dbname);

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}
?>
