<?php
//Ce code PHP est utilisé pour supprimer un utilisateur d'une base de données.
    require_once '../../include/config.php';
    $id = $_GET['id'];
    $sqlState = $bdd->prepare('DELETE FROM utilisateurs WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    header('location: vendeur.php');
?>