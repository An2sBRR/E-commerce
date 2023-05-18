<?php
    session_start();
    require '../include/config.php';
    
    function getAbonnement(){
        
        if(isset($_SESSION['user'])){
            require '../include/config.php';
            $requete = "SELECT abonnement FROM utilisateurs WHERE token='".$_SESSION['user']."'";
            $result = $bdd->prepare($requete);
            $result->execute();
            $data = $result->fetchColumn();
            return $data;
        }else return 2; //il n'est pas connecte
    }

    if($_SESSION['statut'] != "client" || getAbonnement() != 1){
            header("Location: ../index.php");
        }
    $req = "UPDATE utilisateurs SET abonnement = 0 WHERE token='".$_SESSION['user']."'";
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    header("Location: ../index.php");
?>