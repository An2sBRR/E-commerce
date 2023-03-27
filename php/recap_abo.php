<?php
    session_start();
    if( !isset($_SESSION['page_abo']) || $_SESSION['page_abo'] != true){
        header('Location: abonnement.php');
    }
    if(getAbonnement() == 1){
        header('Location: abonnement.php');
    }
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
        <?php 
        function getAbonnement(){
            require '../include/config.php';
            if(isset($_SESSION['user'])){
                $req = "SELECT abonnement FROM utilisateurs WHERE token='".$_SESSION['user']."'";
                $stmt = $bdd->prepare($req);
                $stmt->execute();
                $data = $stmt->fetchColumn();
                return $data;
            }
        }
        ?>
    </body>
</html>
