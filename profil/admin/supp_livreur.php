<?php
    require_once '../../include/config.php';
    $id = $_GET['id'];
    $sqlState = $bdd->prepare('DELETE FROM employes WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    header('location: vendeur.php');
?>