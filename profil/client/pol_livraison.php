
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Espace Client</title><link href="../css/bootstrap.css" rel="stylesheet"><link href="test.css" rel=stylesheet><link href="../css/bootstrap-icons.css" rel="stylesheet"><link href="../css/sidenav.css" rel="stylesheet"><link href="../css/header2.css" rel="stylesheet"><link href="../css/index.css" rel="stylesheet"><link href="../css/profilpage.css" rel="stylesheet"><script src="../js/bootstrap.js"></script><script src="../js/plotly-2.18.2.min.js"></script><script src="../js/graph.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">JeuVente.fr</div>
            </div>
            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <a href="commande.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i>
                                <span class="d-none d-sm-inline">Commandes</span> </a>
                        </li>
                        <li class="my-1">
                            <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-calendar2-check"></i></i>
                                <span class="d-none d-sm-inline">Service client</span> </a>
                        </li>
                        <il class="my-1 nav-item">
                            <li><a href="politique.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Politiques</span> </a></li>
                            </il>
                                <ul><a href="pol_livraison.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Livraison</span> </a></li></ul>

                                <ul><a href="pol_retour.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Politique de retour</span> </a></li></ul>

                                <ul><a href="poli_conf.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Politique de confidentialité</span> </a></li></ul>
    
                        <a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate">
                        <i class="bi bi-toggle-off"></i></i>
                                <span class="d-none d-sm-inline">Déconnexion</span>
                        </a>
                    </ul>
                </div>
            </aside>
            <main class="col overflow-auto h-100 w-100">
                <div class="bg-light border rounded-3 p-3">
                <div class="d-flex justify-content-center"><h2>Livraison</h2></div>
                <div class="d-flex justify-content-center"><h3>Temps de préparation : 1-3 jours</h3></div>
                <br>

<table>
  <tr colspan="3" style="background-color: #D3D3D3;"><th>Mode de livraison</th><th>Temps de livraison</th><th>Frais</th></tr>
  <tr><td>Livraison Standard</td><td>5 jours ouvrables</td><td>5.00€—Pour chaque livraison<br> Gratuit—Avec l'abonnement.</td></tr><tr>
    <td>Livraison en Point Relais</td><td>5-6 jours ouvrables</td><td>2.00€—Pour chaque livraison<br> Gratuit—Avec l'abonnement.</td></tr>
  <tr> <td>Livraison Express</td><td>1-2 jours ouvrables</td><td>8.00€</td></tr></table>
  <p>Les frais de livraison sont susceptibles d'être modifiés sans préavis. Veuillez vous référer à la page de paiement pour obtenir les frais de livraison actuels.</td></tr><br>
  <p>Si vous constatez que :</p>
<ol>
    <li>Votre colis n'a pas été livré dans les délais prévus</li><li>Les informations de suivi indiquent que le colis a été livré mais que vous ne l'avez pas reçu</li><li>Votre colis contient des articles manquants/incorrects</li>
</ol>
<p>Veuillez contacter le service clientèle dans les 45 jours suivant la date de paiement afin que les problèmes susmentionnés puissent être résolus. Pour les autres commandes, les produits et les problèmes liés à la logistique, veillez à contacter le service clientèle dans les 90 jours suivant la date de la commande, cela n'affecte pas vos droits statutaires.</p>
<p>Nous vous informons que la livraison en point relais Mondial Relay est rétablie dès maintenant. Cependant, certains centres restent fermées ou rajustent leurs heures d’ouverture. Veuillez vérifier au préalable sur le site du Mondial Relay si votre point relais habituel est ouvert.</p>
<p>Veuillez cliquer sur le bouton "Confirmer la livraison" dans les 6 mois à compter de la date d'expédition. Après cela, le bouton deviendra gris et ne pourra plus être utilisé pour obtenir des points supplémentaires.</p>
<p>Dans la plupart des cas, le colis sera livré dans les délais estimés. Cependant, la date réelle de livraison peut être changée par les vols, les conditions météorologiques ou d'autres facteurs externes. Veuillez-vous référer aux informations de suivi pour une date de livraison plus précise.</p>
