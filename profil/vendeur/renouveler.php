<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<?php  
    session_start();
    $id = $_GET['id'];
    require '../../include/config.php';

    $date_today = date('Y-m-d H:i:s');

    $requete = $bdd->prepare('UPDATE utilisateurs SET date_inscription = ? WHERE id = ?');
    $requete->execute([$date_today,$id]);
    header("Location: profil.php");
?>