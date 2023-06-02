<?php
    session_star();
//Ce code PHP est utilisé pour supprimer un utilisateur d'une base de données.
    require_once '../../include/config.php';
    $id = $_GET['id'];
    $requete = $bdd->prepare('DELETE FROM produit WHERE id_utilisateurs = ?');
    $requete->execute([$id]);

    $requete = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ?');
    $requete->execute([$id]);

    header("Location: vendeur.php");
?>
