<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "vendeur"){
        header('Location: ../../index.php');
    }
    include 'fin_contrat.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Profil</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">JeuxVente.fr</div>
            </div>
            <div class="text-end">
              <a href="profil.php" class="d-block link-dark text-decoration-none">
                <i id="log-logo" class="bi bi-person-circle"></i>
              </a> 
            </div>
          </div>
        </div>
      </header>
      <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <?php include 'barre_navigation_vd.php';?>
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

                        <p> Adresse mail :<strong> <?php 
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
                        <em> Attention : vous devez télécharger votre contrat après l'avoir signé et l'envoyer par mail à notre adresse</em></p>

                </div>   
            </main>
        </div>
    </div>
</body>
</html>
