var counter = 2;
setInterval(function()
{
    if(!!document.getElementById('radio' + counter)){
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if(counter > 4)
        {
            counter = 1;
        }
    }
}, 5000);

function ZOOM(x){
    window.location="http://localhost:8000/index.php?zoom="+x;
}

function handleKeyPress(event) {
    if (event.keyCode === 13) {
    // Appel de la fonction souhaitée
        recherche();
    }
}


function recherche() {
    // Récupération de la valeur de l'input
    var searchTerm = document.getElementById("recherche").value;

    // Création du lien de recherche
    var searchLink = "?recherche="+searchTerm.toLowerCase().replace(/\s+/g, '-');

    // Redirection vers la page de recherche
    window.location.href = searchLink;
}


function ajouter_panier(id_produit){
    var id = parseInt(id_produit);
    var quantite = document.getElementById("quantite").value;
    $.ajax({
        type: "GET",
        url: "php/ajouter_panier.php",
        data: {
            "id": id,
            "quantite": quantite
        },
        dataType: "json",
        success: function (response) {
            if (response.reponse == 'ajouter') {
                location.reload();
            }
        }
    });
}

function ajouter_panier_categorie(id_produit){
    var id = parseInt(id_produit);
    $.ajax({
        type: "GET",
        url: "php/ajouter_panier.php",
        data: {
            "id": id
        },
        dataType: "json",
        success: function (response) {
            if (response.reponse == 'ajouter') {
                location.reload();
            }
        }
    });
}