<!-- On a securisé la page c'est a dire le vendeur a acces qu'au page vendeur que si il est connecté 
sinon l'utilisateur est redireigé sur la page index -->
<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "vendeur"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une categorie</title><link href="../css/bootstrap.css" rel="stylesheet"><link href="../css/bootstrap-icons.css" rel="stylesheet"><link href="../css/sidenav.css" rel="stylesheet"><link href="../css/header2.css" rel="stylesheet"><link href="../css/index.css" rel="stylesheet"><link href="../css/profilpage.css" rel="stylesheet"><script src="../js/bootstrap.js"></script><script src="../js/plotly-2.18.2.min.js"></script><script src="../js/graph.js"></script>
</head>

<!-- permet d'avoir le menu de la page vendeur-->
<body><header class="shadow rounded-3 bg-light" id="header-box" > <div class="container-fluid col-11" id="header-container"><div class=" d-flex align-items-center justify-content-between"><div class="py-3 col-sm-auto justify-content-center"> <div id="title">JeuVente.fr</div></div><div class="dropdown text-end"><a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i id="log-logo" class="bi bi-person-circle"></i></a></div></div></div></header><div class="row flex-grow-sm-1 flex-grow-0 container-fluid"> <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2"><div class="bg-light border rounded-3 p-1 h-100 sticky-top"> <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate"><li class="my-1"><a href="../../index.php" class="nav-link px-2 text-truncate">
 <i class="bi bi-house fs-5"></i><span class="d-none d-sm-inline">Accueil</span></a> </li><li class="my-1"><a href="" class="nav-link px-2 text-truncate"><i class="bi bi-graph-up"></i></i><span class="d-none d-sm-inline">Analyse</span></a></li><li class="my-1"><a href="categorie.php" class="nav-link px-2 text-truncate"><i class="bi bi-layout-text-sidebar-reverse"></i></i><span class="d-none d-sm-inline nav-item">Liste des categories</span></a></li><li class="my-1"><a href="produit.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i><span class="d-none d-sm-inline">Liste des produits</span> </a></li><li class="my-1"><a href="profil.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i><span class="d-none d-sm-inline">Profil</span> </a> </li><a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate"><i class="bi bi-toggle-off"></i></i><span class="d-none d-sm-inline">Déconnexion</span></a></ul></div>
</aside>
<!--- fin du menu vendeur ---->
            <main class="col overflow-auto h-100 w-100">
                <h4> Ajouter catégorie </h4>  <!-- titre pour expliquer la page --> 
                <?php
// Vérifie si le formulaire avec le champ nommé 'ajouter' a été soumis
                if(isset($_POST['ajouter'])){
                $libelle = $_POST['libelle'];  // Récupère la valeur entrée dans le champ 'libelle' du formulaire
                $description = $_POST['description']; // Récupère la valeur entrée dans le champ 'description' du formulaire
                
                if(!empty($libelle) && !empty($description)){ // Vérifie si les champs 'libelle' et 'description' ne sont pas vides
                    require_once '../include/config.php'; // Inclut le fichier de configuration contenant les informations de connexion à la base de données
                    $check = $bdd->prepare('INSERT INTO categorie(libelle,description) VALUES(?,?)'); // Prépare la requête SQL pour insérer les valeurs dans la table 'categorie'
                    $check->execute([$libelle,$description]); // Exécute la requête SQL en passant les valeurs récupérées comme paramètres
                }else{
        // Si l'un des champs est vide, affiche un message d'erreur sous forme d'une alerte rouge
        ?>
        <div class="alert alert-danger" role="alert">
            Libelle , description sont obligatoires
        </div> <?php
                }
}?>
                <!-- remplir le formulaire libelle, et description 
                si l'utilisateur appuie sur ajouter, le produit apparait dans la page produit.php"-->
                <form method="post">
                    <label class="from-label">Libelle</label>
                    <input type="text" class="from-control" name="libelle">
                    <label class="from-label">Description</label>
                    <input type="text" class="from-control" name="description">
                    <input type="submit" value="Ajouter catégorie" class="btn btn-primary my-2" name="ajouter">
                </form>
            </main>
        </div>
    </div>
</body>
</html>
