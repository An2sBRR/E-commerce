<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/abonnement.css">
    <title>Notre Abonnement</title>
</head>

<body>
    <div class="description">
        <p class="head">Notre abonnement</h1>
        <p class="texte">Venez découvrir notre nouvel abonnement qui vous récompensera de votre fidélité avec de nombreux avantages ! </p>
    </div>
    <div class="abonnement">
        <ul>
            <li class="titre">Abonnement Premium</li>
            <li class="couleur">9,99€ par an</li>
            <li>Accès à une réduction de 10% sur votre commande</li>
            <li>Accès anticipé pour nos nouvelles sorties</li>
            <li>Livraison offerte sans minimum d'achat</li>
            <li>Accès annuel</li>
            <li class="couleur"><button class="button" type="button" onclick="location.href='recap_abo.php'">M'abonner</button></li>
        </ul>
    </div>
</body>
