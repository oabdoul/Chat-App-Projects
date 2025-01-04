
// Vérification de mot de passe

let mdp1 = document.querySelector(".password1");
let mdp2 = document.querySelector(".password2");

mdp2.onkeyup = function(){
    error_message = document.querySelector(".error_message")
    if(mdp1.value != mdp2.value){
        error_message.innerText = "Les mots de passe ne sont pas conformes";
    }
    else{
        error_message.innerText ="";
    }
}


