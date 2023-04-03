<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Site Sympa askip</title>
<!-- Police -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Boogaloo&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


<!-- CSS -->
<link rel="stylesheet" href ="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

</head>

<!-- Contenu  -->
<body>
    <!-- Header -->
    <header class="container-fluid header">
        <div class="container">
            <a href="#" class="logo">JeuxVentes.fr</a>
            
            <div class="icons">
                <?php 
                if(!isset($_SESSION['statut'])){
                    echo "<a href='#' class='reseauxlog'><ion-icon name=cart></ion-icon> </a>";
                    echo "<a href='php/co.php' class='reseauxlog'><ion-icon name=person></ion-icon> </a>";
                    echo "<a href='php/contact.php' class='reseauxlog'><ion-icon name=chatbubbles></ion-icon> </a>";
                }else if($_SESSION['statut'] == "client"){
                    echo "<a href='#' class='reseauxlog'><ion-icon name=cart></ion-icon> </a>";
                    echo "<a href='php/landing.php' class='reseauxlog'><ion-icon name=person></ion-icon> </a>";
                    echo "<a href='php/contact.php' class='reseauxlog'><ion-icon name=chatbubbles></ion-icon> </a>";
                }
                else if ($_SESSION['statut'] == "admin"){
                    echo "<a href='./php/gestion_messages.php' class='reseauxlog'><ion-icon name=mail-unread-outline></ion-icon> </a>";
                    echo "<a href='./vendeur/admin/main_ad.php' class='reseauxlog'> <ion-icon name=flask-outline></ion-icon> </a>";
                    echo "<a href='./php/deconnexion.php' class='reseauxlog'><ion-icon name=power-outline></ion-icon> </a>";
                }else if($_SESSION['statut'] == "vendeur"){
                    echo "<a href='./php/contact.php' class='reseauxlog'><ion-icon name=mail-unread-outline></ion-icon> </a>";
                    echo "<a href='vendeur/main.php' class='reseauxlog'> <ion-icon name=storefront-outline></ion-icon> </a>";
                    echo "<a href='./php/deconnexion.php' class='reseauxlog'><ion-icon name=power-outline></ion-icon> </a>";
                }else if($_SESSION['statut'] == "livreur"){
                    echo "<a href='./php/contact.php' class='reseauxlog'><ion-icon name=mail-unread-outline></ion-icon> </a>";
                    echo "<a href='./vendeur/livreur/index2.php' class='reseauxlog'> <ion-icon name=bicycle-outline></ion-icon> </a>";
                    echo "<a href='./php/deconnexion.php' class='reseauxlog'><ion-icon name=power-outline></ion-icon> </a>";
                }
                ?>
            </div>

              <div class="wrap">
                <div class="search">
                   <input type="text" id="recherche" class="searchTerm" onkeydown="handleKeyPress(event)" placeholder="Que recherchez-vous ?">
                   <button onclick="recherche()" class="searchButton">
                    <i><ion-icon name="search"></ion-icon></i>
                  </button>
                </div>
                <script>
                    function ZOOM(x){
                        window.location="http://localhost:8000/index.php?zoom="+x;
                    }
                    function handleKeyPress(event) {
                        if (event.keyCode === 13) {
                        // appel de la fonction souhaitée
                        recherche();
                         }
                        }
                    function recherche() {
                    // Récupération de la valeur de l'input
                    var searchTerm = document.getElementById("recherche").value;

                    // Création du lien de recherche
                    var searchLink = "?recherche="+searchTerm.toLowerCase().replace(/\s+/g, '-');

                    // Redirection vers la page de recherche
                    window.location.href = searchLink;
                    }
                </script>
             </div>
        </div>

    </header>
    <!-- Fin du Header -->

    <script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" ></script> <!--icons-->
    <script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" ></script>

    <!-- Bannière du site -->
    <section class="container-fluid banniere">
       <!--<div class="ban">
            <img src="img/banTest.png" alt="bannière du site">
        </div> -->
        <div class="inner-banniere">
            <nav class="menu">
                <label for="toggle">☰</label>
                <input type="checkbox" id="toggle">
                <div class="main_pages">

                    <a href="index.php">Accueil</a>
                    <a href="index.php?cat=meilleur-vente">Meilleures&nbspventes</a>
                    <a href="index.php?cat=jeu_societe">Jeux&nbspde&nbspsociété</a>
                    <a href="index.php?cat=jeu_en_bois">Jeux&nbspen&nbspbois</a>
                    <a href="index.php?cat=lego">Lego</a>
                    <a href="#contact">Stratégie</a>
                    
                </div>
            </nav>
        </div> 

    </section> 
    <!-- Fin de la bannière -->
    <main>
    <p>Chez JEUX.FR, qualité et professionnalisme à votre service.
                    Que vous soyiez débutants, amateurs ou professionnels, vous trouverez tout le matériel nécessaire
                    pour la réalisation de vos pièces. 
                    Soie, cotton, polyester, fils, aiguilles, machines, vous trouverez assurément votre bonheur !
                    </p>
    </main>

    
    <!-- Footer -->
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
    <!-- Fin du footer-->
    <?php
        //Fonction pour récupérer l'url de la page
        function getquery(){ $url = $_SERVER['REQUEST_URI'];
            return (parse_url($url, PHP_URL_QUERY)); }
        
        //Fonction modifiant le contenu de la page selon l'url
        function affichage() {
            $num = explode('=',getquery());
            if($num[2]!= NULL)   
            {
                echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
                require './include/config.php';
                switch ($num[2]) {
                    case "decroissant":
                        if ($num[0]=cat) {
                            $recherche = $bdd->query('SELECT * FROM produit WHERE produit.id_categorie=(SELECT id FROM categorie WHERE libelle LIKE \''.$num[1].'\') ORDER BY prix DESC;')->fetchAll(PDO::FETCH_OBJ);}
                        $recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY prix DESC;')->fetchAll(PDO::FETCH_OBJ);
                      break;
                    case "croissant":
                        if ($num[0]=cat) {
                            $recherche = $bdd->query('SELECT * FROM produit WHERE produit.id_categorie=(SELECT id FROM categorie WHERE libelle LIKE \''.$num[1].'\') ORDER BY prix ASC;')->fetchAll(PDO::FETCH_OBJ);}
                        $recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY prix ASC;')->fetchAll(PDO::FETCH_OBJ);
                      break;
                    case "recente":
                        if ($num[0]=cat) {
                            $recherche = $bdd->query('SELECT * FROM produit WHERE produit.id_categorie=(SELECT id FROM categorie WHERE libelle LIKE \''.$num[1].'\') ORDER BY date_creation DESC;')->fetchAll(PDO::FETCH_OBJ);}
                        $recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY date_creation DESC;')->fetchAll(PDO::FETCH_OBJ);
                      break;
                    case "ancienne":
                        if ($num[0]=cat) {
                            $recherche = $bdd->query('SELECT * FROM produit WHERE produit.id_categorie=(SELECT id FROM categorie WHERE libelle LIKE \''.$num[1].'\') ORDER BY date_creation ASC;')->fetchAll(PDO::FETCH_OBJ);}
                        $recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\') ORDER BY date_creation ASC;')->fetchAll(PDO::FETCH_OBJ);
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
                    $description=$produit->description;
                    $image=$produit->image;
                    $libelle=$produit->libelle;
                    echo "<div class='col-md-4'";
                    echo "onclick=ZOOM('";
                    echo $id;
                    echo"')";
                    echo "><div class='product text-center'>";   ;    
                    echo "<img class='img-fluid' width='100' src='data/".$image."'></td>";
                    echo "<div class='about text-left px-3' id='about'>  <h4>".$libelle."</h4> ";
                    echo "<span class='text-muted'>".$description."</span>";
                    if ($discount != 0){echo "<h3 id='ancien_prix'>".$prix."€</h3>";}
                    echo "<h3 class='nouveau_prix'>".$prixFinale."€</h3>";
                    echo "<h5 class='text-muted'>Vendu par ierhgieh</h5>";
                    echo "</div> <span class='dot'><span class='inner-dot'><i class='fa fa-plus'></i></span></span> </div> </div>";
                }
                echo "</div> </div>\";</script>";
                return;
            }
            if($num[0]=="recherche")   
            {
                echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
                require './include/config.php';
                $recherche = $bdd->query('SELECT * FROM produit WHERE LOWER(libelle) LIKE LOWER(\'%'.$num[1].'%\')')->fetchAll(PDO::FETCH_OBJ);
                foreach ($recherche as $produit){
                    $id=$produit->id;
                    $prix = $produit->prix;
                    $discount = $produit->discount;
                    $prixFinale = $prix - (($prix*$discount)/100);
                    $description=$produit->description;
                    $image=$produit->image;
                    $libelle=$produit->libelle;
                    echo "<div class='col-md-4'";
                    echo "onclick=ZOOM('";
                    echo $id;
                    echo"')";
                    echo "><div class='product text-center'>";       
                    echo "<img class='img-fluid' width='100' src='data/".$image."'></td>";
                    echo "<div class='about text-left px-3' id='about'>  <h4>".$libelle."</h4> ";
                    if ($discount != 0){echo "<h3 id='ancien_prix'>".$prix."€</h3>";}
                    echo "<h3 class='nouveau_prix'>".$prixFinale."€</h3>";
                    echo "<h5 class='text-muted'>Vendu par ierhgieh</h5>";
                    echo "</div> <span class='dot'><span class='inner-dot'><i class='fa fa-plus'></i></span></span> </div> </div>";
                }
                echo "</div> </div>\";</script>";
            }
            if($num[0]=="cat")   
            {
                echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
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
                    echo "<div class='col-md-4'";
                    echo "onclick=ZOOM('";
                    echo $id;
                    echo"')";
                    echo "><div class='product text-center'>";    
                    echo "<img class='img-fluid' width='100' src='data/".$image."'></td>";
                    echo "<div class='about text-left px-3' id='about'>  <h4>".$libelle."</h4> ";
                    if ($discount != 0){echo "<h3 id='ancien_prix'>".$prix."€</h3>";}
                    echo "<h3 class='nouveau_prix'>".$prixFinale."€</h3>";
                    echo "<h5 class='text-muted'>Vendu par ierhgieh</h5>";
                    echo "</div> <span class='dot'><span class='inner-dot'><i class='fa fa-plus'></i></span></span> </div> </div>";
                }
                echo "</div> </div>\";</script>";
            }
            if($num[0]=="zoom")   
            {
                echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<div class='container mt-5'><div class='row d-flex justify-content-center g-1'>";
                require './include/config.php';
                $categories = $bdd->query('SELECT * FROM produit WHERE id LIKE \''.$num[1].'\'')->fetchAll(PDO::FETCH_OBJ);
                foreach ($categories as $produit){
                    $id=$produit->id;
                    $prix = $produit->prix;
                    $discount = $produit->discount;
                    $prixFinale = $prix - (($prix*$discount)/100);
                    $description=$produit->description;
                    $image=$produit->image;
                    $libelle=$produit->libelle;
                   
                    echo "<div class='container' id='produits'> <div class='row' id='affiche'><div class='col-xs-4 item-photo'>";
                    echo "<img style='max-width:100%;' src='data/".$image."'></div>";
                    echo "<div class='col-xs-5' style='border:0px solid gray'><h3>".$libelle."</h3>";
                    echo "<h5 style='color:#337ab7'>Vendu par ".$nomvendeur."<small style='color:#337ab7'>(".rand(50,10000)." ventes)</small></h5>";
                    echo "<h6 class='title-price'><small>PRIX</small></h6><h3 style='margin-top:0px;'>".$prixFinale."€</h3>";
                    echo "<div class='section'><h6 class='title-attr' style='margin-top:15px;' ><small>Prix initial : ".$prix."€</small></h6>";                    
                    echo "<div> </div></div>";
                    echo "<div class='section' style='padding-bottom:20px;'><h6 class='title-attr'><small>QUANTITÉ</small></h6> ";                  
                    echo "<div><div class='btn-minus'><span class='glyphicon glyphicon-minus'></span></div><input type='number' min='0' max='Stock' />"; //ATTENTION METTRE VARIABLE LA VRAIE
                    echo "<div class='btn-plus'><span class='glyphicon glyphicon-plus'></span></div></div></div>";
                    echo "<div class='section' style='padding-bottom:20px;'>";
                    echo "<button class='btn btn-success'><span style='margin-right:20px' class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>Ajouter au panier</button>";
                    echo "</div></div>";   
                    echo "<div class='col-xs-9' style='width: 100%;'>";
                    echo "<ul class='menu-items'><li class='active'>Détails du produit</li><li>Avis</li><li>Vendeurs</li><li>Livraison</li></ul>";   
                    echo "<div style='width:100%; border-top:1px solid silver'>";
                    echo "<p style='padding:15px;'><small>Ceci est une petite description de ".$libelle." :<br>".$description."</small></p>";                                   
                    echo "</div></div></div></div>";



                    //if ($discount != 0){echo "<h3 id='ancien_prix'>".$prix."€</h3>";}
                    //echo "<h3 class='nouveau_prix'>".$prixFinale."€</h3>";
                    
                }
                echo "</div> </div>\";</script>";
            }
        }
        affichage();
    ?>
    
</body>
</html>
