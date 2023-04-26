function supprimer_ligne(id_produit){
    var id = parseInt(id_produit);
    var choix =0; //0 pour supprimer
    $.ajax({
        type: "GET",
        url: "modifier_panier.php",
        data: {
            "id": id,
            "choix": choix
        },
        dataType: "json",
        success: function (response) {
            if (response.reponse == 'ok') {
                location.reload();
            }
        }
    });
}

function modifier_quantite(id, quantite){
    var choix = 1; //1 pour modifier la quantité
    $.ajax({
        type: "GET",
        url: "modifier_panier.php",
        data: {
            "id": id,
            "choix": choix,
            "quantite": quantite
        },
        dataType: "json",
        success: function (response) {
            if (response.reponse == 'ok') {
                location.reload();
            }
        }
    });
}

//permet de calculer le total avec la livraison 
var livraison = $("#livraison").val();
var total;
if(!$("#abonne").length){ //si la personne n'est pas abonné on va modifier une balise pour afficher le total avec la livraison
    switch (livraison) {
        case "standard":
            livraison = 5;
            break;
        case "relais":
            livraison = 2;
            break;
        case "express" :
            livraison = 8;
            break;
        default:
            livraison = null;
            break;
    }
    total = parseFloat($("#total").text());
    var result = total+livraison;
    result = Math.round(result * Math.pow(10,2)) / Math.pow(10,2);
    $(".total_final").text("Total avec livraison : "+result+" €");
}


$("#livraison").change(function(){  //on refait la même chose quand la personne choisit une autre livraison
    livraison = $(this).val();
    if(!$("#abonne").length){
        switch (livraison) {
            case "standard":
                livraison = 5;
                break;
            case "relais":
                livraison = 2;
                break;
            case "express" :
                livraison = 8;
                break;
            default:
                livraison = null;
                break;
        }
        total = parseFloat($("#total").text());
        var result = total+livraison;
        result = Math.round(result * Math.pow(10,2)) / Math.pow(10,2);
        $(".total_final").text("Total avec livraison : "+result+" €");
    }
});

if($("#reussite").length){
    document.getElementById("tout").innerHTML = "<h4> Votre commande est validée !<br> Vous pouvez la consulter dans votre page profil. Merci pour votre confiance !</h4>";
    setTimeout(function (){document.location.href="../index.php";}, 7000);
}
