<?php
    session_start();
    $id = $_GET['id'];
    if(isset($_GET['quantite'])){
        $quantite = $_GET['quantite'];
    }else{
        $quantite = 1;
    }
    if($quantite !=0){
         if(!isset($_SESSION['panier'])){
        $panier = array();
        $panier[$id] = $quantite;
        $_SESSION['panier'] = $panier;
        }else{
            if (array_key_exists($id, $_SESSION['panier'])) {
                $_SESSION['panier'][$id] += $quantite;
            } else {
                $_SESSION['panier'][$id] = $quantite;
            }
        }
    }
    $reponse="ajouter";
    echo json_encode(['reponse' => $reponse]);
?>
