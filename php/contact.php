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
    <title>Nous contacter</title>

    <link href="https://fonts.googleapis.com/css2?family=Boogaloo&display=swap" rel="stylesheet">
  
    <link rel="stylesheet" href="../css/contact.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- INCLUSION ICONS -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
</head>

<body>
    <header class="container-fluid header">
        <div class="container">
            <a href="../index.php" class="logo">LE REPÈRE DE MASS</a>
            <div class="icons">
                <?php 
                // REDIRECTIONS PAGES/CHANGEMENT AFFICHAGE LORS DU CLIC SUR LOGO SELON LE PROFIL UTILISATEUR
                if(!isset($_SESSION['statut'])){
                    echo "<a href='./panier.php' class='reseauxlog'><ion-icon name=cart></ion-icon> </a>";
                    echo "<a href='./co.php' class='reseauxlog'><ion-icon name=person></ion-icon> </a>";
                }else if($_SESSION['statut'] == "client"){
                    echo "<a href='./panier.php' class='reseauxlog'><ion-icon name=cart></ion-icon> </a>";
                    echo "<a href='../profil/client/profil_cl.php' class='reseauxlog'><ion-icon name=person></ion-icon> </a>";
                }
                else if ($_SESSION['statut'] == "admin"){
                    echo "<a href='./gestion_messages.php' class='reseauxlog'><ion-icon name=mail-unread-outline></ion-icon> </a>";
                    echo "<a href='../profil/admin/main_ad.php' class='reseauxlog'> <ion-icon name=flask-outline></ion-icon> </a>";
                    echo "<a href='./deconnexion.php' class='reseauxlog'><ion-icon name=power-outline></ion-icon> </a>";
                }else if($_SESSION['statut'] == "vendeur"){
                    echo "<a href='./contact.php' class='reseauxlog'><ion-icon name=mail-unread-outline></ion-icon> </a>";
                    echo "<a href='../profil/vendeur/main.php' class='reseauxlog'> <ion-icon name=storefront-outline></ion-icon> </a>";
                    echo "<a href='./deconnexion.php' class='reseauxlog'><ion-icon name=power-outline></ion-icon> </a>";
                }else if($_SESSION['statut'] == "livreur"){
                    echo "<a href='./contact.php' class='reseauxlog'><ion-icon name=mail-unread-outline></ion-icon> </a>";
                    echo "<a href='../profil/livreur/index2.php' class='reseauxlog'> <ion-icon name=bicycle-outline></ion-icon> </a>";
                    echo "<a href='./deconnexion.php' class='reseauxlog'><ion-icon name=power-outline></ion-icon> </a>";
                }
                ?>
            </div>
        </div>
    </header>
    <!-- FIN DU HEADER -->
    <div class="contenu">
        <!-- Formulaire de contact-->
        <div class="formulaire">
            <div class="contact-info">
                <h3 class="titre">L'équipe Le Repère De MASS à votre écoute!</h3>
                <p class="texte">
                    Pour toute remarque, complément d'information, problème ou réclamation,
                    nous vous invitons à remplir notre formulaire de contact.
                    Vous pouvez également faire un tour sur nos réseaux et nous envoyer un message privé dessus !
                </p>

                <!-- Infos pratiques -->
                <div class="info">
                    <div class="information">
                        <img src="../data/map.png" class="icone" />
                        <p>42 boulevard du port, 95100 CERGY</p>
                    </div>
                    <div class="information">
                        <img src="../data/email.png" class="icone" />
                        <p>RepèreDeMASS-contact@society.com</p>
                    </div>
                    <div class="information">
                        <img src="../data/tel.png" class="icone" />
                        <p> 01.77.88.92.99</p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Nous suivre :</p>
                    <div class="logos-reseaux">
                        <a href="https://twitter.com" target="_blank">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                        <a href="https://instagram.com" target="_blank">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                        <a href="https://github.com/Le-7/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA" target="_blank">
                            <ion-icon name="logo-github"></ion-icon>
                        </a>
                        <a href="https://pinterest.com" target="_blank">
                            <ion-icon name="logo-pinterest"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Partie de droite du formulaire de contact-->
            <div class="contact-formulaire">
                <span class="bulle un"></span>
                <span class="bulle deux"></span>

                <!-- Raccord au fichier traitement.php avec la méthode POST-->
                <form action="traitement_contact.php" method="post">
                    <h3 class="titre">Nous contacter</h3>

                    <div class="input-contenu">
                        <select name="utilisateur">
                            <option value="Client">Client</option>
                            <option value="Vendeur">Vendeur</option>
                            <option value="Livreur">Livreur</option>
                        </select>
                    </div>

                    <div class="input-contenu">
                        <input type="text" name="nom" class="input" placeholder="Nom prénom" />
                    </div>

                    <div class="input-contenu">
                        <input type="email" name="email" class="input" placeholder="Email" required />
                    </div>

                    <div class="input-contenu">
                        <input type="text" name="objet" class="input" placeholder="Objet" required />
                    </div>

                    <div class="input-contenu">
                        <input type="tel" name="tel" class="input" placeholder="Téléphone" required
                            pattern="^\d{10}$" />
                    </div>

                    <div class="input-contenu textarea">
                        <textarea name="message" class="input" placeholder="Votre message" required></textarea>
                    </div>

                    <input type="submit" name="envoyer" value="Envoyer" class="bouton" required />
                </form>
            </div>
        </div>
        <!-- Scripts pour utiliser ionicons-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<?php  
        #Récupération de la query dans l'url
        function getquery(){ $url = $_SERVER['REQUEST_URI'];
            return (parse_url($url, PHP_URL_QUERY)); }

        function affichageerror() {  #Fonction pour afficher les erreurs dans le formulaire
        $err = explode('=',getquery());
       
    }
        affichageerror();
    ?>
</html>
