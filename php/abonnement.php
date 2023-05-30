<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->

<?php
    session_start();
    $_SESSION['page_abo']=true;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- POLICE -->
    <link href="https://fonts.googleapis.com/css2?family=Boogaloo&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/abonnement.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- INCLUSION ICONS -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <title>Notre Abonnement</title>
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
                    echo "<a href='./co.php' class='reseauxlog'><ion-icon name=person></ion-icon> </a>";
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
        <?php if(getAbonnement() == 0 || getAbonnement() == 2){
        echo '<div class="description">
        <p class="head">Notre abonnement</h1>
        <p class="texte">Venez découvrir notre nouvel abonnement qui vous récompensera de votre fidélité avec de nombreux avantages ! </p>
    </div>
    <div class="abonnement">
        <ul>
            <li class="titre">Abonnement Premium</li>
            <li class="couleur">9,99€ par an</li>
            <li>Accès à une réduction de 10% sur votre commande</li>
            <li>Accès anticipé pour nos nouvelles sorties</li>
            <li>Livraison offerte sans minimum d\'achat</li>
            <li>Accès annuel</li>
            <li class="couleur"><button class="button" type="button" onclick="location.href=\'recap_abo.php\'">M\'abonner</button></li>
        </ul>
    </div>';
        }else {
            echo '<div class="description"> <p class="head">Vous êtes abonné à notre service d\'abonnement !</p>
            <p class="abonnement">Si vous souhaitez vous désabonner, appuyez sur le bouton suivant. <br>(Tout désabonnement est définitif, ainsi si vous souhaitez vous réabonner il faudra repayer le prix annuel)</p></div>
            <input type="button" class="desabonnement" onclick="location.href=\'fin_abo.php\'" value="Je me désabonne !"></input>' ;
        }
        ?>
    </main>
</body>

</html>
<?php 
function getAbonnement(){
    require '../include/config.php';
    if(isset($_SESSION['user'])){
        $req = "SELECT abonnement FROM utilisateurs WHERE token='".$_SESSION['user']."'";
        $stmt = $bdd->prepare($req);
        $stmt->execute();
        $data = $stmt->fetchColumn();
        return $data;
    }else return 2; //il n'est pas connecte
}
?>
