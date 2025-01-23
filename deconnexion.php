<?php
// Demarrer la session
session_start();
// Si l'utilisateur n'est pas connecté
if(!isset($_SESSION['user'])){
    //Redirection vers la page de connexion
    header("Location: index.php");
}

// Detruire tous les sessions
session_destroy();

//Redirection vers la page de connexion
header("Location: index.php");

?>