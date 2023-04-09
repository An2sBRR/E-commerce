<?php
    session_start();
    $id = $_GET['id'];
    $quantite = $_GET['quantite'];
    if(is_null($quantite)){
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