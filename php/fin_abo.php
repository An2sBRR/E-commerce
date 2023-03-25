<?php
    session_start();
    require_once '../include/config.php';
    $req = "UPDATE utilisateurs SET abonnement = 0 WHERE token='".$_SESSION['user']."'";
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    header("Location: ../index.php");
?>