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
    <title>Commandes</title>
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
                    <div id="title">JeuxVentes.fr</div>
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
            <!-- barre de navigation -->
            <?php include 'barre_navigation_ad.php';?> 
            <main class="col overflow-auto h-100 w-100">
                <a class="btn btn-dark btn-sm" href="commande.php">← Retour</a><br>
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
                    <h2>Détails de la commande</h2>
                    <table class="table table-striped table-hover">
                        <!---En-têtes du tableau--->
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Client</th>
                                <th>Numéro commande</th>
                                <th>Taille</th>
                                <th>Poids</th>
                                <th>Adresse livraison </th>
                                <th>Ville</th>
                                <th>Code postal </th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Opérations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Prépare une requête SQL pour obtenir les détails de chaque ligne de commande, en utilisant une jointure pour obtenir le libelle et l'image du produit
                                $sqlStateLigne_commande = $bdd->prepare('SELECT ligne_commande.*,produit.libelle,produit.image from ligne_commande
                                                                                INNER JOIN produit ON ligne_commande.id_produit = produit.id
                                                                                WHERE id_commande = ?
                                                                                ');
                                // Exécute la requête SQL avec l'ID de la commande
                                $sqlStateLigne_commande->execute([$idCommande]);
                                // Récupère les résultats de la requête
                                $lignesCommandes = $sqlStateLigne_commande->fetchAll(PDO::FETCH_OBJ);
                            ?>
                            <!--- Commence une ligne de tableau HTML pour chaque ligne de commande---->
                            <tr>
                                <td><?php echo $commande['id'] ?></td>
                                <td><?php echo $commande['pseudo'] ?></td>
                                <td><?php echo $commande['numero_commande'] ?></td>
                                <td><?php echo $commande['taille'] ?></td>
                                <td><?php echo $commande['poids'] ?></td>
                                <td><?php echo $commande['adresse_livraison'] ?></td>
                                <td><?php echo $commande['ville'] ?></td>
                                <td><?php echo $commande['code_postal'] ?></td>
                                <td><?php echo $commande['total'].' €'?> </td>
                                <td><?php echo $commande['date_creation'] ?></td>
                                <td>
                                <!--- Affiche un bouton pour valider la commande si elle n'est pas déjà validée, ou un bouton pour annuler la commande si elle est déjà validée ---->
                                <?php if ($commande['valide'] == 0) : ?>
                                <a class="btn btn-success btn-sm"
                                    href="valider_commande.php?id=<?= $commande['id']?>&etat=1">Valider la
                                    commande</a>
                                <?php else: ?>
                                <a class="btn btn-danger btn-sm"
                                    href="valider_commande.php?id=<?= $commande['id']?>&etat=0">Annuler la
                                    commande</a>
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
