<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/co.css">

    <link href="https://fonts.googleapis.com/css2?family=Boogaloo&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/co.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- INCLUSION ICONS -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />

    <title>Connexion</title>
</head>

<body>
    <header class="container-fluid header">
        <div class="container">
            <a href="../index.php" class="logo">JeuxVentes.fr</a>
            <div class="icons">
                <?php 
                // REDIRECTIONS PAGES/CHANGEMENT AFFICHAGE LORS DU CLIC SUR LOGO SELON LE PROFIL UTILISATEUR
                if(!isset($_SESSION['statut'])){
                    echo "<a href='php/panier.php' class='reseauxlog'><ion-icon name=cart></ion-icon> </a>";
                    echo "<a href='./contact.php' class='reseauxlog'><ion-icon name=chatbubbles></ion-icon> </a>";
                }else if($_SESSION['statut'] == "client"){
                    echo "<a href='php/panier.php' class='reseauxlog'><ion-icon name=cart></ion-icon> </a>";
                    echo "<a href='../profil/client/profil_cl.php' class='reseauxlog'><ion-icon name=person></ion-icon> </a>";
                    echo "<a href='./contact.php' class='reseauxlog'><ion-icon name=chatbubbles></ion-icon> </a>";
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
    <main>
        <div class="form-box">
            <!--Pour afficher un message d'erreur--->
            <?php 
//On verifie si le get existe
                if(isset($_GET['login_err'])){
                    $err = htmlspecialchars($_GET['login_err']);
/*on utilise un switch : c'est a dire si le mdp est incorrect un message va s'afficher
sinon si le mail est eroné, un message s'affiche
sinon affiche compte non existant
*/
                    switch($err){
                        case 'success':
                            ?>
            <div class="alert alert-success">
                <strong>Succès</strong> Inscription réussie !
            </div> <?php
                            break;
                        case 'password':
            ?>
            <div class="alert alert-danger">
                <strong>Erreur</strong> Mot de passe incorrect
            </div><?php
                        break;
                        case 'email':
            ?> <div class="alert alert-danger">
                <strong>Erreur</strong> Email incorrect
            </div><?php
                break;
                case 'already':
             ?><div class="alert alert-danger">
                <strong>Erreur</strong> Compte non existant
            </div><?php
                break;
                    }}
            ?>

            <form action="connexion.php" method="post">
                <h2>Se connecter</h2>
                <div class="social-media">
                    <p><i class="fab fa-google"></i></p>
                    <p><i class="fab fa-facebook-f"></i></p>
                    <p><i class="fab fa-apple"></i></p>
                </div>
                <p class="choose-email">ou utiliser mon adresse e-mail :</p>
                <div class="inputs">
                    <input type="email" name="email" placeholder="Email &#128233" required="required"
                        autocomplete="off">
                    <input type="password" type="password" name="password" placeholder="Password &#x1F512"
                        required="required" autocomplete="off">
                </div>
                <p class="inscription">Je n'ai pas encore de <span>compte</span>. Je m'en <span><a
                            href="inscription.php">crée</span> un.</a></p>
                <button type="submit" class="btn btn-dark btn-block">Connexion</button>
            </form>
        </div>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
