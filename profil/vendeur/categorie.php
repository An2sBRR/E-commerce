<!-- On a securisé la page c'est a dire le vendeur a acces qu'au page vendeur que si il est connecté 
sinon l'utilisateur est redireigé sur la page index --><?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "vendeur"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie</title><link href="../css/bootstrap.css" rel="stylesheet"><link href="../css/bootstrap-icons.css" rel="stylesheet"><link href="../css/sidenav.css" rel="stylesheet"><link href="../css/header2.css" rel="stylesheet"><link href="../css/index.css" rel="stylesheet"><link href="../css/profilpage.css" rel="stylesheet"><script src="../js/bootstrap.js"></script><script src="../js/plotly-2.18.2.min.js"></script><script src="../js/graph.js"></script>
</head>

<!-- permet d'avoir le menu de la page vendeur-->
<body><header class="shadow rounded-3 bg-light" id="header-box" > <div class="container-fluid col-11" id="header-container"><div class=" d-flex align-items-center justify-content-between"><div class="py-3 col-sm-auto justify-content-center"> <div id="title">JeuVente.fr</div></div><div class="dropdown text-end"><a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i id="log-logo" class="bi bi-person-circle"></i></a></div></div></div></header><div class="row flex-grow-sm-1 flex-grow-0 container-fluid"> <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2"><div class="bg-light border rounded-3 p-1 h-100 sticky-top"> <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate"><li class="my-1"><a href="../../index.php" class="nav-link px-2 text-truncate">
 <i class="bi bi-house fs-5"></i><span class="d-none d-sm-inline">Accueil</span></a> </li><li class="my-1"><a href="" class="nav-link px-2 text-truncate"><i class="bi bi-graph-up"></i></i><span class="d-none d-sm-inline ">Analyse</span></a></li><li class="my-1"><a href="categorie.php" class="nav-link px-2 text-truncate"><i class="bi bi-layout-text-sidebar-reverse"></i></i><span class="d-none d-sm-inline nav-item">Liste des categories</span></a></li><li class="my-1"><a href="produit.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i><span class="d-none d-sm-inline">Liste des produits</span> </a></li><li class="my-1"><a href="profil.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i><span class="d-none d-sm-inline">Profil</span> </a> </li><a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate"><i class="bi bi-toggle-off"></i></i><span class="d-none d-sm-inline">Déconnexion</span></a></ul></div>
</aside>
<!---- fin du menu cote vendeur -----> 
            <main class="col overflow-auto h-100 w-100"> <!-- permet d'ecrire le texte au milieu--> 
                <div class="container py-2">
                <h2>Liste des catégories</h2> <!--on affiche la table des categories --> 
                    <a href="ajou_categorie.php" class ="btn btn-primary">Ajouter catégorie</a> <!--possibilité d'ajouter des categories en cliquant sur le bouton --> 
                    <table class = "table table-striped table-hover">
                        <thead>
                        <!-- affichage de la table en indiquant l'id, le libelle, la description, la date et les operations-->
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
                        //on se connecte a la base de données 
                        require_once '../../include/config.php';
                        $categories = $bdd->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);//plus precisement a la table categorie 
                        foreach ($categories as $categorie){ //on recupere les informations 
                            ?>
                            <tr>
                            <!-- on appelles les données demandé, tels que l'id, le libelle, la description et la date de creation--->
                                <td><?php echo $categorie['id'] ?></td>
                                <td><?php echo $categorie['libelle'] ?></td>
                                <td><?php echo $categorie['description'] ?></td>
                                <td><?php echo $categorie['date_creation'] ?></td>
                                <td>
                                    <!-- on a la possibilité de modifier le produit, ce qui nous emmene sur une autre page-->
                                    <a href="modif_cat.php?id=<?php echo $categorie['id'] ?>" class="btn btn-primary"> Modifier</a>
                                    <!-- ou on a la possibilité de supprimer le produit -->
                                    <a href="../supp_cat.php?id= <?php echo $categorie['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $categorie['libelle'] ?>');" class="btn btn-danger">Supprimer</a>
                                </td></tr><?php }?></table></div></main></div></div>
</body>
</html>
