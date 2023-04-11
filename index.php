<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->

<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Site Sympa askip</title>

    <!-- POLICE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Boogaloo&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href ="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/index.js"></script>

    <!-- INCLUSION ICONS -->
    <script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" ></script> 
    <script  nomodule  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" ></script>

</head>

<!-- CONTENU  -->
<body>

    <!-- HEADER -->
    <header class="container-fluid header">
        <div class="container">

            <!-- LOGO SITE -->
            <a href="index.php" class="logo">JeuxVentes.fr</a>
            
            <!-- ICONS -->
            <div class="icons">
                <?php 
                // REDIRECTIONS PAGES/CHANGEMENT AFFICHAGE LORS DU CLIC SUR LOGO SELON LE PROFIL UTILISATEUR
                if(!isset($_SESSION['statut'])){
                    echo "<a href='php/panier.php' class='reseauxlog'><ion-icon name=cart></ion-icon> </a>";
                    echo "<a href='php/co.php' class='reseauxlog'><ion-icon name=person></ion-icon> </a>";
                    echo "<a href='php/contact.php' class='reseauxlog'><ion-icon name=chatbubbles></ion-icon> </a>";
                }else if($_SESSION['statut'] == "client"){
                    echo "<a href='php/panier.php' class='reseauxlog'><ion-icon name=cart></ion-icon> </a>";
                    echo "<a href='./profil/client/profil_cl.php' class='reseauxlog'><ion-icon name=person></ion-icon> </a>";
                    echo "<a href='./php/contact.php' class='reseauxlog'><ion-icon name=chatbubbles></ion-icon> </a>";
                }
                else if ($_SESSION['statut'] == "admin"){
                    echo "<a href='./php/gestion_messages.php' class='reseauxlog'><ion-icon name=mail-unread-outline></ion-icon> </a>";
                    echo "<a href='./profil/admin/main_ad.php' class='reseauxlog'> <ion-icon name=flask-outline></ion-icon> </a>";
                    echo "<a href='./php/deconnexion.php' class='reseauxlog'><ion-icon name=power-outline></ion-icon> </a>";
                }else if($_SESSION['statut'] == "vendeur"){
                    echo "<a href='./php/contact.php' class='reseauxlog'><ion-icon name=mail-unread-outline></ion-icon> </a>";
                    echo "<a href='./profil/vendeur/main.php' class='reseauxlog'> <ion-icon name=storefront-outline></ion-icon> </a>";
                    echo "<a href='./php/deconnexion.php' class='reseauxlog'><ion-icon name=power-outline></ion-icon> </a>";
                }else if($_SESSION['statut'] == "livreur"){
                    echo "<a href='./php/contact.php' class='reseauxlog'><ion-icon name=mail-unread-outline></ion-icon> </a>";
                    echo "<a href='./profil/livreur/index2.php' class='reseauxlog'> <ion-icon name=bicycle-outline></ion-icon> </a>";
                    echo "<a href='./php/deconnexion.php' class='reseauxlog'><ion-icon name=power-outline></ion-icon> </a>";
                }
                ?>
            </div>
            
            <!-- BARRE DE RECHERCHE -->
            <div class="wrap">
                <div class="search">
                    <input type="text" id="recherche" class="searchTerm" onkeydown="handleKeyPress(event)" placeholder="Que recherchez-vous ?">
                    <button onclick="recherche()" class="searchButton">
                    <i><ion-icon name="search"></ion-icon></i>
                    </button>
                </div>
             </div>
        </div>
    </header>
    <!-- FIN DU HEADER -->

    <!-- BANNIERE DU SITE -->
    <section class="container-fluid banniere">
        <div class="inner-banniere">
            <nav class="menu">
                <label for="toggle" id="label-toggle">☰</label>
                <input type="checkbox" id="toggle">
                <div class="main_pages">
                    <a href="index.php">Accueil</a>
                    <a href="index.php?cat=jeu_societe">Jeux&nbspde&nbspsociété</a>
                    <a href="index.php?cat=jeu_en_bois">Jeux&nbspen&nbspbois</a>
                    <a href="index.php?cat=lego">Lego</a>
                    <a href="#contact">Stratégie</a>
                    <a href="php/abonnement.php">Abonnement</a>
                </div>
            </nav>
        </div>
    </section> 
    <!-- FIN DE LA BANNIERE -->

    <!-- PAGE PRINCIPALE -->
    <main>
        <div class="justify-content-center d-flex">
            <!-- SLIDER MEILLEURES VENTES -->
            <div class="slider"> 
                <div class="slides">
                    <input type="radio" name="radio-btn" id="radio1" checked>
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <div class="slide premier">
                        <p>Les meilleurs ventes</p>
                        <img src="./data/UNO.jpg" alt="image d'un UNO">
                    </div>
                    <div class="slide">
                        <p>Les meilleurs ventes</p>
                        <img src="./data/puissance-4.jpg" alt="image d'un puissance4">
                    </div>
                    <div class="slide">
                        <p>Les meilleurs ventes</p>
                        <img src="./data/pompier.jpeg" alt="image d'un UNO">
                    </div> 
                    <div class="slide">
                        <p>Les meilleurs ventes</p>
                        <img src="./data/dames.jpeg" alt="image d'un UNO">
                    </div>
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>
                </div>
                <div class="navigation-manuel">
                    <label for="radio1" class="manuel-btn"></label>
                    <label for="radio2" class="manuel-btn"></label>
                    <label for="radio3" class="manuel-btn"></label>
                    <label for="radio4" class="manuel-btn"></label>
                </div>
            </div>
        </div>
    </main>
    <!-- FIN PAGE PRINCIPALE -->

    <!-- FOOTER -->
    <footer class="container-fluid footer">
        <div class="container">
            <div class="row">
            <h1 id="infos">Informations</h1>
            <iframe id="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2615.8442200637187!2d2.064316615915703!3d49.03256977930504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6f578a5671b03%3A0x225d4d910fb39b53!2sCY%20Tech%20-%20Site%20Fermat!5e0!3m2!1sfr!2sfr!4v1679603546288!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12">  
                    <h2>Plan du site</h2>
                        <ul class="menuBas">
                        <li>Accueil</li> 
                        <li>Meilleures ventes</li> 
                        <li>Jeux de société</li> 
                        <li>Jeux en bois</li> 
                        <li>Jeux vidéo</li> 
                        <li>Stratégie</li> 
                        <li>Nous contacter</li> 
                        </ul>
                </article>
                <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12">  
                <h2>Mentions légales</h2>
                <p>
                    JeuxVentes<br>01.02.03.04.05<br>JeuxVentes@contact.fr<br>Chemin des Paradis, 95000 CERGY.
                </p>
                </article> 
                <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12">  
                <h2>Moyens de paiement</h2>
                <p>
                    okokoko
                </p>
                </article> 
                <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12">  
                <h2>Suivre nos actualités </h2>
                <p>
                    <a class="reseauxFooter" href="https://twitter.com" target="_blank">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                    <a class="reseauxFooter" href="https://instagram.com" target="_blank">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                        <a class="reseauxFooter" href="https://github.com/An2sBRR/E-commerce" target="_blank">
                    <ion-icon name="logo-github"></ion-icon>
                    </a>
                </p>  
                </article>
            </div>
            <h3 id="copyright">
                Copyright © 2023 
            </h3>
        </div>
    </footer>
    <!-- FIN DU FOOTER -->

    <?php
        // Fonction pour récupérer l'url de la page
        function getquery(){ $url=$_SERVER['REQUEST_URI'];
            return (parse_url($url, PHP_URL_QUERY)); }
        
        // Fonction modifiant le contenu de la page selon l'url
        function affichage() {
            $num = explode('=',getquery());
            if(isset($num[2]))   
            {
                echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<section id='sidebar'><div><h6 class='p-1 border-bottom'>Filtrer par Prix</h6><ul id='filtre' class='list-group'><a href='index.php?".$num[0]."=".$num[1]."=decroissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Décroissant</li></a><a href='index.php?".$num[0]."=".$num[1]."=croissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Croissant</li></a></ul></div><div><h6 class='p-1 border-bottom'>Filtrer par Date</h6><ul id='filtre' class='list-group'><a href='index.php?".$num[0]."=".$num[1]."=ancienne'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus ancient</li></a><a href='index.php?".$num[0]."=".$num[1]."=recente'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus récent</li></a></ul></div></section>";
                echo "<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
                require './include/config.php';
                switch ($num[2]) {
                    case "decroissant":
                        if ($num[0]=="cat") {
                            $recherche = $bdd->query('SELECT * FROM produit WHERE produit.id_categorie=(SELECT id FROM categorie WHERE libelle LIKE \''.$num[1].'\') ORDER BY prix DESC;')->fetchAll(PDO::FETCH_OBJ);}
                        else {$recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY prix DESC;')->fetchAll(PDO::FETCH_OBJ);}
                      break;
                    case "croissant":
                        if ($num[0]=="cat") {
                            $recherche = $bdd->query('SELECT * FROM produit WHERE produit.id_categorie=(SELECT id FROM categorie WHERE libelle LIKE \''.$num[1].'\') ORDER BY prix ASC;')->fetchAll(PDO::FETCH_OBJ);}
                        else {$recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY prix ASC;')->fetchAll(PDO::FETCH_OBJ);}
                      break;
                    case "recente":
                        if ($num[0]=="cat") {
                            $recherche = $bdd->query('SELECT * FROM produit WHERE produit.id_categorie=(SELECT id FROM categorie WHERE libelle LIKE \''.$num[1].'\') ORDER BY date_creation DESC;')->fetchAll(PDO::FETCH_OBJ);}
                        else{$recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY date_creation DESC;')->fetchAll(PDO::FETCH_OBJ);}
                      break;
                    case "ancienne":
                        if ($num[0]=="cat") {
                            $recherche = $bdd->query('SELECT * FROM produit WHERE produit.id_categorie=(SELECT id FROM categorie WHERE libelle LIKE \''.$num[1].'\') ORDER BY date_creation ASC;')->fetchAll(PDO::FETCH_OBJ);}
                        else{ $recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY date_creation ASC;')->fetchAll(PDO::FETCH_OBJ);}
                      break;
                    default:
                    $recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY date_creation DESC;')->fetchAll(PDO::FETCH_OBJ);
                      break;
                }
                foreach ($recherche as $produit){
                    $id=$produit->id;
                    $prix = $produit->prix;
                    $discount = $produit->discount;
                    $prixFinale = $prix - (($prix*$discount)/100);
                    $image=$produit->image;
                    $libelle=$produit->libelle;
                    $quantite = $produit->quantite;
                    echo "<div class='col-md-4'";
                    echo "><div class='text-center'><div class='product'";
                    echo "onclick=ZOOM('";
                    echo $id;
                    echo"')>";       
                    echo "<img class='img-fluid' width='100' src='data/".$image."'>";
                    echo "<div class='about text-left px-3' id='about'>  <h4>".$libelle."</h4> ";
                    if ($discount != 0){echo "<h3 id='ancien_prix'>".$prix."€</h3>";}
                    echo "<h3 class='nouveau_prix'>".$prixFinale."€</h3>";
                    echo "<h5 class='text-muted'>Vendu par ierhgieh</h5>";
                    echo "</div> </div><span class='dot' id='".$id."'";
                    if((!isset($_SESSION['panier'][$id]) || $_SESSION['panier'][$id] < $quantite || !isset($_SESSION['panier'])) && $quantite > 0) echo "onclick=ajouter_panier_categorie(this.id)";
                    echo "><span class='inner-dot'><i class='fa fa-plus'></i></span></span> </div> </div>";
                }
                echo "</div> </div>\";</script>";
                return;
            }
            if($num[0]=="recherche")   
            {
                echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<section id='sidebar'><div><h6 class='p-1 border-bottom'>Filtrer par Prix</h6><ul id='filtre' class='list-group'><a href='index.php?".$num[0]."=".$num[1]."=decroissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Décroissant</li></a><a href='index.php?".$num[0]."=".$num[1]."=croissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Croissant</li></a></ul></div><div><h6 class='p-1 border-bottom'>Filtrer par Date</h6><ul id='filtre' class='list-group'><a href='index.php?".$num[0]."=".$num[1]."=ancienne'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus ancient</li></a><a href='index.php?".$num[0]."=".$num[1]."=recente'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus récent</li></a></ul></div></section>";
                echo "<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
                require './include/config.php';
                $recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\')')->fetchAll(PDO::FETCH_OBJ);
                foreach ($recherche as $produit){
                    $id=$produit->id;
                    $prix = $produit->prix;
                    $discount = $produit->discount;
                    $prixFinale = $prix - (($prix*$discount)/100);
                    $image=$produit->image;
                    $libelle=$produit->libelle;
                    echo "<div class='col-md-4'";
                    echo "><div class='text-center'><div class='product'";
                    echo "onclick=ZOOM('";
                    echo $id;
                    echo"')>";       
                    echo "<img class='img-fluid' width='100' src='data/".$image."'>";
                    echo "<div class='about text-left px-3' id='about'>  <h4>".$libelle."</h4> ";
                    if ($discount != 0){echo "<h3 id='ancien_prix'>".$prix."€</h3>";}
                    echo "<h3 class='nouveau_prix'>".$prixFinale."€</h3>";
                    echo "<h5 class='text-muted'>Vendu par ierhgieh</h5>";
                    echo "</div> </div><span class='dot' id='".$id."'";
                    if((!isset($_SESSION['panier'][$id]) || $_SESSION['panier'][$id] < $quantite || !isset($_SESSION['panier'])) && $quantite > 0) echo "onclick=ajouter_panier_categorie(this.id)";
                    echo "><span class='inner-dot'><i class='fa fa-plus'></i></span></span> </div> </div>";
                }
                echo "</div> </div>\";</script>";
            }
            if($num[0]=="cat")   
            {     
                echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<section id='sidebar'><div><h6 class='p-1 border-bottom'>Filtrer par Prix</h6><ul id='filtre' class='list-group'><a href='index.php?cat=".$num[1]."=decroissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Décroissant</li></a><a href='index.php?cat=".$num[1]."=croissant'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Croissant</li></a></ul></div><div><h6 class='p-1 border-bottom'>Filtrer par Date</h6><ul id='filtre' class='list-group'><a href='index.php?cat=".$num[1]."=ancienne'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus ancient</li></a><a href='index.php?cat=".$num[1]."=recente'><li class='list-group-item list-group-item-action mb-2 rounded'><span class='fa pr-1'></span>Plus récent</li></a></ul></div></section>";
                echo "<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
                require './include/config.php';
                $categories = $bdd->query('SELECT * FROM produit WHERE produit.id_categorie=(SELECT id FROM categorie WHERE libelle LIKE \''.$num[1].'\')')->fetchAll(PDO::FETCH_OBJ);
                foreach ($categories as $produit){
                    $id=$produit->id;
                    $prix = $produit->prix;
                    $discount = $produit->discount;
                    $prixFinale = $prix - (($prix*$discount)/100);
                    $description=$produit->description;
                    $image=$produit->image;
                    $libelle=$produit->libelle;
                    $quantite = $produit->quantite;
                    echo "<div class='col-md-4'";
                    echo "><div class='text-center'><div class='product'";
                    echo "onclick=ZOOM('";
                    echo $id;
                    echo"')>";       
                    echo "<img class='img-fluid' width='100' src='data/".$image."'>";
                    echo "<div class='about text-left px-3' id='about'>  <h4>".$libelle."</h4> ";
                    if ($discount != 0){echo "<h3 id='ancien_prix'>".$prix."€</h3>";}
                    echo "<h3 class='nouveau_prix'>".$prixFinale."€</h3>";
                    echo "<h5 class='text-muted'>Vendu par ierhgieh</h5>";
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
                $categories = $bdd->query('SELECT produit.*, employes.pseudo AS pseudo FROM produit JOIN employes ON produit.id_employes = employes.id WHERE produit.id LIKE \''.$num[1].'\'')->fetchAll(PDO::FETCH_OBJ);
                foreach ($categories as $produit){
                    $id=$produit->id;
                    $prix = $produit->prix;
                    $discount = $produit->discount;
                    $prixFinale = $prix - (($prix*$discount)/100);
                    $description=$produit->description;
                    $image=$produit->image;
                    $libelle=$produit->libelle;
                    $quantite = $produit->quantite;
                    $vendeur = $produit->pseudo;

                    echo "<div class='container' id='produits'> <div class='row' id='affiche'><div class='col-xs-4 item-photo'>";
                    echo "<img style='max-width:100%;' src='data/".$image."'></div>";
                    echo "<div class='col-xs-5' style='border:0px solid gray'><h3>".$libelle."</h3>";
                    echo "<h5 style='color:#337ab7'>Vendu par ".$vendeur."<br><small style='color:#337ab7'>(".rand(50,10000)." ventes)</small></h5>";
                    echo "<h6 class='title-price'><small>PRIX</small></h6><h3 style='margin-top:0px;'>".$prixFinale."€</h3>";
                    echo "<div class='section'><h6 class='title-attr' style='margin-top:15px;' ><small>Prix initial : ".$prix."€</small></h6>";                    
                    echo "<div> </div></div>";
                    echo "<div class='section' style='padding-bottom:20px;'><h6 class='title-attr'><small>QUANTITÉ</small></h6> ";                  
                    echo "<div><div class='btn-minus'><span class='glyphicon glyphicon-minus'></span></div><input type='number' value='0' min='0' max='";
                    if(isset($_SESSION['panier']) && isset($_SESSION['panier'][$id])){ 
                        echo $quantite-$_SESSION['panier'][$id];
                    }else{echo $quantite;}
                    echo "' id='quantite'/>"; 
                    echo "<div class='btn-plus'><span class='glyphicon glyphicon-plus'></span></div></div></div>";
                    echo "<div class='section' style='padding-bottom:20px;'>";
                    echo "<button class='btn btn-success' onclick=ajouter_panier(".$id.")><span style='margin-right:20px' class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>Ajouter au panier</button>";
                    echo "</div></div>";   
                    echo "<div class='col-xs-9' style='width: 100%;'>";
                    echo "<ul class='menu-items'><li class='active'>Détails du produit</li><li>Avis</li><li>Vendeurs</li><li>Livraison</li></ul>";   
                    echo "<div style='width:100%; border-top:1px solid silver'>";
                    echo "<p style='padding:15px;'><small>Ceci est une petite description de ".$libelle." :<br>".$description."</small></p>";                                   
                    echo "</div></div></div></div>";

                }
                echo "</div> </div>\";</script>";
            }
        }
        affichage();
    ?>
</body>
</html>
