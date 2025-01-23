
<?php
// Si l'utilisateur est connecté
if(isset($_SESSION['user'])){
    // Se connecter à la base de donnée
    include (__DIR__.'/connexion_bdd.php');

    // Requête SQL
    $sql = 'SELECT * FROM messages ORDER BY id_m DESC';
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $reponses = $requete->fetchAll();

   if(count($reponses) == 0){ // Nombre de messages
        // Il n'y'a pas de message
        echo 'Messagerie vide';
   }else{
        // Pour chaque message
        foreach ($reponses as $reponse) {
            // Si l'email correspond à l'email de l'utilisateur connecté
            if($reponse['email'] == $_SESSION['user']){ ?>
                <div class="message your_message">
                    <span>Vous</span>
                    <p><?=$reponse['msg']?></p>
                    <p class="date"><?=$reponse['date']?></p>
                </div>
            <?php }
            // Si l'email ne correspond pas à l'email de l'utiliseur connecté
            else{ ?>
                <div class="message others_message">
                    <span><?=$reponse['email']?></span>
                    <p><?=$reponse['msg']?></p>
                    <p class="date"><?=$reponse['date']?></p>
                </div>
            <?php }

        }
    }

}



?>

