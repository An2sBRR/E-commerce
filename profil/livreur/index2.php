<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->

<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "livreur"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil livreur</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
</head>
<!-----EN TETE // MENU -------->
<body>
    <header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">LE REPÈRE DE MASS</div>
            </div>
            <div class="text-end">
                <a href="profil2.php" class="d-block link-dark text-decoration-none">
                    <i id="log-logo" class="bi bi-person-circle"></i>
                </a> 
            </div>
          </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <!-- BARRE DE NAVIGATION -->
            <?php include 'barre_navigation_lv.php'; ?>

            <!------------FIN MENU ---------------------->
            <main class="col overflow-auto h-100">
                <div class="bg-light border rounded-3 p-3">
                    <h2>Bienvenue sur votre espace Livreur // Préparateur </h2>
                    <p>L'un des avantages les plus importants de cette page est la capacité de surveiller l'évolution des colis en temps réel.</p> 
                    <hr/>
                </div>   
            </main>
        </div>
    </div>
</body>
</html>   
