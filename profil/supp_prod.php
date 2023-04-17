<?php
    require_once '../include/config.php';
    $id = $_GET['id'];
    $sqlState = $bdd->prepare('DELETE FROM produit WHERE id=?');
    $supprime = $sqlState->execute([$id]);

    if($_SESSION['statut'] === "vendeur"){
        header('location: ./vendeur/produit.php');
    }else{
        header('location: ./admin/produit_ad.php');
    }
?>
