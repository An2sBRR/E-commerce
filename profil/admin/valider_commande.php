<?php
    // Démarrage de la session
    session_start();

    // Vérification si l'utilisateur est connecté et s'il est administrateur
    // Si ce n'est pas le cas, redirection vers la page d'accueil
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "admin"){
        header('Location: ../../index.php');
    }

    // Inclusion de la configuration de la base de données
    include_once '../../include/config.php'; 

    // Récupération de l'ID et de l'état de la commande depuis l'URL
    $id = $_GET['id'];
    $etat = $_GET['etat'];

    // Préparation de la requête SQL pour mettre à jour l'état de la commande
    $sqlState = $bdd->prepare('UPDATE commande SET valide = ? WHERE id = ?');
    
    // Exécution de la requête SQL avec l'état et l'ID de la commande
    $sqlState->execute([$etat, $id]);

    // Redirection vers la page d'affichage de la commande avec l'ID de la commande
    header('location: afficher_commande.php?id=' . $id);
?>
