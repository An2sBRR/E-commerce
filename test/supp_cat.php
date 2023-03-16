<?php
    require_once '../include/config.php';
    $id = $_GET['id'];
    $sqlState = $bdd->prepare('DELETE FROM categorie WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    header('location: categorie.php');
?>