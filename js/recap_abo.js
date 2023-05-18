document.addEventListener("DOMContentLoaded", ()=>{
    document.getElementById('valider').addEventListener("click", function(){
        var xhr = new XMLHttpRequest();
       
        xhr.onreadystatechange = function(){
            if(xhr.status == 200 && xhr.readyState == 4){
                if(this.responseText == "invalide"){
                    document.getElementById('erreur').innerHTML = "Vous n'êtes pas connecté, veuillez vous connecter <a href=\"/php/connexion.php\">ici</a>";
                }else if(this.responseText == "valide"){
                    var xhr2 = new XMLHttpRequest();
                    xhr2.onreadystatechange = function(){
                        if(xhr2.status == 200 && xhr2.readyState == 4){
                            if(this.responseText=="Envoyer!"){
                                document.getElementById("tout").innerHTML = "Votre abonnement a bien été pris en compte ! Merci pour votre confiance.";
                                setTimeout(function (){document.location.href="../index.php";}, 4000);
                            }
                        }
                    };
                    xhr2.open("GET", '/php/active_abo.php', true); 
                    xhr2.send(null);
                }else{
                    document.getElementById('erreur').innerHTML = "Vous êtes "+this.responseText+", vous ne pouvez pas vous abonner."
                }
            }
        };
        xhr.open("GET", '/php/verif_abo_utilisateur.php', true); 
        xhr.send(null);
    });
});
