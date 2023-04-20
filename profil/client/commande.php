<?php 
    session_start();
?>
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
    <script src="../js/plotly-2.18.2.min.js"></script>
    <script src="../js/graph.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">JeuVente.fr</div>
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
            <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2">
                <div class="bg-light border rounded-3 p-1 h-100 sticky-top">
                    <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate">

                        <li class="my-1">
                            <a href="../../index.php" class="nav-link px-2 text-truncate">
                                <i class="bi bi-house fs-5"></i>
                                <span class="d-none d-sm-inline">Accueil</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="profil_cl.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-layout-text-sidebar-reverse"></i></i>
                                <span class="d-none d-sm-inline">Mon profil</span>
                            </a>
                        </li>
                        <li class="my-1 nav-item">
                            <a href="commande.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i>
                                <span class="d-none d-sm-inline">Commandes</span> </a>
                        </li>
                        <li class="my-1">
                            <a href="politique.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Politiques</span> </a>
                        </li>
                        <a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate">
                        <i class="bi bi-toggle-off"></i></i>
                                <span class="d-none d-sm-inline">Déconnexion</span>
                        </a>
                    </ul>
                </div>
            </aside>
            <main class="col overflow-auto h-100 w-100">
    <div class="container py-2">
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
                <td><?php echo $commande['id']?></td>
                <td><?php echo $commande['numero_commande'] ?></td>
                <td><?php echo $commande['total']?></td>
                <td><?php echo $commande['date_creation']?></td>
                <td><?php 
                    if($commande['valide'] == 1){
                        echo "Livrée"; 
                    }else echo "En route...";
                    ?></td>
                    <td><a class="btn btn-primary btn-sm" href="facture.php?id=<?php echo $commande['id']?>">Afficher facture</a>
                    <?php
                        if($commande['valide'] == 1){
                            echo "<td><a class='btn btn-primary btn-sm' href='commande.php?id'".$commande['id'].">retourner l'article</a></td>";
                        }
                    ?>
            </tr>
        <?php } ?>
  </tbody>
    </table>
</div>

</body>
</html>
