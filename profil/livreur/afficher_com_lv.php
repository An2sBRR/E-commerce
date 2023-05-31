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
    <title>Détails Colis</title>
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
            <main class="col overflow-auto h-100 w-100">
                <div class="container py-2">
                    <?php
                        //connexion à la base de données
                        require_once '../../include/config.php'; 
                        $idCommande = $_GET['id'];
                        $sqlState = $bdd->prepare('SELECT commande.*,utilisateurs.pseudo as "pseudo" FROM commande 
                                    INNER JOIN utilisateurs ON commande.id_client = utilisateurs.id 
                                                                    WHERE commande.id = ?
                                                                    ORDER BY commande.date_creation DESC');
                        $sqlState->execute([$idCommande]);
                        $commande = $sqlState->fetch(PDO::FETCH_ASSOC);

                    ?>
                    <h2>Détails du colis</h2>
                    <table class="table table-striped table-hover">
                        <!------------on fait un tableau qui va permettre d'afficher la liste de nos colis---------------------->
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Client</th>
                                <th>Numéro commande</th>
                                <th>taille</th>
                                <th>poids</th>
                                <th>adresse livraison </th>
                                <th>ville</th>
                                <th>code postal </th>
                                <th>Date</th>
                                <th>Etat du colis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //requete sql qui permet de prendre toutes les informations dans la table ligne_commande et produit ce qui va permettre de detailler les commandes
                                $sqlStateLigne_commande = $bdd->prepare('SELECT ligne_commande.*,produit.libelle,produit.image from ligne_commande
                                                                                INNER JOIN produit ON ligne_commande.id_produit = produit.id
                                                                                WHERE id_commande = ?
                                                                                ');
                                $sqlStateLigne_commande->execute([$idCommande]);
                                $lignesCommandes = $sqlStateLigne_commande->fetchAll(PDO::FETCH_OBJ);
                            ?>
                            <tr>
                                <td><?php echo $commande['id'] ?></td>
                                <td><?php echo $commande['nom_prenom'] ?></td>
                                <td><?php echo $commande['numero_commande'] ?></td>
                                <td><?php echo $commande['taille'] ?></td>
                                <td><?php echo $commande['poids'] ?></td>
                                <td><?php echo $commande['adresse_livraison'] ?></td>
                                <td><?php echo $commande['ville'] ?></td>
                                <td><?php echo $commande['code_postal'] ?></td>
                                <td><?php echo $commande['date_creation'] ?></td>
                                <td>
                                    <!------------on regarde l'etat de la commande, si l'etat est validé alors on affiche livré---------------------->
                                    <?php if ($commande['commande_livre'] == 0) : ?>
                                    <a class="btn btn-danger btn-sm"
                                        href="commande_livre.php?id=<?= $commande['id']?>&etat=1">Colis en cours de livraison</a>
                                    <?php else: ?>
                                    <a class="btn btn-success btn-sm"
                                        href="commande_livre.php?id=<?= $commande['id']?>&etat=0">Colis livré</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
