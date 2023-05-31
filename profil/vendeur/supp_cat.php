<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<?php
    require_once '../../include/config.php';
    $id = $_GET['id'];
    $sqlState = $bdd->prepare('DELETE FROM categorie WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    $requete = $bdd->prepare('DELETE FROM produit WHERE id_categorie=?');
    $produit_supp = $requete->execute([$id]);
    header("Location: categorie.php");
?>