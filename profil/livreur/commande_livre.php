<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "livreur"){
        header('Location: ../../index.php');
    }
?>
<!------------cette page permet de validé les commandes, ce qui permet de voir l'acheminement coté client--------------------->

<?php
//on inclus la bdd
include_once '../../include/config.php'; 
//on prends l'id et l'etat de la commande
$id = $_GET['id'];
$etat = $_GET['etat'];
//on met la table commande a jour ce qui permet de modifier son etat 
$sqlState = $bdd->prepare('UPDATE commande SET commande_livre = ? WHERE id = ?');
$sqlState->execute([$etat, $id]);
header('location: afficher_com_lv.php?id=' . $id);