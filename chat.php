<?php
// Demarrer la session
session_start();
// Si l'utilisateur n'est pas connecté
if(!isset($_SESSION['user'])){
    //Redirection vers la page de connexion
    header("Location: index.php");
}else{
    $user = $_SESSION['user'];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">
    <title><?= $user ?> | Chat</title>
</head>
<body>
    <div class="chat">
        <div class="button-email">
            <span><?= $user ?></span>
            <a href="deconnexion.php" class="deconnexion_btn">Déconnexion</a>
        </div>
        <!-- Message -->
        <div class="message_box">
            <?php include (__DIR__.'/messages.php'); ?>
        </div>
        <!-- Fin message -->

        <!-- Traitement du formulaire -->

        <?php
        // Si formulaire envoyé
        if(isset($_POST['submit'])){
            // Vérifier que le message existe et n'est pas vide
            if(isset($_POST['message']) && !empty($_POST['message']))
            {
                $message = $_POST['message'];
                echo $message;
                // Se connecter à la base de données
                include (__DIR__.'/connexion_bdd.php');

                // Ajouter les message dans la base de données
                $sql = "INSERT INTO messages VALUES(NULL, :email, :msg, NOW())";
                $requete = $bdd->prepare($sql);
                $requete->execute([
                    'email'=> $user,
                    'msg'=> $message,
                ]);
                // Redirection vers la page de chat
                header("Location:chat.php");
            }else{
                echo "Aucun message envoyé !!😅";
            }
        }
    

        ?>
         <form action="" method="POST" class="send_message">
            <textarea name="message" id="message" cols="30" rows="3" placeholder="Votre message"></textarea>
            <button type="submit" name="submit">Envoyer</button>
         </form>
    </div>

    <script src="script.js"></script>
</body>

</html>