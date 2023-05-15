<!-- On a securisé la page c'est a dire le client a acces qu'au page client que si il est connecté 
sinon l'utilisateur est redirigé sur la page index -->

<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "client"){
        header('Location: ../../index.php');
    }
?>
<!-- permet d'avoir le menu de la page client -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Client</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box">
        <div class="container-fluid col-11" id="header-container">
            <div class=" d-flex align-items-center justify-content-between">
                <div class="py-3 col-sm-auto justify-content-center">
                    <div id="title">JeuxVente.fr</div>
                </div>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i id="log-logo" class="bi bi-person-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2">
                <div class="bg-light border rounded-3 p-1 h-100 sticky-top">
                    <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate">

                        <li class="my-1">
                            <a href="../../index.php" class="nav-link px-2 text-truncate">
                                <i class="bi bi-house fs-5"></i>
                                <span class="d-none d-sm-inline">Accueil</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="profil_cl.php" class="nav-link px-2 text-truncate">
                                <i class="bi bi-layout-text-sidebar-reverse"></i></i>
                                <span class="d-none d-sm-inline">Mon profil</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="commande.php" class="nav-link px-2 text-truncate"><i
                                    class="bi bi-card-text fs-5"></i>
                                <span class="d-none d-sm-inline">Commandes</span> </a>
                        </li>

                        <li class="my-1 nav-item">
                        <li><a href="politique.php" class="nav-link px-2 text-truncate"><i
                                    class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Politiques</span> </a></li>
                        </li>
                        <ul><a href="#0" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Livraison</span> </a></li>
                        </ul>

                        <ul><a href="#1" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Politique de retour</span> </a></li>
                        </ul>

                        <ul><a href="#2" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Politique de confidentialité</span> </a></li>
                        </ul>

                        <a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-toggle-off"></i></i>
                            <span class="d-none d-sm-inline">Déconnexion</span>
                        </a>
                    </ul>
                </div>
            </aside>
            <!-----FIN DU MENU ----->
            <main class="col overflow-auto h-100 w-100">
                <div class="bg-light border rounded-3 p-3">
                    <a name="0">
                        <div class="d-flex justify-content-center">
                            <h2>Livraison</h2>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h3>Temps de préparation : 1-3 jours</h3>
                        </div>
                        <br>
                        <!---- Cette partie concerne le mode de livraison, il explique toutes les conditions ---->
                        <table>
                            <tr colspan="3" style="background-color: #D3D3D3;">
                                <th>Mode de livraison</th>
                                <th>Temps de livraison</th>
                                <th>Frais</th>
                            </tr>
                            <tr>
                                <td>Livraison Standard</td>
                                <td>5 jours ouvrables</td>
                                <td>5.00€—Pour chaque livraison<br> Gratuit—Avec l'abonnement.</td>
                            </tr>
                            <tr>
                                <td>Livraison en Point Relais</td>
                                <td>5-6 jours ouvrables</td>
                                <td>2.00€—Pour chaque livraison<br> Gratuit—Avec l'abonnement.</td>
                            </tr>
                            <tr>
                                <td>Livraison Express</td>
                                <td>1-2 jours ouvrables</td>
                                <td>8.00€</td>
                            </tr>
                        </table>
                        <p>Les frais de livraison sont susceptibles d'être modifiés sans préavis. Veuillez vous référer
                            à la page de paiement pour obtenir les frais de livraison actuels.</td>
                            </tr><br>
                            <p>Si vous constatez que :</p>
                            <ol>
                                <li>Votre colis n'a pas été livré dans les délais prévus</li>
                                <li>Les informations de suivi indiquent que le colis a été livré mais que vous ne l'avez
                                    pas reçu</li>
                                <li>Votre colis contient des articles manquants/incorrects</li>
                            </ol>
                            <p>Veuillez contacter le service clientèle dans les 45 jours suivant la date de paiement
                                afin que les problèmes susmentionnés puissent être résolus. Pour les autres commandes,
                                les produits et les problèmes liés à la logistique, veillez à contacter le service
                                clientèle dans les 90 jours suivant la date de la commande, cela n'affecte pas vos
                                droits statutaires.</p>
                            <p>Nous vous informons que la livraison en point relais Mondial Relay est rétablie dès
                                maintenant. Cependant, certains centres restent fermées ou rajustent leurs heures
                                d’ouverture. Veuillez vérifier au préalable sur le site du Mondial Relay si votre point
                                relais habituel est ouvert.</p>
                            <p>Veuillez cliquer sur le bouton "Confirmer la livraison" dans les 6 mois à compter de la
                                date d'expédition. Après cela, le bouton deviendra gris et ne pourra plus être utilisé
                                pour obtenir des points supplémentaires.</p>
                            <p>Dans la plupart des cas, le colis sera livré dans les délais estimés. Cependant, la date
                                réelle de livraison peut être changée par les vols, les conditions météorologiques ou
                                d'autres facteurs externes. Veuillez-vous référer aux informations de suivi pour une
                                date de livraison plus précise.</p>
                    </a>
                    <!---- Cette partie concerne le retour des articles, il explique toutes les conditions et le temps de preparation ---->
                    <div class="d-flex justify-content-center">
                        <h2>Retour</h2>
                    </div>
                    <a name="1">
                        <div class="d-flex justify-content-center">
                            <h3>Temps de préparation : 1-3 jours</h3>
                        </div>
                        <br>

                        <h5><strong>Combien de temps puis-je effectuer un retour et dois-je payer les
                                frais?</strong></h5>
                        <p>Voici les politiques de retour pour les commandes en France métropolitaine :</p>
                        <ol>
                            <li>Utilisez votre étiquette de retour dans les 45 jours qui suivent l’achat, nous
                                prendrons en charge les frais de livraison.</li>
                            <li>La première étiquette de retour est gratuite par commande. Pour plus d'une
                                étiquette de retour sur la même commande, les frais de retour seront de 4,5 €
                                par colis supplémentaire, qui seront déduits dans votre remboursement.</li>
                            <li>Vous pouvez aussi faire le retour via votre transporteur local mais à vos frais.
                            </li>
                        </ol>
                        <h5><strong>Comment trouver l'étiquette de retour appliquée ?</strong></h5>
                        <p>Trouvez votre commande dans "Mes commandes" → Cliquez sur "Détails de la commande" en
                            haut à droite → Cliquez sur "Voir" pour télécharger.</p>
                        <h5><strong>Puis-je retourner des Produits endommagés ?</strong></h5>
                        <ol>
                            <li>Les Produits doivent être renvoyés dans leur emballage d'origine et en parfait
                                état. Si l'article a été taché, endommagé ou utilisé, le retour ou l'échange
                                sera refusé.</li>
                            <li>Veuillez noter que les Produits en liquidation/déstockage, les cadeaux ainsi que
                                les Produits indiqués comme non retournables ne peuvent être ni repris, ni
                                échangés, mais cela n'affecte pas vos droits statutaires.</li>
                            <li>Si vous avez reçu un article défectueux/endommagé/incorrect, veuillez contacter
                                le service clientèle SHEIN, nous vous fournirons une solution approprié, cela
                                n'affecte pas vos droits statutaires.</li>
                        </ol>
                        <p><em>*Vérifiez bien vos retours avant de les envoyer. Nous ne sommes pas responsables
                                des retours de produits qui ne viennent pas de notre site.</em></p>
                        <h5><strong>Comment puis-je obtenir mon remboursement?</strong></h5>
                        <ol>
                            <li>Les remboursements sont généralement traités dans les 7 jours ouvrés suivant la
                                réception de votre colis de retour.</li>
                            <li>Si vous n'en avez pas convenu autrement avec notre Service Client :
                                </p>
                                <ul>
                                    <li>tout remboursement lié à la résolution du contrat de vente pendant le délai de
                                        rétractation légal (14 jours), sera effectué dans les conditions spécifiées à
                                        l’article
                                        8 des CGV directement sur la carte qui a servi au paiement.</li>
                                    <li>tout remboursement résultant de notre extension du délai de rétractation légal
                                        (45
                                        jours), sera effectué dans les conditions spécifiées à l’article 9 des CGV
                                        directement
                                        en tant que « Crédit » sur votre Compte Client ou directement sur la carte qui a
                                        servi
                                        au paiement. Vous pourrez ensuite déduire le montant de votre remboursement de
                                        votre
                                        prochaine commande.</li>
                                </ul>
                                <p>Dès que votre remboursement sera effectué, vous recevrez un e-mail de confirmation.
                                </p>
                                <strong><em>REMARQUE : Si vous avez des problèmes avec votre retour, veuillez contacter
                                        le
                                        Service Client dans les 90 jours suivant votre commande, une fois que le délai
                                        est
                                        dépassé, nous ne pourrons plus traiter votre demande de
                                        retour.</em></strong><br><br>

                                <div style="text-align:center;">
                                    <a href="commande.php"
                                        style="background-color: #000000; color: white; padding: 12px 24px; text-decoration: none; display: inline-block; border-radius: 4px; font-size: 18px;">Commencer
                                        votre retour</a>
                                </div>
                    </a>
                    <!---- Cette partie concerne les politiques de confidentialité, il explique toutes les conditions ---->
                    <div class="bg-light border rounded-3 p-3">
                        <a name="2">
                            <div class="d-flex justify-content-center">
                                <h2>Politique de confidentialité</h2>
                            </div>
                            </br>
                            <p>Nous accordons une grande importance à la protection de vos données personnelles et à
                                la confidentialité de vos informations. Cette politique de confidentialité explique
                                comment <strong><em>nous recueillons, utilisons et partageons vos données
                                        personnelles</strong></em>lorsque vous utilisez notre site e-commerce.</p>
                            <strong>Collecte de données personnelles</strong>
                            <p>Nous recueillons les données personnelles que vous nous fournissez lorsque vous créez
                                un compte sur notre site e-commerce, lorsque vous passez une commande, lorsque vous
                                contactez notre service clientèle ou lorsque vous vous inscrivez à notre newsletter.
                                Ces données peuvent inclure votre nom, votre adresse e-mail, votre adresse de
                                livraison, votre numéro de téléphone, vos informations de paiement et d'autres
                                informations que vous choisissez de nous fournir.</p>
                            <strong>Utilisation des données personnelles</strong>
                            <p>Nous utilisons vos données personnelles pour traiter vos commandes, pour communiquer
                                avec vous au sujet de vos commandes, pour personnaliser votre expérience d'achat sur
                                notre site e-commerce et pour vous envoyer des offres promotionnelles ou des
                                informations sur nos produits et services. Nous pouvons également utiliser vos
                                données personnelles pour améliorer notre site e-commerce, pour prévenir la fraude
                                et pour assurer la sécurité de nos utilisateurs.</p>
                            <strong>Partage des données personnelles</strong>
                            <p>Nous ne partageons pas vos données personnelles avec des tiers, sauf si cela est
                                nécessaire pour traiter vos commandes ou si nous sommes légalement tenus de le
                                faire. Nous pouvons partager vos données personnelles avec nos fournisseurs de
                                services tiers qui nous aident à traiter les paiements, à expédier les commandes et
                                à fournir des services de support clientèle.</p>
                            <strong>Sécurité des données personnelles</strong>
                            <p>Nous prenons des mesures de sécurité raisonnables pour protéger vos données
                                personnelles contre les accès non autorisés, les pertes ou les modifications.
                                Toutefois, nous ne pouvons garantir la sécurité absolue de vos données personnelles.
                            </p>
                            <strong>Droit d'accès, de rectification et de suppression des données
                                personnelles</strong>
                            <p>Vous avez le droit d'accéder à vos données personnelles que nous avons enregistrées,
                                de les corriger si elles sont inexactes ou de demander leur suppression. Si vous
                                avez des questions ou des préoccupations concernant notre politique de
                                confidentialité ou la gestion de vos données personnelles, veuillez nous contacter à
                                l'adresse e-mail fournie sur notre site e-commerce.</p>

                            <em>Nous pouvons mettre à jour cette politique de confidentialité de temps à autre. Nous
                                vous informerons de toute modification importante de cette politique de
                                confidentialité par e-mail ou par une notification sur notre site e-commerce.</em>

                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
