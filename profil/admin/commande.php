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
    <title>Votre Profil</title>
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
            <?php include 'barre_navigation_ad.php';?>
            <!-- Début de la section principale du contenu du site -->
            <main class="col overflow-auto h-100 w-100">
                <!-- Création d'un conteneur pour le contenu -->
                <div class="container py-2">
                    <!-- Création d'un autre conteneur pour le contenu -->
                    <div class="container py-2">
                        <!-- Affichage du titre de la page -->
                        <h2>Liste des commandes</h2>
                        <!-- Création d'un tableau pour afficher les commandes -->
                        <table class="table table-striped table-hover">
                            <!-- En-tête du tableau -->
                            <thead>
                                <tr>
                                    <!-- Noms des colonnes du tableau -->
                                    <th>#ID</th>
                                    <th>Client</th>
                                    <th>Numéro commande</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Etat</th>
                                    <th>Opérations</th>
                                </tr>
                            </thead>
                            <!-- Corps du tableau -->
                            <tbody>
                                <?php
                    // Connexion à la base de données
                    require_once '../../include/config.php'; 

                    // Exécution d'une requête SQL pour obtenir toutes les commandes et les informations des utilisateurs correspondants
                    $commandes = $bdd->query('SELECT commande.*,utilisateurs.pseudo as "pseudo" FROM commande INNER JOIN utilisateurs ON commande.id_client = utilisateurs.id ORDER BY commande.date_creation DESC')->fetchAll(PDO::FETCH_ASSOC);

                    // Boucle pour afficher chaque commande dans une ligne du tableau
                    foreach ($commandes as $commande) {
                    ?>
                        <tr>
                            <!-- Affichage de l'ID de la commande -->
                            <td><?php echo $commande['id'] ?></td>
                            <!-- Affichage du pseudo de l'utilisateur -->
                            <td><?php echo $commande['pseudo'] ?></td>
                            <!-- Affichage du numéro de la commande -->
                            <td><?php echo $commande['numero_commande'] ?></td>
                            <!-- Affichage du total de la commande avec une icône de dollar -->
                            <td><?php echo $commande['total'].' €' ?> </td>
                            <!-- Affichage de la date de création de la commande -->
                            <td><?php echo $commande['date_creation'] ?></td>
                            <!-- Affichage de l'état de la commande -->
                            <td><?php 
                                if($commande['valide'] == 1){
                                    echo "Validation de l'admin"; 
                                }else echo "En attente...";
                            ?>
                            </td>
                            <!-- Affichage d'un lien pour afficher les détails de la commande -->
                            <td><a class="btn btn-primary btn-sm" href="afficher_commande.php?id=<?php echo $commande['id']?>">Afficher détails</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                        </tbody>
                    </table>
                </div></div>
                <!-- Fermeture de la section principale -->
            </main>
            <!-- Fermeture du corps de la page HTML -->
        </div>
    </div>
</body>
<!-- Fermeture du document HTML -->
</html>
