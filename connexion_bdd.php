<?php 
// Variables pour connexion bdd
$servername = "localhost";
$username = "root";
$password = "";

// Gestion d'erreur de connexion à la base de données
try{
    // Connexion à la base de données
    $bdd = new PDO(
        'mysql:host=localhost;dbname=chat_project;charset=utf8', $username, $password);
    // Se mettre en ERRMODE pour donner le type erreur
    // Spéficier le type d'erreur ERRMODE_EXCEPTION
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion reussie";
}
// Récupération de l'erreur dans la variable e
//Afficher le message d'erreur
catch(PDOException $e){
    echo "Erreur:".$e->getMessage();
}

?>