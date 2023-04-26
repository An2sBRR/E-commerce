<!-- On a securisé la page c'est a dire le livreur a acces qu'au page livreur que si il est connecté 
sinon l'utilisateur est redireigé sur la page index -->
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
    <title>Accueil livreur</title>
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
<!-----EN TETE // MENU -------->
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
                        <li class="my-1 nav-item">
                            <a href="#" class="nav-link px-2 text-truncate">
                            <i class="bi bi-layout-text-sidebar-reverse"></i></i>
                                <span class="d-none d-sm-inline">Colis</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="testmap.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i>
                                <span class="d-none d-sm-inline">Planning livraison</span> </a>
                        </li>
                        <li class="my-1">
                            <a href="profil2.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Profil</span> </a>
                        </li>
                        <a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate">
                        <i class="bi bi-toggle-off"></i></i>
                                <span class="d-none d-sm-inline">Déconnexion</span>
                        </a>
                    </ul>
                </div>
            </aside>

<!------------FIN MENU ---------------------->

            <main class="col overflow-auto h-100 w-100">
                <div class="container py-2">
            <div class="container py-2">
    <h2>Liste des Colis</h2>
    <table class="table table-striped table-hover">

<!------------on fait un tableau qui va permettre d'afficher la liste de nos colis---------------------->
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
                        $commandes = $bdd->query('SELECT commande.*,utilisateurs.pseudo as "pseudo" FROM commande INNER JOIN utilisateurs ON commande.id_client = utilisateurs.id ORDER BY commande.date_creation DESC')->fetchAll(PDO::FETCH_ASSOC);

foreach ($commandes as $commande) {
     ?>
    <tr>
<!-- on appelle donc les informations numero commande, adresse livraison, code postal et date de creation-->
    <td><?php echo $commande['id']?></td>
    <td><?php echo $commande['numero_commande'] ?></td>
    <td><?php echo $commande['adresse_livraison']?></td>
    <td><?php echo $commande['code_postal']?></td>
    <td><?php echo $commande['date_creation']?></td>
    <td><?php 

    //si la commande est validé par l'admin, un 1 apparait dans la base de donnée,
    // grace a notre conditions, un message apparait en marquant "validé" sinon en attente 
    if($commande['valide'] == 1)
    {
        echo "Validé"; 
    }else echo "En attente...";
    ?></td>
            <?php
            //de plus, si la commande est validé par l'admin alors le livreur a acces aux informations personnel sinon n'y a pas acces 
    if($commande['valide'] == 1){
        echo "<td><a class='btn btn-primary btn-sm' href='afficher_com_lv.php?id=".$commande['id']."'>Afficher détails</a></td>";

    }
        }
        ?>
  </tbody>
    </table>
</div>

</body>
</html>
