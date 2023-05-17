<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "vendeur"){
        header('Location: ../../index.php');
    }
    include 'fin_contrat.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des catégories</title>
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
              <div id="title">JeuxVente.fr</div>
            </div>
            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
                <h2>Liste des catégories</h2>
                    <a href="ajout_categorie.php" class ="btn btn-primary">Ajouter catégorie</a>
                    <table class = "table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Libelle</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Opérations</th>
                            </tr>
                        </thead>
                        <body>
                        <?php
                        require_once '../../include/config.php';
                        $categories = $bdd->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($categories as $categorie){
                            ?>
                            <tr>
                                <td><?php echo $categorie['id'] ?></td>
                                <td><?php echo $categorie['libelle'] ?></td>
                                <td><?php echo $categorie['description'] ?></td>
                                <td><?php echo $categorie['date_creation'] ?></td>
                                <td>
                                    <a href="modif_cat.php?id=<?php echo $categorie['id'] ?>" class="btn btn-primary"> Modifier</a>
                                    <a href="supp_cat.php?id=<?php echo $categorie['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $categorie['libelle'] ?>');" class="btn btn-danger">Supprimer</a>
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
