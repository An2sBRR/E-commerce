<?php
    session_start();
    $id = $_GET['id'];
    $choix = $_GET['choix'];
    if(isset($_GET['quantite'])){
        $quantite = $_GET['quantite'];
    }
    if($choix == 0){
        unset($_SESSION['panier'][$id]);
    }else if($choix == 1){
        if($quantite == 0){
            unset($_SESSION['panier'][$id]);
        }else{
            $_SESSION['panier'][$id]= $quantite;
        }
    }
    $reponse="ok";
    echo json_encode(['reponse' => $reponse]);

?>
