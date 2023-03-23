<!DOCTYPE html>
<html lang="fr">
<?php 
    session_start();
//Variable de session : 0 = Déconnecté ; 1 = Connecté ; 2 = Connecté en tant qu'administrateur
    $_SESSION['user'];
    $_SESSION['type_de_compte'] ="admin";
?>
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Site Sympa askip</title>

<!-- Police -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Boogaloo&display=swap" rel="stylesheet">


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
                <a   <?php
                //Si connecté en tant qu'admin
                if($_SESSION['type_de_compte']=="admin"){
                echo"href='lienverspage de gestion'";
                }
                ?>class="reseauxlog">
                <ion-icon name= <?php
                if($_SESSION['type_de_compte']=="admin"){
                echo "mail-unread-outline";
                }
                else echo "cart"
                ?>></ion-icon>
                </a>
                <a  <?php
                if($_SESSION['type_de_compte']=="admin"){
                echo "href='http://localhost:8000/admin/test.php'";
                }
                else echo "href='php/co.php'"
                ?>class="reseauxlog">
                <ion-icon name=<?php
                if($_SESSION['type_de_compte']=="admin"){
                echo "flask-outline";
                }
                else echo "person"
                ?>></ion-icon>
                </a>
                <a <?php
                //Si connecté en tant qu'admin
                if($_SESSION['type_de_compte']=="admin"){
                echo"href='http://localhost:8000/E-commerce-main/?cat=disconnect'";
                }
                ?> class="reseauxlog">
                    <ion-icon name=<?php
                if($_SESSION['type_de_compte']=="admin"){
                echo "power-outline";
                }
                else echo "chatbubbles"
                ?>></ion-icon>
                </a>
              </div>

              <div class="wrap">
                <div class="search">
                   <input type="text" class="searchTerm" placeholder="Que recherchez-vous ?">
                   <button type="submit" class="searchButton">
                    <i><ion-icon name="search"></ion-icon></i>
                  </button>
                </div>
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

                
                    <a href="#">Accueil</a>
                    <a href="#about">Meilleures&nbspventes</a>
                    <a href="#portfolio">Jeux&nbspde&nbspsociété</a>
                    <a href="#contact">Jeux&nbspen&nbspbois</a>
                    <a href="#contact">Jeux&nbspvidéo</a>
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

    <!-- A propos -->
    <section class="container-fluid about">
        <div class="container">
            <div class="row">
                <h2 id="about">A propos de nous</h2>  <!-- Lien d'ancrage -->
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">  
                        <h2>Petit test uno</h2>
                        <p>
                            La cigale et la fourmi. La cigale ayant chanté tout l'été se trouva fort dépourvue quand la bise fut venue. Pas un seul petit morceau de mouche ou de vermiceau, elle alla crier famine chez la fourmi sa voisine lui priant de lui donner quelques vivres jusqu'a la saison nouvelles. La fourmi, n'étant pas de joie lui demande ce qu'elle a fait cet été. LA cigale répond je chantais. La fourmi lui repondit "Vous chantiez ? j'en suis fort aise ! Eh bien pleurez maintenant !!"
                        </p>
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">  
                    <h2>Petit test dos</h2>
                    <p>
                        Maitre corbeau sur un arbre perché tenait en son bec un fromage. Maitre renard par l'odeur alléchée lui tint a peu pres ce langage : eh bonjour monsieur du corbeau, que vous etes jolis, que vous me smeblez beau. Sans mentir, si votre ramage se rapporte a votre plumage, vous etes le phenix des hotes de ces bois. A ces mots le corbeau ne ce sent plus de joie et pour montrer sa joie il ouvre un large bec et laisse tomber sa proie. Le renard s'en saisit et le maaaaange !!!
                    </p>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">  
                <h2>Petit test tres</h2>
                <p>
                    Vive le vent vive le vent vive le vent d'hiverrrrr qui s'envole sifflant souffant dans les grands sapins verts, hey ! Vive le vent vive le vent vive le vent d'hiveeereuuu, boule de neige et jour de l'an et bonne anné grand mere yeaahhhhh. OK pmaintenant on continue avec un petit peu de blabal pour continuer le paragraohe afin qu'il soit pls long et que ca fassse vraiment paragraohe quoi.
                </p>
            </article>
            </div>
        </div>

    </section>
    <!-- Footer/contact -->
    <footer class="container-fluid footer">
        <div class="container">
            <div class="row">
                <h2 id="contact">Contactez-nouuuus</h2>
                <div class="span6">
                    <form class="formulaireContact">
                        <div class="controls controls-row">
                            <input id="name" name="name" type="text" class="span3" placeholder="Name"> 
                            <input id="email" name="email" type="email" class="span3" placeholder="Email address">
                        </div>
                        <div class="controls">
                            <textarea id="message" name="message" class="span6" placeholder="Your Message" rows="5"></textarea>
                        </div>
                          
                        <div class="controls">
                            <button id="contact-submit" type="submit" class="btn btn-custom input-medium pull-right">Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <p>
                Copyright © 2023 mentions legales blablabla
            </p>

        </div>

    </footer>
    <!-- Fin du footer-->
    <script>
        function disconnect(){
            document.location.href = "http://localhost:8000/E-commerce-main/?cat=disconnect";
        }
    </script>

    <?php
        //Fonction pour récupérer l'url de la page
        function getquery(){ $url = $_SERVER['REQUEST_URI'];
            return (parse_url($url, PHP_URL_QUERY)); }
        
        //Fonction modifiant le contenu de la page selon l'url
        function affichage() {
            $num = explode('=',getquery());
            if($num[1]=="unknown"){
                echo "<script>document.location.href = 'http://localhost:8000/E-commerce-main/';</script>";
            }

            if($num[1]=="disconnect"){
                echo "<script>document.location.href = 'http://localhost:8000/E-commerce-main/php/deconnexion.php';</script>";
            }

            if($num[1]!=NULL && $_SESSION['type_de_compte']=="client")   
            {
                echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<table><thead><tr><th>Photo</th><th>Nom</th><th>Description</th><th>Prix</th></thead> <tbody>";
                $categories = $bdd->query('SELECT * FROM produit WHERE produit.id_categorie=(SELECT id FROM categorie WHERE libelle LIKE '+$num[1])+' )'->fetchAll(PDO::FETCH_OBJ);
                foreach ($categories as $produit){
                    $prix = $produit->prix;
                    $discount = $produit->discount;
                    $prixFinale = $prix - (($prix*$discount)/100);
                    $description=$produit->description;
                    $image=$produit->image;
                    $libelle=$produit->libelle;
                        echo "<tr>";    
                        echo "<td><div class='container'><img style='width:20%;height:20%;'src='img/".$image."'></label></div></td>";
                        echo "<td>".$libelle."</td>";
                        echo "<td>".$description."</td>";
                        echo "<td>".$prixFinale."</td>";
                        echo "</tr>";
                }
                echo "</tbody></table>\";</script>";
            }
        }
        affichage();
        //Si connecté, changer le bouton 'connexion' en 'déconnexion'
        if($_SESSION['Connected'] == 1){
            echo"<script language='Javascript'>document.getElementById('connexion').innerHTML='<button class=\'button1\' onclick=\'disconnect()\'>Déconnexion'</script>";
        }
    ?>
</body>
</html>