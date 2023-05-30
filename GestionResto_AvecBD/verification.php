<?php
// Récupérer les informations du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Connexion à la base de données
$servername = "localhost";
$username_db = "root"; // Remplacez par votre nom d'utilisateur
$password_db = ""; // Remplacez par votre mot de passe
$dbname = "gestionresto";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Échapper les valeurs pour éviter les injections SQL (optionnel mais recommandé)
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

// Requête SQL pour vérifier l'authentification
$sql = "SELECT * FROM access WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Authentification réussie
    $row = $result->fetch_assoc();
    $can_modify_plats = $row['can_modify_plats'];

    if ($can_modify_plats) {
        // L'utilisateur a l'autorisation de modifier les plats
        // Effectuer les actions nécessaires, par exemple, redirection vers une page d'administration
        header("Location: Pageadmin.html");
        exit();
    } else {
        // L'utilisateur n'a pas l'autorisation de modifier les plats
        // Effectuer les actions nécessaires, par exemple, afficher un message d'erreur
        echo "Vous n'avez pas l'autorisation de modifier les plats.";
    }
} else {
    // Authentification échouée
    // Effectuer les actions nécessaires, par exemple, afficher un message d'erreur
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
