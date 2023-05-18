<?php
    session_start();
    
    if($_SESSION['statut'] != "client"){
        header("Location: ../index.php");
    }

    require_once '../include/config.php';
    $req = "UPDATE utilisateurs SET abonnement = 0 WHERE token='".$_SESSION['user']."'";
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    header("Location: ../index.php");
?>