<?php 
    session_start();

    if(isset($_SESSION['user'])){
        if($_SESSION['statut'] == "client"){
            if(getAbonnement() == 1){
                echo "abonné(e)";
            }else
                echo "valide";
        }else{
            echo $_SESSION['statut'];
        }
    }else{
        echo "invalide";
    }

    function getAbonnement(){
        require '../include/config.php';
            if(isset($_SESSION['user'])){
                $req = "SELECT abonnement FROM utilisateurs WHERE token='".$_SESSION['user']."'";
                $stmt = $bdd->prepare($req);
                $stmt->execute();
                $data = $stmt->fetchColumn();
                return $data;
            }
    }
?>