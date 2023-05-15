<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "admin"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Admin</title>
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
                <div class="dropdown text-end"><a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i id="log-logo" class="bi bi-person-circle"></i></a></div>
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <!-- Barre de navigation -->
            <?php include 'barre_navigation_ad.php'; ?>
            <main class="col overflow-auto h-100">
                <div class="bg-light border rounded-3 p-3">
                    <!-- Affichage d'un titre de niveau 2 -->
                    <h2>Bienvenue sur votre espace Admin</h2>

                    <!-- Affichage d'un paragraphe de texte -->
                    <p>L'un des avantages les plus importants d'une page d'administration est la capacité de surveiller
                        l'évolution des ventes en temps réel. Vous pouvez donc suivre plus facilement vos ventes, votre
                        profil et le nombre d'inscrit sur votre espace analyse.</p>
                    <hr />
                </div>
            </main>
        </div>
    </div>
</body>
</html>
