<?php 
//Connexion avec la base de données
/*e-commerce est le nom de ma base de donnée, root -> utilisateur et root -> mp
attention pour mac le mp est root mais pour les autre le nom reste le meme et mdp =" " 
*/
if (gethostname()=="pc-d-ingenieur") {

    try{
        $bdd = new PDO("mysql:host=localhost;dbname=ecom;charset=utf8", "7", "7");
    }
//erreur : renvoyer message 
    catch(PDOException $e){
        die('Erreur : '.$e->getMessage());
    }
}
else {
    
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=ecom;charset=utf8", "sarah", "sarah");
    }
//erreur : renvoyer message 
    catch(PDOException $e){
        die('Erreur : '.$e->getMessage());
    }
};


?>
