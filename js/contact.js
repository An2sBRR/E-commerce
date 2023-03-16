//Verification du formulaire

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();

if (dd < 10) {
    dd = '0' + dd;
}

if (mm < 10) {
    mm = '0' + mm;
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("Contact").setAttribute("max", today);
document.getElementById("Contact").setAttribute("min", today);
document.getElementById("Naissance").setAttribute("max", today);


$("#Nom").on('click', function () {
    var valeur = $(this).val();
    if (valeur == '') {
        $("#Nom").removeClass('Nom');
        $("#Nom").addClass('encadreRouge');
    }
});

$("#Nom").on('keypress keyup keydown', function () {
    var valeur = $(this).val();
    var regex = /^[a-zA-ZÀ-ú\s]*$/g;
    if (regex.test(valeur) == false || valeur == '') {
        $("#Nom").removeClass('Nom');
        $("#Nom").addClass('encadreRouge');
        $('#Nom').removeClass('encadreVert');
    } else {
        $("#Nom").removeClass('Nom');
        $('#Nom').removeClass('encadreRouge');
        $("#Nom").addClass('encadreVert');
    }
});

$("#Prenom").on('click', function () {
    var valeur = $(this).val();
    if (valeur == '') {
        $("#Prenom").removeClass('Prenom');
        $("#Prenom").addClass('encadreRouge');
    }
});
$("#Prenom").on('keypress keyup keydown', function () {
    var valeur = $(this).val();
    var regex = /^[a-zA-ZÀ-ú\s]*$/g;
    if (regex.test(valeur) == false || valeur == '') {
        $("#Prenom").removeClass('Prenom');
        $("#Prenom").addClass('encadreRouge');
        $('#Prenom').removeClass('encadreVert');
    } else {
        $("#Prenom").removeClass('Prenom');
        $('#Prenom').removeClass('encadreRouge');
        $("#Prenom").addClass('encadreVert');
    }
});

$("#mail").on('click', function () {
    var valeur = $(this).val();
    if (valeur == '') {
        $("#mail").removeClass('mail');
        $("#mail").addClass('encadreRouge');
    }
});
$("#mail").on('keypress keyup keydown', function () {
    var valeur = $(this).val();
    var regexmail = /([\w-\.]+@[\w\.]+\.{1}[\w]+)/;
    if (regexmail.test(valeur) == false || valeur == '') {
        $('#mail').focus();
        $("#mail").removeClass('mail');
        $("#mail").addClass('encadreRouge');
        $('#mail').removeClass('encadreVert');
    } else {
        $("#mail").removeClass('mail');
        $('#mail').removeClass('encadreRouge');
        $("#mail").addClass('encadreVert');
    }
});

$("#genre").on('click', function () {
    var valeur = $(this).val();
    if (valeur == '') {
        $("#genre").removeClass('genre');
        $("#genre").addClass('encadreRouge');
    }
});

$("#Naissance").on('click change', function () {
    var valeur = $(this).val();
    if (valeur == '') {
        $("#Naissance").removeClass('Naissance');
        $("#Naissance").addClass('encadreRouge');
        $("#Naissance").removeClass('encadreVert');
    } else {
        $("#Naissance").removeClass('Naissance');
        $("#Naissance").addClass('encadreVert');
        $("#Naissance").removeClass('encadrerouge');
    }
});

$("#Contact").on('click change', function () {
    var valeur = $(this).val();
    if (!valeur) {
        $("#Contact").removeClass('Contact');
        $("#Contact").addClass('encadreRouge');
        $("#Contact").removeClass('encadreVert');
    } else {
        $("#Contact").removeClass('Contact');
        $("#Contact").addClass('encadreVert');
        $("#Contact").removeClass('encadreRouge');
    }
});

$("#type_util").on('click', function () {
    var valeur = $(this).val();
    if (valeur == '') {
        $("#type_util").removeClass('type_util');
        $("#type_util").addClass('encadreRouge');
    }
});

$("#sujet").on('click', function () {
    var valeur = $(this).val();
    if (valeur == '') {
        $("#sujet").removeClass('sujet');
        $("#sujet").addClass('encadreRouge');
    }
});
$("#sujet").on('keypress keyup keydown', function () {
    var valeur = $(this).val();
    var regex = /^[a-zA-ZÀ-ú\s]*$/g;
    if (regex.test(valeur) == false || valeur == '') {
        $('#sujet').focus();
        $("#sujet").removeClass('sujet');
        $("#sujet").addClass('encadreRouge');
        $('#sujet').removeClass('encadreVert');
    } else {
        $("#sujet").removeClass('sujet');
        $('#sujet').removeClass('encadreRouge');
        $("#sujet").addClass('encadreVert');
    }
});

$("#contenu").on('click', function () {
    var valeur = $(this).val();
    if (valeur == '') {
        $("#contenu").removeClass('contenu');
        $("#contenu").addClass('encadreRouge');
    }
});
$("#contenu").on('keypress keyup keydown', function () {
    var valeur = $(this).val();
    var regex = /^[a-zA-ZÀ-ú\s]*$/g;
    if (regex.test(valeur) == false || valeur == '') {
        $('#contenu').focus();
        $("#contenu").removeClass('contenu');
        $("#contenu").addClass('encadreRouge');
        $('#contenu').removeClass('encadreVert');
    } else {
        $("#contenu").removeClass('contenu');
        $('#contenu').removeClass('encadreRouge');
        $("#contenu").addClass('encadreVert');
    }
});

$(document).ready(function(){
    if($("#succes").text().length != 0){
        setTimeout(function (){document.location.href="../index.php";}, 4000);
    }
});
