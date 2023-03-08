<!--Ajouter a la base de donnée un produit, le supprimer, afficher ---->

<?php 
/*On crée une fonction ajouter vers notre base de donnée,pour ajoute un produit, le vendeur va pouvoir ajouter*/
    function ajouter($image, $nom, $prix, $description){
    /*condition : si on fait la connexion et que ca fonctionne alors on peut y acceder */
    //if require("config.php"){
    /*on va creer une variable avc une commande sql */
        $req = $access-> prepare("INSERT INTO produits(image, nom, prix, description) VALUES (?, ?, ?, ?))");
    /*toutes les variables sont stockés dans req et maintenant il faut l'executer*/
        $req->execute(array($image, $nom, $prix, $description))
 /*a la fin, on cloture*/
        $req->closeCursor();
   // }
}

/*commande qui nous permet d'afficher les produit créé */
    function afficher(){
       //if require("config.php"){
    /*selectionne moi tout de notre table produit et par ordre d'id en ordre decroissant 
    il va donc commencer par la derniere valeur ajouter */
            $req = $access-> prepare("SELECT * FROM produits ORDER BY id DESC");
            $req->execute();

        /*on stock dans data les donnée recupere dans req sous forme d'objet */
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        $req-> closeCursor();
    }
   // }

/*commande qui permet de supprimer les produits de notre identifiant*/
    function supprimer($id){
        //if require("config.php"){
            $req=$access->prepare("DELETE  * FROM produits WHERE id=?");
            $req->execute(array($id));
        //}
    }
?>