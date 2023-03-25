<?php 
    session_start();

    if(isset($_SESSION['user'])){
        echo "valide";
    }else{
        echo "invalide";
    }
?>
