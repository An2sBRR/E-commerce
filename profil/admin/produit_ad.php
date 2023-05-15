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
    <title>Liste produits</title>
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
            <?php include 'barre_navigation_ad.php';?>
            <main class="col overflow-auto h-100 w-100">
                <div class="container py-2">
                    <h2>Liste des produits</h2>
                    <a href="ajout_prod_ad.php" class="btn btn-primary">Ajouter produit</a>
                    <table class="table table-striped table-hover">
                        <!-- Début de l'en-tête du tableau -->
                        <thead>
                            <tr>
                                <!-- Définition des colonnes du tableau -->
                                <th>#ID</th>
                                <th>Libelle</th>
                                <th>Prix</th>
                                <th>Hauteur</th>
                                <th>Poids</th>
                                <th>Discount</th>
                                <th>Catégorie</th>
                                <th>Image</th>
                                <th>Quantité</th>
                                <th>Opérations</th>
                            </tr>
                        </thead>
                        <?php
                            // Inclusion de la configuration de la base de données
                            require_once '../../include/config.php';
                            // Récupération des produits et des catégories associées depuis la base de données
                            $categories = $bdd->query("SELECT produit.*,categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id")->fetchAll(PDO::FETCH_OBJ);
                            // Boucle à travers chaque produit
                            foreach ($categories as $produit){
                                $prix = $produit->prix;
                                $discount = $produit->discount;
                                // Calcul du prix final après application de la remise
                                $prixFinale = $prix - (($prix*$discount)/100);
                        ?>
                        <!-- Début de la ligne du tableau pour le produit -->
                        <tr>
                            <!-- Affichage des données du produit dans les colonnes correspondantes -->
                            <td><?= $produit->id ?></td>
                            <td><?= $produit->libelle ?></td>
                            <td><?= $prix ?> €</i></td>
                            <td><?= $produit->hauteur?></td>
                            <td><?= $produit->poids?></td>
                            <td><?= $discount ?> %</td>
                            <td><?= $produit->categorie_libelle ?></td>
                            <td><img class="img-fluid" width="90" src="../../data/<?= $produit->image ?>"
                                    alt="<?= $produit->libelle ?>"></td>
                            <td><?= $produit->quantite ?></td>
                            <td>
                                <!-- Liens pour modifier et supprimer le produit -->
                                <a class="btn btn-primary"
                                    href="modif_prod_ad.php?id=<?php echo $produit->id ?>">Modifier</a>
                                <a class="btn btn-danger" href="../supp_prod.php?id=<?php echo $produit->id ?>"
                                    onclick="return confirm('Voulez vous vraiment supprimer le produit <?php echo $produit->libelle?> ?')">Supprimer</a>
                            </td>
                        </tr>
                        <!-- Fin de la ligne du tableau pour le produit -->
                        <?php
                            }
                        ?>
                        <!-- Fin du tableau -->
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
