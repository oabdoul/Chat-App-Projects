<?php 
// Demarrer la session
session_start();

// Si l'utilisateur clique sur le boutton valider
if(isset($_POST['submit'])){
    // Vérifier les informations saisi par l'utilisateur
    if(isset($_POST['email']) && 
        isset($_POST['mdp1']) && 
        isset($_POST['mdp2']))
    {
        // Vérifier si les mots de passe sont identiques
        if($_POST['mdp1'] != $_POST['mdp2']){
            $error_message = "Les mots de passe ne sont pas identiques.";
        }else{
            $email = $_POST['email'];
            $mdp = $_POST['mdp1'];
        
            // Se connecter à la base de donnée
            include (__DIR__.'/connexion_bdd.php');
            // Vérifier si l'adresse email existe déja
            $sql = "SELECT * FROM utilisateurs WHERE email='$email'";
            $requete = $bdd->prepare($sql);
            $requete->execute();
            $responses = $requete->fetch();
            // Si mot de passe ou email correct
            if(isset($responses['id'])){
                $error_message = "L'adresse email existe déjà";
            }else{
                // Si email non existant Ajouter dans la base de données
                $sql = "INSERT INTO utilisateurs(email,mdp) VALUES(:email, :mdp)";
                $requete = $bdd->prepare($sql);
                $requete->execute([
                    'email'=> $email,
                    'mdp'=> $mdp,
                ]);
                $_SESSION['message'] = "<p class='success_message'>Votre compte a été crée avec succès.</p>";
                header("Location: index.php");
            }
        }
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">
    <title>Inscription | Chat</title>
</head>
<body>
    <form action="" method="POST" class="register_form">
        <h1>Connexion</h1>
        <p class="error_message"></p>
        <?php if(isset($error_message)){ ?>
            <p class="error_message"> <?php echo $error_message; ?> </p>
        <?php } ?>
        <div>
            <label for="email">Adresse Mail</label>
            <input type="email" name="email" id="email" placeholder="exemple@exemple.com" required>
        </div>
        <div>
            <label for="mdp1">Mot de passe</label>
            <input type="password" name="mdp1" class="mdp1" required>
        </div>
        <div>
            <label for="mdp2">Confirmer votre mot de passe</label>
            <input type="password" name="mdp2" class="mdp2" required>
        </div>
        <button type="submit" name="submit">Inscription</button>
        <p class="link">Vous avez un compte ? <a href="index.php">Se connecter</a></p>
    </form>

    <script src="script.js"></script>
</body>

</html>