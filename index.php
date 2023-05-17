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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- INCLUSION ICONS -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
                <div class="search"> <input type="text" id="recherche" class="searchTerm"
                        onkeydown="handleKeyPress(event)" placeholder="Que recherchez-vous ?">
                    <button onclick="recherche()" class="searchButton">
                        <i>
                            <ion-icon name="search"></ion-icon>
                        </i>
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
                    <?php 
                        require "include/config.php";
                        $sql = "SELECT id, libelle FROM categorie";
                        $resultat = $bdd->query($sql);
                        while ($row = $resultat->fetch()) {
                            echo "<a href='index.php?cat=".$row['id']."'>".str_replace(' ', '&nbsp;', $row['libelle'])."</a>";
                        }?>
                    <a href="php/abonnement.php">Abonnement</a>
                </div>
            </nav>
        </div>
    </section>
    <!-- FIN DE LA BANNIERE -->

    <!-- PAGE PRINCIPALE -->
    <main>
        <div class="nous">
            <h3 id="Propos">À&nbspPROPOS</h3>
        </div>

        <div>
            <p id="blabla">Chez JeuxVente, vous trouverez tout le nécessaire pour passer un excellent moment de détente.
                Solo, à plusieurs, en famille ou entre amis, vous y trouverez
                assurément votre bonheur ! Tous les jeux vendus sont vérfiés par nos administrateurs afin de vous
                assurer la meilleure qualité possible. Pour tout problème, réclamation ou simple demande de contact,
                n'hésitez pas à utiliser notre formulaire de contact qui se trouve juste à côté de votre espace
                utilisateur ou en cliquant ici ! Sachez également que vous pouvez accéder à des
                avantages et offres promotionnelles en vous abonnant ici.
            </p>
        </div>
        <div id="meilleurs_ventes" class="container cta-100 ">
            <div class="container">
                <div class="row blog">
                    <div class="col-md-12">
                        <div id="blogCarousel" class="carousel slide container-blog" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#blogCarousel" data-slide-to="1"></li>
                            </ol>
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <?php
                                        require 'include/config.php';
                                        // Récupérer les informations des produits les plus commandés à partir de la requête SQL
                                        $query = "SELECT p.*
                                                    FROM produit p
                                                    JOIN (
                                                        SELECT id_produit, SUM(quantite) AS total_commande
                                                        FROM ligne_commande
                                                        GROUP BY id_produit
                                                        ORDER BY total_commande DESC
                                                        LIMIT 3
                                                    ) lc ON p.id = lc.id_produit";

                                        $stmt = $bdd->query($query);
                                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        $i = 1;
                                        // boucle pour afficher les informations des produits
                                        foreach ($results as $row) {
                                        ?>
                                        <div class="col-md-4">
                                            <div class="item-box-blog">
                                                <div class="item-box-blog-image">
                                                    <!--Date-->
                                                    <div class="item-box-blog-date bg-blue-ui white"> <span
                                                            class="mon">N°<?php echo $i; ?></span> </div>
                                                    <!--Image-->
                                                    <figure> <img src="<?php echo $row['image']; ?>"
                                                            alt="Image du produit"> </figure>
                                                </div>
                                                <div class="item-box-blog-body">
                                                    <!--Heading-->
                                                    <div class="item-box-blog-heading">
                                                        <h5><?php echo $row['nom']; ?></h5>
                                                    </div>
                                                    <!--Data-->
                                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                                        <p><?php echo $row['prix']; ?>€</p>
                                                    </div>
                                                    <!--Text-->
                                                    <div class="item-box-blog-text">
                                                        <p><?php echo $row['description']; ?></p>
                                                    </div>
                                                    <div class="mt"> <a onclick="ZOOM(<?php echo $row['id']; ?>)"
                                                            tabindex="0" class="btn bg-blue-ui white read">Plus de
                                                            détails</a> </div>
                                                    <!--Plus de détails Button-->
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <?php
                                        // Récupérer les informations des produits les plus commandés à partir de la requête SQL
                                        $query = "SELECT p.*
                                                    FROM produit p
                                                    JOIN (
                                                        SELECT id_produit, SUM(quantite) AS total_commande
                                                        FROM ligne_commande
                                                        GROUP BY id_produit
                                                        ORDER BY total_commande DESC
                                                        LIMIT 3 OFFSET 3
                                                    ) lc ON p.id = lc.id_produit";

                                            $stmt = $bdd->query($query);
                                            $i = 4;
                                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            // boucle pour afficher les informations des produits
                                            foreach ($result as $row) {
                                            ?>
                                        <div class="col-md-4">
                                            <div class="item-box-blog">
                                                <div class="item-box-blog-image">
                                                    <!--Date-->
                                                    <div class="item-box-blog-date bg-blue-ui white"> <span
                                                            class="mon">N°<?php echo $i; ?></span> </div>
                                                    <!--Image-->
                                                    <figure> <img src="<?php echo $row['image']; ?>"
                                                            alt="Image du produit"> </figure>
                                                </div>
                                                <div class="item-box-blog-body">
                                                    <!--Heading-->
                                                    <div class="item-box-blog-heading">
                                                        <h5><?php echo $row['nom']; ?></h5>
                                                    </div>
                                                    <!--Data-->
                                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                                        <p><?php echo $row['prix']; ?>€</p>
                                                    </div>
                                                    <!--Text-->
                                                    <div class="item-box-blog-text">
                                                        <p><?php echo $row['description']; ?></p>
                                                    </div>
                                                    <div class="mt"> <a onclick="ZOOM(<?php echo $row['id']; ?>)"
                                                            tabindex="0" class="btn bg-blue-ui white read">Plus de
                                                            détails</a> </div>
                                                    <!--Plus de détails Button-->
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
                            </div>
                        </div>
                        <!--.Carousel-->
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p id="blabla">JeuxVente regroupe plusieurs vendeurs, y compris des débutants. Bien sûr, nous vérifions le
                sérieux de chaque vendeur ainsi que la qualité de ses produits.
                Un article vous plait ? Rien de plus simple : cliquez sur le petit bouton en bas du produit et achetez
                le ! Vous voulez peut-être plus de détails concernant le produit ou encore
                en acheter en grande quantité ? Pas de problèmes : il suffit de cliquer sur l'image du produit et un
                meilleur affichage sera disponible.
            </p>
        </div>

    </main>
    <!-- FIN PAGE PRINCIPALE -->

    <!-- FOOTER -->
    <footer class="container-fluid footer">
        <div class="container">
            <div class="row">
                <h1 id="infos">Informations</h1>
                <iframe id="carte"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2615.8442200637187!2d2.064316615915703!3d49.03256977930504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6f578a5671b03%3A0x225d4d910fb39b53!2sCY%20Tech%20-%20Site%20Fermat!5e0!3m2!1sfr!2sfr!4v1679603546288!5m2!1sfr!2sfr"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                    <h2>Plan du site</h2>
                    <ul class="menuBas">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php#meilleurs_ventes">Meilleurs Ventes</a></li>
                        <?php 
                        require "include/config.php";
                        $sql = "SELECT id, libelle FROM categorie";
                        $resultat = $bdd->query($sql);
                        while ($row = $resultat->fetch()) {
                            echo "<li><a href='index.php?cat=".$row['id']."'>".$row['libelle']."</a></li>";
                        }?>
                        <li><a href="php/contact.php">Nous contacter</a></li>
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

                    <p class="images">

                        <img src="data/visa.png" alt="visa">
                        <img src="data/mastercard.png" alt="mastercard">
                        <img src="data/cb.png" alt="cb">

                    </p>
                </article>
                <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                    <h2>Suivre nos actualités </h2>
                    <div class="reseauxFooter">
                        <a class="reseauxFooter" href="https://twitter.com" target="_blank">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                        <a class="reseauxFooter" href="https://instagram.com" target="_blank">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                        <a class="reseauxFooter" href="https://github.com/An2sBRR/E-commerce" target="_blank">
                            <ion-icon name="logo-github"></ion-icon>
                        </a>
                    </div>
                </article>
            </div>
            <h3 id="copyright">
                Copyright © 2023
            </h3>
        </div>
    </footer>
    <!-- FIN DU FOOTER -->
    <?php
      include "php/fonction_index.php";
      affichage();
    ?>
</body>
</html>
