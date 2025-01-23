<!-- Page de connexion -->

<?php

// Demarrer la session
session_start();

// Si le formulaire envoyer
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // se connecter à la base de données
    include (__DIR__.'/connexion_bdd.php');

    // Recherche dans la base de données

    $sql = "SELECT * FROM utilisateurs WHERE email='$email' AND mdp='$mdp'";
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $responses = $requete->fetch();
    // Si mot de passe ou email correct
    if(isset($responses['id'])){
        $_SESSION['user'] = $email;
        // Redirection vers la page de chat
        header("Location: chat.php");
        // Destruction de la variable du message d'inscription
        //unset($_SESSION['message']);
    // Si mot de passe incorrect
    }else{
        $error_message = 'Adresse email ou mot de passe incorrect.';
    };

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion | Chat</title>
</head>
<body>
    <form action="" method="POST" class="register_form">
        <h1>Connexion</h1>
        <!-- Message d'erreur -->
        <?php if(isset($error_message)) {?>
        <p class="error_message"> <?php echo $error_message;?></p>
        <?php } ?>
        <!-- Message d'inscription reussite -->
        <?php if(isset($_SESSION['message'])) {?>
        <?php echo $_SESSION['message'];?>
        <?php } ?>

        <div>
            <label for="email">Adresse Mail</label>
            <input type="email" name="email" id="email" placeholder="exemple@exemple.com" required>
        </div>
        <div>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" required>
        </div>
        <button type="submit" name="submit">Connexion</button>
        <p class="link">Vous n'avez pas de compte ? <a href="inscription.php">Créer un compte</a></p>
    </form>
    <script src="script.js"></script>
</body>

</html>