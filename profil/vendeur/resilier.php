<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<?php
    session_start();
    $id = $_GET['id'];
    require '../../include/config.php';
    $requete = $bdd->prepare('DELETE FROM produit WHERE id_utilisateurs = ?');
    $requete->execute([$id]);

    $requete = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ?');
    $requete->execute([$id]);

    session_destroy();
    header("Location: ../../index.php")
?>