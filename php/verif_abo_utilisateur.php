<?php 
    session_start();

    if(isset($_SESSION['connecte'])){
        if($_SESSION['connecte']==1 || $_SESSION['connecte']==2){
            echo "valide";
        }
    }else{
        echo "invalide";
    }
?>