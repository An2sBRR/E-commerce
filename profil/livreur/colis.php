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
    <title>Liste des Colis</title>
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
    <header class="shadow rounded-3 bg-light" id="header-box">
        <div class="container-fluid col-11" id="header-container">
            <div class=" d-flex align-items-center justify-content-between">
                <div class="py-3 col-sm-auto justify-content-center">
                    <div id="title">JeuxVente.fr</div>
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
            <main class="col overflow-auto h-100 w-100">
                <div class="container py-2">
                    <div class="container py-2">
                        <h2>Colis à livrer</h2>
                        <table class="table table-striped table-hover">

                            <!------------on fait un tableau qui va permettre d'afficher la liste de nos colis qui sont à livrer---------------------->
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Numéro commande</th>
                                    <th>Adresse livraison</th>
                                    <th>Code postal</th>
                                    <th>Date</th>
                                    <th>Statut </th>
                                    <th>Opérations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //connexion à la base de données
                                    require_once '../../include/config.php'; 
                                    //requete sql pour prendre eles données de la table
                                    $commandes = $bdd->query('SELECT commande.*, utilisateurs.pseudo as "pseudo" FROM commande INNER JOIN utilisateurs ON commande.id_client = utilisateurs.id WHERE commande.id_livreur = (SELECT id FROM utilisateurs WHERE token = "'.$_SESSION['user'].'") AND commande_livre = 0 ORDER BY commande.date_creation DESC')->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($commandes as $commande) {
                                ?>
                                <tr>

                                    <td><?php echo $commande['id']?></td>
                                    <td><?php echo $commande['numero_commande'] ?></td>
                                    <td><?php echo $commande['adresse_livraison']?></td>
                                    <td><?php echo $commande['code_postal']?></td>
                                    <td><?php echo $commande['date_creation']?></td>
                                    <td><?php 
                                        //si la commande est validé, un 1 apparait dans la base de donnée, alors on marque "validé"
                                        if($commande['valide'] == 1)
                                        {
                                            echo "Validé"; 
                                        }else echo "En attente...";
                                        ?>
                                    </td>
                                    <?php
                                        //si la commande est validé par l'admin alors le livreur a acces aux informations personnel
                                        if($commande['valide'] == 1){
                                            echo "<td><a class='btn btn-primary btn-sm' href='afficher_com_lv.php?id=".$commande['id']."'>Afficher détails</a></td>";

                                        }
                                    }?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="container py-2">
                        <h2>Colis déjà livrés</h2>
                        <table class="table table-striped table-hover">

                            <!------------on fait un tableau qui va permettre d'afficher la liste de nos colis livré---------------------->
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Numéro commande</th>
                                    <th>Adresse livraison</th>
                                    <th>Code postal</th>
                                    <th>Date</th>
                                    <th>Statut </th>
                                    <th>Opérations</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    //connexion à la base de données
                                    require_once '../../include/config.php'; 
                                    //requete sql pour prendre eles données de la table
                                    $commandes = $bdd->query('SELECT commande.*, utilisateurs.pseudo as "pseudo" FROM commande INNER JOIN utilisateurs ON commande.id_client = utilisateurs.id WHERE commande.id_livreur = (SELECT id FROM utilisateurs WHERE token = "'.$_SESSION['user'].'") AND commande_livre = 1 ORDER BY commande.date_creation DESC')->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($commandes as $commande) {
                                ?>
                                <tr>

                                    <td><?php echo $commande['id']?></td>
                                    <td><?php echo $commande['numero_commande'] ?></td>
                                    <td><?php echo $commande['adresse_livraison']?></td>
                                    <td><?php echo $commande['code_postal']?></td>
                                    <td><?php echo $commande['date_creation']?></td>
                                    <td><?php 
                                        //si la commande est validé, un 1 apparait dans la base de donnée, alors on marque "validé"
                                        if($commande['valide'] == 1)
                                        {
                                            echo "Validé"; 
                                        }else echo "En attente...";
                                        ?>
                                    </td>
                                    <?php
                                        //si la commande est validé par l'admin alors le livreur a acces aux informations personnel
                                        if($commande['valide'] == 1){
                                            echo "<td><a class='btn btn-primary btn-sm' href='afficher_com_lv.php?id=".$commande['id']."'>Afficher détails</a></td>";

                                        }
                                    }?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
