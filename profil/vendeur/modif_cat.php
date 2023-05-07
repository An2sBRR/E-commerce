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
    <title>modifier categorie</title><link href="../css/bootstrap.css" rel="stylesheet"><link href="../css/bootstrap-icons.css" rel="stylesheet"><link href="../css/sidenav.css" rel="stylesheet"><link href="../css/header2.css" rel="stylesheet"><link href="../css/index.css" rel="stylesheet"><link href="../css/profilpage.css" rel="stylesheet"><script src="../js/bootstrap.js"></script><script src="../js/plotly-2.18.2.min.js"></script><script src="../js/graph.js"></script>
</head>

<!-- permet d'avoir le menu de la page vendeur-->
<body><header class="shadow rounded-3 bg-light" id="header-box" > <div class="container-fluid col-11" id="header-container"><div class=" d-flex align-items-center justify-content-between"><div class="py-3 col-sm-auto justify-content-center"> <div id="title">JeuVente.fr</div></div><div class="dropdown text-end"><a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i id="log-logo" class="bi bi-person-circle"></i></a></div></div></div></header><div class="row flex-grow-sm-1 flex-grow-0 container-fluid"> <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2"><div class="bg-light border rounded-3 p-1 h-100 sticky-top"> <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate"><li class="my-1"><a href="../../index.php" class="nav-link px-2 text-truncate">
 <i class="bi bi-house fs-5"></i><span class="d-none d-sm-inline">Accueil</span></a> </li><li class="my-1"><a href="" class="nav-link px-2 text-truncate"><i class="bi bi-graph-up"></i></i><span class="d-none d-sm-inline ">Analyse</span></a></li><li class="my-1"><a href="categorie.php" class="nav-link px-2 text-truncate"><i class="bi bi-layout-text-sidebar-reverse"></i></i><span class="d-none d-sm-inline">Liste des categories</span></a></li><li class="my-1"><a href="produit.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i><span class="d-none d-sm-inline">Liste des produits</span> </a></li><li class="my-1"><a href="profil.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i><span class="d-none d-sm-inline">Profil</span> </a> </li><a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate"><i class="bi bi-toggle-off"></i></i><span class="d-none d-sm-inline">Déconnexion</span></a></ul></div>
</aside>
            <main class="col overflow-auto h-100 w-100">
                <h4> Modifier catégories <h4>
                <?php
                require_once '../../include/config.php';
                $check = $bdd->prepare('SELECT * FROM categorie WHERE id=?');
                $id = $_GET['id'];
                $check->execute([$id]);

                //requête SQL pour récupérer une catégorie spécifique de la base de données en utilisant l'ID fourni dans l'URL.
                // La requête est exécutée et le résultat est stocké dans la variable $category.
                $category = $check->fetch(PDO::FETCH_ASSOC);
                if (isset($_POST['modifier'])) {
                    $libelle = $_POST['libelle'];
                    $description = $_POST['description'];

                    if (!empty($libelle) && !empty($description)) {
                        $check = $bdd->prepare('UPDATE categorie SET libelle = ? , description = ?, WHERE id = ?');
                        $check->execute([$libelle, $description, $id]);
                        //  header('location: categories.php');
                    } else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Libelle , description sont obligatoires
                        </div>
                        <?php
                    }
                }

                ?>
        <!-- un formulaire HTML pour modifier les informations de la catégorie. 
        Les champs "libelle" et "description" sont pré-remplis avec les informations de la catégorie récupérées précédemment-->
                <form method="post">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $category['id'] ?>">
                    <label class="form-label">Libelle</label>
                    <input type="text" class="form-control" name="libelle" value="<?php echo $category['libelle'] ?>">

                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description"><?php echo $category['description'] ?></textarea>

                    <input type="submit" value="Modifier catégorie" class="btn btn-primary my-2" name="modifier">
                </form>
            </main>
        </div>
    </div>
</body>
</html>
