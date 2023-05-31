<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<?php
// Fonction pour récupérer l'url de la page
function getquery(){ $url=$_SERVER['REQUEST_URI'];
    return (parse_url($url, PHP_URL_QUERY)); }

// Fonction modifiant le contenu de la page selon l'url
function affichage() {
    $temp = 0;
    $num = explode('=',getquery());
    if(isset($num[2]))   
    {
        echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<section id='sidebar'><div><h6 class='p-1 border-bottom'>Filtrer par Prix</h6><ul id='filtre' class='list-group'><a href='index.php?".$num[0]."=".$num[1]."=decroissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Décroissant</li></a><a href='index.php?".$num[0]."=".$num[1]."=croissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Croissant</li></a></ul></div><div><h6 class='p-1 border-bottom'>Filtrer par Date</h6><ul id='filtre' class='list-group'><a href='index.php?".$num[0]."=".$num[1]."=ancienne'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus ancien</li></a><a href='index.php?".$num[0]."=".$num[1]."=recente'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus récent</li></a></ul></div></section>";
        echo "<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
        require './include/config.php';
        switch ($num[2]) {
            case "decroissant":
                if ($num[0]=="cat") {
                    $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo, ROUND(produit.prix * (1 - produit.discount/100), 2) AS prix_reduit FROM produit JOIN utilisateurs ON utilisateurs.id = produit.id_utilisateurs  WHERE produit.id_categorie= '.$num[1].' ORDER BY prix_reduit DESC;')->fetchAll(PDO::FETCH_OBJ);}
                else if ($num[0]=="recherche"){
                    $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo, ROUND(produit.prix * (1 - produit.discount/100), 2) AS prix_reduit FROM produit JOIN utilisateurs ON produit.id_utilisateurs = utilisateurs.id WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\')ORDER BY prix_reduit DESC')->fetchAll(PDO::FETCH_OBJ);
                }else{$recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY prix DESC;')->fetchAll(PDO::FETCH_OBJ);}
              break;
            case "croissant":
                if ($num[0]=="cat") {
                    $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo, ROUND(produit.prix * (1 - produit.discount/100), 2) AS prix_reduit FROM produit JOIN utilisateurs ON utilisateurs.id = produit.id_utilisateurs WHERE produit.id_categorie='.$num[1].' ORDER BY prix_reduit ASC;')->fetchAll(PDO::FETCH_OBJ);}
                else if ($num[0]=="recherche"){
                    $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo, ROUND(produit.prix * (1 - produit.discount/100), 2) AS prix_reduit FROM produit JOIN utilisateurs ON produit.id_utilisateurs = utilisateurs.id WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\')ORDER BY prix_reduit ASC')->fetchAll(PDO::FETCH_OBJ);
                }else {$recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY prix ASC;')->fetchAll(PDO::FETCH_OBJ);}
              break;
            case "recente":
                if ($num[0]=="cat") {
                    $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo FROM produit JOIN utilisateurs ON utilisateurs.id = produit.id_utilisateurs WHERE produit.id_categorie='.$num[1].' ORDER BY date_creation DESC;')->fetchAll(PDO::FETCH_OBJ);}
                else if ($num[0]=="recherche"){
                    $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo FROM produit JOIN utilisateurs ON produit.id_utilisateurs = utilisateurs.id WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\')ORDER BY date_creation DESC')->fetchAll(PDO::FETCH_OBJ);
                }else{$recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY date_creation DESC;')->fetchAll(PDO::FETCH_OBJ);}
              break;
            case "ancienne":
                if ($num[0]=="cat") {
                    $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo FROM produit JOIN utilisateurs ON utilisateurs.id = produit.id_utilisateurs WHERE produit.id_categorie='.$num[1].' ORDER BY date_creation ASC;')->fetchAll(PDO::FETCH_OBJ);}
                else if ($num[0]=="recherche"){
                    $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo FROM produit JOIN utilisateurs ON produit.id_utilisateurs = utilisateurs.id WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\')ORDER BY date_creation ASC')->fetchAll(PDO::FETCH_OBJ);
                }else{ $recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY date_creation ASC;')->fetchAll(PDO::FETCH_OBJ);}
              break;
            default:
                $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo FROM produit JOIN utilisateurs ON utilisateurs.id = produit.id_utilisateurs WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY date_creation DESC;')->fetchAll(PDO::FETCH_OBJ);
              break;
        }
        foreach ($recherche as $produit){
            $id=$produit->id;
            $prix = $produit->prix;
            $discount = $produit->discount;
            $prixFinale = round($prix - (($prix*$discount)/100), 2);
            $image=$produit->image;
            $libelle=$produit->libelle;
            $quantite = $produit->quantite;
            $vendeur = $produit->pseudo;
            echo "<div class='col-md-4'";
            echo "><div class='text-center'><div class='product'";
            echo "onclick=ZOOM('";
            echo $id;
            echo"')>";
            echo "<img class='img-fluid' width='100' src='data/".$image."'>";   
            echo "<div class='about text-left px-3' id='about'>  <h4>".$libelle."</h4> ";  
            echo "<span class='nouveau_prix'>".$prixFinale."€</span>";
            if ($discount != 0){echo "<span id='ancien_prix'>".$prix."€</span>";}
            if($quantite == 0){
                echo "<br><h5 class='text-danger'>Victime de son succès</h5>";
            }else{
                echo "<h5 class='text-muted'>Vendu par ".$vendeur."</h5>";
            }
            echo "</div> </div><span class='dot' id='".$id."'";
            if((!isset($_SESSION['panier'][$id]) || $_SESSION['panier'][$id] < $quantite || !isset($_SESSION['panier'])) && $quantite > 0) echo "onclick=ajouter_panier_categorie(this.id)";
            echo "><span class='inner-dot'><i class='fa fa-plus'></i></span></span> </div> </div>";
        }
        echo "</div> </div>\";</script>";
        return;
    }
    if($num[0]=="recherche")   
    {
        echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<section id='sidebar'><div><h6 class='p-1 border-bottom'>Filtrer par Prix</h6><ul id='filtre' class='list-group'><a href='index.php?".$num[0]."=".$num[1]."=decroissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Décroissant</li></a><a href='index.php?".$num[0]."=".$num[1]."=croissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Croissant</li></a></ul></div><div><h6 class='p-1 border-bottom'>Filtrer par Date</h6><ul id='filtre' class='list-group'><a href='index.php?".$num[0]."=".$num[1]."=ancienne'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus ancien</li></a><a href='index.php?".$num[0]."=".$num[1]."=recente'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus récent</li></a></ul></div></section>";
        echo "<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
        require './include/config.php'; 
        $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo FROM produit JOIN utilisateurs ON produit.id_utilisateurs = utilisateurs.id WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\')')->fetchAll(PDO::FETCH_OBJ);
        if ($recherche==NULL){
            $temp=1;
            echo "Désolé nous n'avons pas trouvé de résultat pour votre recherche <br> <br>";
            echo "Voici quelques produits qui pourraient vous interesser : ";
            $liste_mots = array("pompier", "puissance", "UNO", "dames", "lego");
            $alea = $liste_mots[array_rand($liste_mots)];
            $recherche = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo FROM produit JOIN utilisateurs ON produit.id_utilisateurs = utilisateurs.id WHERE LOWER(libelle) LIKE LOWER(\'%'.$alea.'%\')')->fetchAll(PDO::FETCH_OBJ);
        }
        foreach ($recherche as $produit){
            $id=$produit->id;
            $prix = $produit->prix;
            $discount = $produit->discount;
            $prixFinale = round($prix - (($prix*$discount)/100),2);
            $image=$produit->image;
            $vendeur =$produit->pseudo;
            $libelle=$produit->libelle;
            $quantite = $produit->quantite;
            echo "<div class='col-md-4'";
            echo "><div class='text-center'><div class='product'";
            echo "onclick=ZOOM('";
            echo $id;
            echo"')>";       
            echo "<img class='img-fluid' width='100' src='data/".$image."'>";
            echo "<div class='about text-left px-3' id='about'>  <h4>".$libelle."</h4> "; 
            echo "<span class='nouveau_prix'>".$prixFinale."€</span>";
            if ($discount != 0){echo "<span id='ancien_prix'>".$prix."€</span>";}
            if($quantite == 0){
                echo "<br><h5 class='text-danger'>Victime de son succès</h5>";
            }else{
                echo "<h5 class='text-muted'>Vendu par ".$vendeur."</h5>";
            }
            echo "</div> </div><span class='dot' id='".$id."'";
            if((!isset($_SESSION['panier'][$id]) || $_SESSION['panier'][$id] < $quantite || !isset($_SESSION['panier'])) && $quantite > 0) echo "onclick=ajouter_panier_categorie(this.id)";
            echo "><span class='inner-dot'><i class='fa fa-plus'></i></span></span> </div> </div>";
        }
        echo "</div> </div>\";</script>";
    }
    if($num[0]=="cat")   
    {    
        require './include/config.php'; 
        $requete = $bdd->prepare('SELECT libelle FROM categorie WHERE id ='.$num[1].'');
        $requete->execute();
        $nom = $requete->fetchColumn();
        echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<div class='text-center'><br><br><h3 class='text-bold'>".$nom."</h3></div><section id='sidebar'><div><h6 class='p-1 border-bottom'>Filtrer par Prix</h6><ul id='filtre' class='list-group'><a href='index.php?cat=".$num[1]."=decroissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Décroissant</li></a><a href='index.php?cat=".$num[1]."=croissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Croissant</li></a></ul></div><div><h6 class='p-1 border-bottom'>Filtrer par Date</h6><ul id='filtre' class='list-group'><a href='index.php?cat=".$num[1]."=ancienne'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus ancien</li></a><a href='index.php?cat=".$num[1]."=recente'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus récent</li></a></ul></div></section>";
        echo "<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
        $categories = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo FROM produit JOIN utilisateurs ON produit.id_utilisateurs = utilisateurs.id WHERE produit.id_categorie='.$num[1].'')->fetchAll(PDO::FETCH_OBJ);
        if($categories == null){
          if($nom == null){  //si l'id n'existe pas dans la base de donnée
            $url = $_SERVER['REQUEST_URI'];
            if (strpos($url, '?') !== false) {
              $cleanUrl = strtok($url, '?');
              header("Location: $cleanUrl");// Rediriger vers la nouvelle URL sans les paramètres de requête
              exit();
            }
          }
          $temp = 1;
          echo "Malheureusement il n'existe pas encore de produit pour cette catégorie, mais rassurez-vous ils arrivent bientôt.";
        }
        foreach ($categories as $produit){
            $id=$produit->id;
            $prix = $produit->prix;
            $discount = $produit->discount;
            $prixFinale = round($prix - (($prix*$discount)/100),2);
            $description=$produit->description;
            $image=$produit->image;
            $libelle=$produit->libelle;
            $quantite = $produit->quantite;
            $vendeur = $produit->pseudo;
            echo "<div class='col-md-4'";
            echo "><div class='text-center'><div class='product'";
            echo "onclick=ZOOM('";
            echo $id;
            echo"')>";       
            echo "<img class='img-fluid' width='100' src='data/".$image."'>";
            echo "<div class='about text-left px-3' id='about'>  <h4>".$libelle."</h4> "; 
            echo "<span class='nouveau_prix'>".$prixFinale."€</span>";
            if ($discount != 0){echo "<span id='ancien_prix'>".$prix."€</span>";}
            if($quantite == 0){
                echo "<br><h5 class='text-danger'>Victime de son succès</h5>";
            }else{
                echo "<h5 class='text-muted'>Vendu par ".$vendeur."</h5>";
            }
            echo "</div> </div><span class='dot' id='".$id."'";
            if((!isset($_SESSION['panier'][$id]) || $_SESSION['panier'][$id] < $quantite || !isset($_SESSION['panier'])) && $quantite > 0) echo "onclick=ajouter_panier_categorie(this.id)";
            echo "><span class='inner-dot'><i class='fa fa-plus'></i></span></span> </div> </div>";
        }
        echo "</div> </div>\";</script>";
    }

    //  AFFICHAGE PRODUITS AVEC DÉTAILS PRODUIT
    if($num[0]=="zoom")   
    {
        echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
        require './include/config.php';
        $categories = $bdd->query('SELECT produit.*, utilisateurs.pseudo AS pseudo FROM produit JOIN utilisateurs ON produit.id_utilisateurs = utilisateurs.id WHERE produit.id LIKE \''.$num[1].'\'')->fetchAll(PDO::FETCH_OBJ);
        foreach ($categories as $produit){
            $id=$produit->id;
            $prix = $produit->prix;
            $discount = $produit->discount;
            $prixFinale = round($prix - (($prix*$discount)/100),2);
            $description=$produit->description;
            $image=$produit->image;
            $libelle=$produit->libelle;
            $quantite = $produit->quantite;
            $vendeur = $produit->pseudo;

            echo "<div class='container' id='produits'> <div class='row' id='affiche'><div class='col-xs-4 item-photo'>";
            echo "<img style='max-width:70%;' src='data/".$image."'></div>";
            echo "<div class='col-xs-5' style='border:0px solid gray'><h3>".$libelle."</h3>";
            echo "<h5 style='color:#337ab7'>Vendu par ".$vendeur."</h5>";
            echo "<h6 class='title-price'><small>PRIX</small></h6><h3 style='margin-top:0px;'>".$prixFinale."€</h3>";
            if($quantite <= 5){
                if($quantite == 0) {echo "<h5 class='title-attr'><span style='color:red'>Cette article a été victime de son succès.</span></h5>";}
                else if($quantite == 1){
                    echo "<h5 class='title-price'>Il ne reste plus que <span style='color:red;'>".$quantite."</span> article !</h5><br>";
                } else{echo "<h5 class='title-attr'><small>Il ne reste plus que <span style='color:red;'>".$quantite."</span> articles</small></h5><br>";}
            }
            echo "<div class='section my-3'>";
            if($discount > 0){
                echo "<h6 class='title' style='margin-top:15px;color:red;'><small>Prix initial : ".$prix."€</small></h6><br>";  
            }              
            echo "<h6 class='title-attr'><small>QUANTITÉ</small></h6>";                  
            echo "<input type='number' value='0' min='0' max='";
            if(isset($_SESSION['panier']) && isset($_SESSION['panier'][$id])){ 
                echo $quantite-$_SESSION['panier'][$id];
            }else{echo $quantite;}
            echo "' id='quantite'/>"; 
            echo "<button class='btn btn-success' onclick=ajouter_panier(".$id.")><span style='margin-right:20px' class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>Ajouter au panier</button>";
            echo "</div></div>";   
            echo "<div class='col-xs-9' style='width: 100%;'>";
            echo "<h5>Description</h5>";   
            echo "<div style='width:100%; border-top:1px solid silver'>";
            echo "<p style='padding:15px;'>".$description."</p>";                                   
            echo "</div></div></div></div>";

        }
        echo "</div> </div>\";</script>";
    }
    if ($temp==1) {
      echo "<script>document.getElementById('sidebar').outerHTML= ''</script>";
      unset($temp);
    }
}
?>
