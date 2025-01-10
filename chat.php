<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">
    <title>abdoul@gmail | Chat</title>
</head>
<body>
    <div class="chat">
        <div class="button-email">
            <span>abdoul@gmail.com</span>
            <a href="index.html" class="deconnexion_btn">Déconnexion</a>
        </div>
        <!-- Message -->
         <div class="message_box">
            <div class="message your_message">
                <span>Vous</span>
                <p>Salut, ça va?</p>
                <p class="date">25-01-02 20:22:30</p>
            </div>
            <div class="message others_message">
                <span>abc@gmail.com</span>
                <p>Hello, oui thanks</p>
                <p class="date">25-01-02 20:22:30</p>
            </div>
         </div>
        <!-- Fin message -->
         <form action="" method="" class="send_message">
            <textarea name="message" id="message" cols="30" rows="3" placeholder="Votre message"></textarea>
            <button>Envoyer</button>
         </form>
    </div>

    <script src="script.js"></script>
</body>

</html>