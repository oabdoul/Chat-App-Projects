
// Vérification de mot de passe

let mdp1 = document.querySelector(".mdp1");
let mdp2 = document.querySelector(".mdp2");

mdp2.onkeyup = function(){
    error_message = document.querySelector(".error_message")
    if(mdp1.value != mdp2.value){
        error_message.innerText = "Les mots de passe ne sont pas conformes";
    }
    else{
        error_message.innerText ="";
    }
}


