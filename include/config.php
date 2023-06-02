<?php 
//Connexion avec la base de données
/*
ATTENTION : CHANGER LE NOM D'UTILISATEUR ET LE MOT DE PASSE QUI SONT ICI "root"
*/
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=ecom;charset=utf8", "root", "root");
    }
//erreur : renvoyer message 
    catch(PDOException $e){
        die('Erreur : '.$e->getMessage());
    }

?>
