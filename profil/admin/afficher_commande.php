<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "admin"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Votre Profil</title><link href="../css/bootstrap.css" rel="stylesheet"><link href="../css/bootstrap-icons.css" rel="stylesheet"><link href="../css/sidenav.css" rel="stylesheet"><link href="../css/header2.css" rel="stylesheet"><link href="../css/index.css" rel="stylesheet"><link href="../css/profilpage.css" rel="stylesheet"><script src="../js/bootstrap.js"></script><script src="../js/plotly-2.18.2.min.js"></script><script src="../js/graph.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">JeuVente.fr</div>
            </div>
            <div class="dropdown text-end"><a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i id="log-logo" class="bi bi-person-circle"></i></a></div></div></div></header><div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto"><div class="row flex-grow-sm-1 flex-grow-0 container-fluid"><aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2"><div class="bg-light border rounded-3 p-1 h-100 sticky-top"><ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate"><li class="my-1"><a href="../../index.php" class="nav-link px-2 text-truncate"><i class="bi bi-house fs-5"></i><span class="d-none d-sm-inline">Accueil</span></a></li><li class="my-1"><a href="analyse_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-graph-up"></i></i><span class="d-none d-sm-inline">Analyse</span></a></li><li class="my-1"><a href="vendeur.php" class="nav-link px-2 text-truncate"><i class="bi bi-layout-text-sidebar-reverse"></i></i><span class="d-none d-sm-inline">Liste des vendeurs</span></a></li><li class="my-1"><a href="produit_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i><span class="d-none d-sm-inline">Liste des produits</span> </a></li><li class="my-1 nav-item"><a href="commande.php" class="nav-link px-2 text-truncate"><i class="bi bi-calendar2-check"></i></i><span class="d-none d-sm-inline">Commandes</span> </a></li><li class="my-1"><a href="main_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i><span class="d-none d-sm-inline">Profil</span> </a></li><a href="deconnexion.php" class="nav-link px-2 text-truncate"><i class="bi bi-toggle-off"></i></i><span class="d-none d-sm-inline">Déconnexion</span></a></ul></div>
</aside>
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
    <h2>Détails de la commande</h2>
    <table class="table table-striped table-hover">
    <!---En-têtes du tableau--->
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
            <td><?php echo $commande['total'] ?> <i class="fa fa-solid fa-dollar"></i></td>
            <td><?php echo $commande['date_creation'] ?></td>
            <td>
<!--- Affiche un bouton pour valider la commande si elle n'est pas déjà validée, ou un bouton pour annuler la commande si elle est déjà validée ---->
                <?php if ($commande['valide'] == 0) : ?>
                    <a class="btn btn-success btn-sm" href="valider_commande.php?id=<?= $commande['id']?>&etat=1">Valider la commande</a>
                <?php else: ?>
                    <a class="btn btn-danger btn-sm" href="valider_commande.php?id=<?= $commande['id']?>&etat=0">Annuler la commande</a>
                <?php endif; ?>
            </td>
            <td>
            </td>
        </tr>
        <?php
        ?>
        </tbody>
    </table>

</body>
</html>