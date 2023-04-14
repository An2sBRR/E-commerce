
<?php
include_once '../../include/config.php'; 
$id = $_GET['id'];
$etat = $_GET['etat'];
$sqlState = $bdd->prepare('UPDATE commande SET commande_livre = ? WHERE id = ?');
$sqlState->execute([$etat, $id]);
header('location: afficher_com_lv.php?id=' . $id);