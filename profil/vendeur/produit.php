<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "vendeur"){
        header('Location: ../../index.php');
    }
    include 'fin_contrat.php';
    
    $requete = $bdd->prepare('SELECT id FROM utilisateurs WHERE token ="'.$_SESSION['user'].'"');
    $requete->execute();
    $id = $requete->fetchColumn();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos produits</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
</head>


<body>
<header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">LE REPÈRE DE MASS</div>
            </div>
            <div class="text-end">
              <a href="profil.php" class="d-block link-dark text-decoration-none">
                <i id="log-logo" class="bi bi-person-circle"></i>
              </a> 
            </div>
          </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <!-- BARRE DE NAVIGATION -->
            <?php include 'barre_navigation_vd.php'; ?>

            <main class="col overflow-auto h-100 w-100">
                <div class="container py-2">
                    <h2>Liste des produits</h2>
                    <a href="ajout_prod.php" class="btn btn-primary">Ajouter produit</a>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Libelle</th>
                                <th>Prix</th>
                                <th>Discount</th>
                                <th>Catégorie</th>
                                <th>Date de création</th>
                                <th>Image</th>
                                <th>Quantité</th>
                                <th>Opérations</th>
                            </tr>
                        </thead>
                        <?php
                        // récupération des données de tous les produits que le vendeur vend
                        $categories = $bdd->query("SELECT produit.*,categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id WHERE produit.id_utilisateurs = ".$id."")->fetchAll(PDO::FETCH_OBJ);
                        foreach ($categories as $produit){
                            $prix = $produit->prix;
                            $discount = $produit->discount;
                            $prixFinale = $prix - (($prix*$discount)/100);
                            ?>
                            <tr>
                                <td><?= $produit->id ?></td>
                                <td><?= $produit->libelle ?></td>
                                <td><?= $prix ?> <i class="fa fa-solid fa-dollar"></i></td>
                                <td><?= $discount ?> %</td>
                                <td><?= $produit->categorie_libelle ?></td>
                                <td><?= $produit->date_creation ?></td>
                                <td><img class="img-fluid" width="90" src="../../data/<?= $produit->image ?>" alt="<?= $produit->libelle ?>"></td>
                                <td><?= $produit->quantite ?></td>
                                <td>
                                    <a class="btn btn-primary" href="modif_prod.php?id=<?php echo $produit->id ?>">Modifier</a>
                                    <a class="btn btn-danger" href="../supp_prod.php?id=<?php echo $produit->id ?>" onclick="return confirm('Voulez vous vraiment supprimer le produit <?php echo $produit->libelle?> ?')">Supprimer</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
