<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<?php
    require_once '../include/config.php';
    $id = $_GET['id'];
    $requete = $bdd->prepare('SELECT image FROM produit WHERE id=?');
    $requete->execute([$id]);
    $image = $requete->fetchColumn();

    $sqlState = $bdd->prepare('DELETE FROM produit WHERE id=?');
    $supprime = $sqlState->execute([$id]);

    unlink($image); //supprime l'image 
    

    if($_SESSION['statut'] === "vendeur"){
        header('location: ./vendeur/produit.php');
    }else{
        header('location: ./admin/produit_ad.php');
    }
?>
