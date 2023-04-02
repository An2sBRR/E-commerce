<?php
session_start();
    require '../include/config.php';
    $req = "UPDATE utilisateurs SET abonnement = 1 WHERE token='".$_SESSION['user']."'";
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    echo "Envoyer!";
?>
