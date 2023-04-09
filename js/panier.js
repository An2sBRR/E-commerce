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
