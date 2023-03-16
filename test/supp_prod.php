<?php
    require_once '../include/config.php';
    $id = $_GET['id'];
    $sqlState = $bdd->prepare('DELETE FROM produit WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    header('location: produit.php');
?>