<?php
    session_start();
    $_SESSION['connecte'] = 1; // a modifier quand on aura le truc pour vérifier si la personne est bien connecte
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/recap_abo.css">
        <title>Récapitulatif</title>
    </head>

    <body>
        <div class="tout" id="tout">
            <ul>
                <li class="titre">Votre récapitulatif</li>
                <li class="couleur">Abonnement Premium :</li>
                <li>Valide toute une année</li>
                <li>Pour seulement 9.99€</li>
                <li class="couleur">
                    <button class="annuler" id="annuler" onclick="location.href='../index.php'">Annuler</button>
                    <button class="valider" id="valider">Payer</button>
                </li>
                <div class="erreur" id="erreur"></div>
            </ul>
        </div>
        <script type="text/javascript" src="../js/recap_abo.js"></script>
    </body>
</html>