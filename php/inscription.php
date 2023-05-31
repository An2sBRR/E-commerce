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
    <title>Inscription</title>
</head>

<body>
    <header class="container-fluid header">
        <div class="container">
            <a href="../index.php" class="logo">LE REPÈRE DE MASS</a>
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
    
    <div class="login-form">
        <div class="texte">Créer votre compte et rejoignez l'aventure !</div>
        <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);
/*on fait un switch pour l'inscription : si tout est reussit alors afficher succes,
sinon si le mdp est different du 2eme : affiche mot de passe incorect
sinon si le mail est trop long ou @ > 100 : attention trop long / pas valide
de meme pour le pseudo qui doit etre inferieur a 100
sinon le compte existe deja*/
                    switch($err)
                    {
                        case 'password':
                        ?><div class="alert alert-danger">
            <strong>Erreur</strong> mot de passe différent
        </div><?php
                        break;
                        case 'email':
                        ?><div class="alert alert-danger">
            <strong>Erreur</strong> email non valide
        </div><?php
                        break;
                         case 'email_length':
                        ?><div class="alert alert-danger">
            <strong>Erreur</strong> email trop long
        </div><?php 
                        break;
                        case 'pseudo_length':
                        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> pseudo trop long
        </div> <?php 
                        break;
                        case 'nom_length':
                        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> nom trop long
        </div><?php 
                        break;
                        case 'prenom_length':
                        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> prenom trop long
        </div> <?php 
                        case 'already':
                        ?><div class="alert alert-danger">
            <strong>Erreur</strong> compte deja existant
        </div>
        <?php 
                    }
                }
                ?>
        <!--creation du formulaire d'inscription--->

        <form action="inscription_traitement.php" method="post">
            <h2>Inscription </h2>
            <div class="inputs">
                <select name="statut" class="statut">
                    <option value="client">Client</option>
                    <option value="vendeur">Vendeur</option>
                    <option value="livreur">Livreur</option>
                </select>
                <input type="text" name="nom" placeholder="Nom" required="required" autocomplete="off">
                <input type="text" name="prenom" placeholder="Prénom" required="required" autocomplete="off">
                <input type="text" name="pseudo" placeholder="Pseudo" required="required" autocomplete="off">
                <input type="text" name="ville" placeholder="Ville" required="required" autocomplete="off">
                <input type="email" name="email" placeholder="Email" required="required" autocomplete="off">
                <input type="password" name="password" placeholder="Mot de passe" required="required"
                    autocomplete="off">
            </div>
            <!--verifier que l'email est valide c'est a dire : pas dans la base de donnée et les deux mp soient valide--->
            <div class="inputs">
                <input type="password" name="password_retype" placeholder="Re-tapez le mot de passe" required="required"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark btn-block">Inscription</button>
            </div>

        </form>
    </div>
</body>

</html>