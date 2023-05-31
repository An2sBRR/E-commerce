<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
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
    <title>Liste vendeurs</title>
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
                    <div id="title">LE REPÈRE DE MASS</div>
                </div>
                <div class="text-end">
                    <a href="main_ad.php" class="d-block link-dark text-decoration-none">
                        <i id="log-logo" class="bi bi-person-circle"></i>
                    </a> 
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <!-- Barre de navigation -->
            <?php include 'barre_navigation_ad.php'; ?>
            
            <main class="col overflow-auto h-100 w-100">
                <div class="container py-2">
                    <h2>Liste des vendeurs</h2>
                    <!-- Création d'une table pour afficher les vendeurs -->
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <!-- Création de l'en-tête du tableau -->
                                <th>#ID</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Pseudo</th>
                                <th>Ville</th>
                                <th>Opérations</th>
                            </tr>
                        </thead>

                        <?php
                            // Connexion à la base de données
                            require_once '../../include/config.php';

                            // Exécution d'une requête SQL pour récupérer toutes les informations des utilisateurs
                            $req = $bdd->query("SELECT * FROM utilisateurs");

                            // Vérification si la requête a retourné des résultats
                            if ($req->rowCount() > 0) {
                                // Parcours de chaque utilisateur retourné par la requête
                                while($utilisateurs = $req->fetch()) {
                                    // Vérification si l'utilisateur est un vendeur
                                    if($utilisateurs["statut"] == "vendeur"){
                                        // Affichage des informations du vendeur dans le tableau
                                        echo "<tr>
                                                <td>".$utilisateurs["id"]."</td>
                                                <td>".$utilisateurs["nom"]."</td>
                                                <td>".$utilisateurs["prenom"]."</td>
                                                <td>".$utilisateurs["pseudo"]."</td>
                                                <td>".$utilisateurs["ville"]."</td>

                                                <td>
                                                    <!-- Bouton pour supprimer le vendeur -->
                                                    <a  class='btn btn-primary' href='supp_vendeur.php?id=".$utilisateurs["id"]."' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce vendeur?');\">Supprimer</a>
                                                </td>
                                            </tr>";
                                    }
                                }
                            }
                        ?>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
