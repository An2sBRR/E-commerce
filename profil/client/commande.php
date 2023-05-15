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
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i id="log-logo" class="bi bi-person-circle"></i></a>
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <!-- BARRE DE NAVIGATION -->
            <?php include 'barre_navigation_cl.php'; ?>
            <main class="col overflow-auto h-100 w-100">
                <div class="container py-2">
                    <!---permet d'avoir le tableau concernant les differentes informations --->
                    <h2>Liste de mes Commandes</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Numéro commande</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Opérations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //connexion à la base de données
                                require_once '../../include/config.php'; 
                                $commandes = $bdd->query('SELECT commande.* FROM commande INNER JOIN utilisateurs ON commande.id_client = utilisateurs.id WHERE utilisateurs.id = (SELECT id FROM utilisateurs WHERE token ="'.$_SESSION['user'].'") ORDER BY commande.date_creation DESC')->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($commandes as $commande) {
                            ?>
                            <tr>
                                <!-- on appelle dans la base de donnée commande 'l'id de l'utilisateur
                on fait de meme pour les commandes, le total et la date de creation ---->

                                <td><?php echo $commande['id']?></td>
                                <td><?php echo $commande['numero_commande'] ?></td>
                                <td><?php echo $commande['total']?> €</td>
                                <td><?php echo $commande['date_creation']?></td>
                                <td><?php 
                                    //lorsque le livreur va validé la livraison alors le client va avoir une notification "livré"
                                    //il peut donc suivre ses commandes en voyant le statut 
                                    if($commande['valide'] == 1){
                                        if($commande['commande_livre'] == 1){
                                            echo "Livré";
                                        } else {
                                            echo "Validation de l'admin";
                                        }
                                    } else {
                                        echo "En attente...";
                                    }
                                ?>
                                </td>
                                <!-- permet d'afficher la facture des commandes --->
                                <td><a class="btn btn-primary btn-sm"
                                        href="facture.php?id=<?php echo $commande['id']?>">Afficher facture</a>
                                    <!-- lorsque son colis est livré et validé sur livré il a la possibilité de retourner l'article-->
                                    <?php
                                        if($commande['commande_livre'] == 1){
                                            echo "<td><a class='btn btn-primary btn-sm' href='retour_traitement.php?id=".$commande['id']."'>retourner l'article</a></td>";
                                        }
                                    ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
