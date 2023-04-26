<!-- On a securisé la page c'est a dire le vendeur a acces qu'au page vendeur que si il est connecté 
sinon l'utilisateur est redireigé sur la page index -->
<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "vendeur"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un vendeur</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plotly-2.18.2.min.js"></script>
    <script src="../js/graph.js"></script>
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
                            <a href="analyse.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-graph-up"></i></i>
                                <span class="d-none d-sm-inline">Analyse</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="categorie.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-layout-text-sidebar-reverse"></i></i>
                                <span class="d-none d-sm-inline">Liste des categories</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="produit.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i>
                                <span class="d-none d-sm-inline">Liste des produits</span> </a>
                        </li>
                        <li class="my-1  nav-item">
                            <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Profil</span> </a>
                        </li>
                        <a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate">
                        <i class="bi bi-toggle-off"></i></i>
                            <span class="d-none d-sm-inline">Déconnexion</span>
                        </a>
                    </ul>
                </div>
            </aside>
            <main class="col overflow-auto h-100 w-100">
                <div class="bg-light border rounded-3 p-3">
                    <h2>Votre Profil :</h2>
                    <div class="d-flex justify-content-center">
                        <i id="log-logo1" class="bi bi-person-circle"></i>
                    </div>
                    <div class="d-flex justify-content-center"><h3>
                    <?php 
                            require '../../include/config.php';
                            $requete = $bdd->prepare('SELECT nom, prenom FROM utilisateurs WHERE token = ?');
                            $requete->execute([$_SESSION['user']]);
                            $resultat = $requete->fetch();
                            echo ucfirst($resultat['prenom'])." ";
                            echo ucfirst($resultat['nom']);
                        ?></h3>
                    </div>
                        <h4>Information personnel :</h4>
                        <div class="container">
                      <div class="col-md-12">
                    <p> Pseudo : <strong><?php 
                            require '../../include/config.php';
                            $requete = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE token = ?');
                            $requete->execute([$_SESSION['user']]);
                            $resultat = $requete->fetch();
                            echo ucfirst($resultat['pseudo'])." ";
                        ?></strong></p>

                        <p> adresse mail :<strong> <?php 
                            require '../../include/config.php';
                            $requete = $bdd->prepare('SELECT email FROM utilisateurs WHERE token = ?');
                            $requete->execute([$_SESSION['user']]);
                            $resultat = $requete->fetch();
                            echo ucfirst($resultat['email'])." ";
                        ?></strong></p>
                    <p> Ville : <strong><?php 
                            require '../../include/config.php';
                            $requete = $bdd->prepare('SELECT ville FROM utilisateurs WHERE token = ?');
                            $requete->execute([$_SESSION['user']]);
                            $resultat = $requete->fetch();
                            echo ucfirst($resultat['ville'])." ";
                        ?></strong></p>
                      </div>
                        <p>Pour accéder à votre contrat, cliquez ici :<a href="contrat.php" target="_blank" class="btn">Accéder au contrat</a></br>
                        <em> Attention : vous devez telecharger votre contrat après l'avoir signé et l'envoyer par mail a notre adresse </em></p>

                </div>   
            </main>
        </div>
    </div>
</body>
</html>
