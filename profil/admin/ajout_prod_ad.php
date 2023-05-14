<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "admin"){
        header('Location: ../../index.php');
    }
?>
<?php 
   
    require '../../include/config.php';
    $requete = $bdd->prepare('SELECT id FROM utilisateurs WHERE token ="'.$_SESSION['user'].'"');
    $requete->execute();
    $id = $requete->fetchColumn();
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Ajouter un produit</title><link href="../css/bootstrap.css" rel="stylesheet"><link href="../css/bootstrap-icons.css" rel="stylesheet"><link href="../css/sidenav.css" rel="stylesheet"><link href="../css/header2.css" rel="stylesheet"><link href="../css/index.css" rel="stylesheet"><link href="../css/profilpage.css" rel="stylesheet"><script src="../js/bootstrap.js"></script><script src="../js/plotly-2.18.2.min.js"></script><script src="../js/graph.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box" ><div class="container-fluid col-11" id="header-container"><div class=" d-flex align-items-center justify-content-between"><div class="py-3 col-sm-auto justify-content-center"><div id="title">JeuVente.fr</div>
            </div>
            <div class="dropdown text-end"><a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i id="log-logo" class="bi bi-person-circle"></i></a></div></div></div> </header><div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto"><div class="row flex-grow-sm-1 flex-grow-0 container-fluid"><aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2"><div class="bg-light border rounded-3 p-1 h-100 sticky-top"><ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate"><li class="my-1"><a href="main_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-house fs-5"></i><span class="d-none d-sm-inline">Accueil</span></a></li><li class="my-1"><a href="analyse_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-graph-up"></i></i> <span class="d-none d-sm-inline">Analyse</span></a></li><li class="my-1 nav-item"><a href="vendeur.php" class="nav-link px-2 text-truncate"><i class="bi bi-layout-text-sidebar-reverse"></i></i><span class="d-none d-sm-inline">Liste des vendeurs</span></a></li><li class="my-1"><a href="produit_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i><span class="d-none d-sm-inline">Liste des produits</span> </a></li><li class="my-1"><a href="commande.php" class="nav-link px-2 text-truncate"><i class="bi bi-calendar2-check"></i></i><span class="d-none d-sm-inline">Commandes</span> </a></li><li class="my-1"><a href="profil_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i><span class="d-none d-sm-inline">Profil</span> </a></li><a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate"><i class="bi bi-toggle-off"></i></i><span class="d-none d-sm-inline">Déconnexion</span></a></ul></div>
            </aside>
            <main class="col overflow-auto h-100 w-100">

            <?php
// connexion à la base de données
require_once '../../include/config.php'; 
?>

<h4>Ajouter produit</h4>

<?php
// Vérification si le formulaire a été soumis
if (isset($_POST['ajouter'])) {
    // Récupération des valeurs du formulaire
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $hauteur = $_POST['hauteur'];
    $poids = $_POST['poids'];
    $discount = $_POST['discount'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $date = date('Y-m-d H:i:s');

    // Assignation d'une image par défaut pour le produit
    $filename = 'produit.png';

    // Vérification si une image a été téléchargée
    if (!empty($_FILES['image']['name'])) {
        // Génération d'un nom unique pour l'image et ajout de l'extension de l'image
        $image = $_FILES['image']['name'];
        $filename = '../data/'.uniqid() . $image;                        
    }

    // Vérification si les champs obligatoires ont été remplis
    if (!empty($libelle) && !empty($prix) && !empty($categorie) && !empty($hauteur) && !empty($poids)) {
        // Préparation de la requête SQL pour insérer les données dans la base de données
        $sqlState = $bdd->prepare('INSERT INTO produit VALUES (null,?,?,?,?,?,?,?,?,?,?,?)');

        // Exécution de la requête SQL avec les valeurs du formulaire
        $inserted = $sqlState->execute([$libelle, $prix, $hauteur, $poids, $discount, $categorie, $id, $date, $description, $filename, $quantite]);

        // Vérification si l'insertion a été réussie
        if ($inserted) {
            // Déplacement de l'image téléchargée dans le dossier de destination
            move_uploaded_file($_FILES['image']['tmp_name'], '../../data/' . $filename);

            // Redirection vers la page des produits
            // header('location: produit.php');
        } else {
            // Affichage d'un message d'erreur si l'insertion a échoué
            echo '<div class="alert alert-danger" role="alert">Database error (40023).</div>';
        }
    } else {
        // Affichage d'un message d'erreur si les champs obligatoires ne sont pas remplis
        echo '<div class="alert alert-danger" role="alert">Libelle , prix , catégorie sont obligatoires.</div>';
    }
}

// Début du formulaire pour ajouter un produit
?>

<!-- Suite du formulaire ... -->

<?php
// Récupération des catégories de la base de données
$categories = $bdd->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Suite du formulaire ... -->

<?php
// Affichage des options de catégorie dans le formulaire
foreach ($categories as $categorie) {
    echo "<option value='" . $categorie['id'] . "'>" . $categorie['libelle'] . "</option>";
}
?>

<!-- Suite du formulaire ... -->

</main>
</div>
</div>
</body>
</html>
