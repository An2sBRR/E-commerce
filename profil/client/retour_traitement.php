<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "client"){
        header('Location: ../../index.php');
    }
    $id_commande = $_GET['id'];
    $id_produit = $_GET['id_prod'];
?>
<!-- permet d'avoir le menu de la page client -->
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
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box">
        <div class="container-fluid col-11" id="header-container">
            <div class=" d-flex align-items-center justify-content-between">
                <div class="py-3 col-sm-auto justify-content-center">
                    <div id="title">JeuxVente.fr</div>
                </div>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i id="log-logo" class="bi bi-person-circle"></i></a>
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <?php include 'barre_navigation_cl.php'; ?>
            <main class="col overflow-auto h-100 w-100">
                <h4>Retourner un article</h4>
                <?php 
                    require_once '../../include/config.php'; // On inclut la connexion à la BDD

                    $requete = $bdd->query( "SELECT quantite FROM ligne_commande WHERE id_commande = $id_commande AND id_produit = $id_produit");
                    $quantite_prod = $requete->fetchColumn();
                    
                    // Si le formulaire a été soumis
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // On vérifie que toutes les données requises ont été fournies
                        if (!empty($_POST['quantité']) && !empty($_POST['motif'])) {
                            // On récupère les données du formulaire et on les nettoie
                            $quantite = htmlspecialchars($_POST['quantité']);
                            $motif = htmlspecialchars($_POST['motif']);

                            // On insère les données dans la BDD
                            $update = $bdd->prepare("UPDATE produit SET quantite = quantite + ? WHERE id = ?");
                            $update->execute([$quantite,$id_produit]);
                            
                            $modify = $bdd->prepare("UPDATE ligne_commande SET quantite = quantite - ? WHERE id_produit = ? AND id_commande = ?");
                            $modify->execute([$quantite, $id_produit, $id_commande]);
                            
                            header("Location: commande.php");
                        } else {
                            // Si des données requises sont manquantes, on affiche un message d'erreur
                            echo "Tous les champs requis doivent être renseignés.";
                        }
                    }
                ?>

                <form method="post">
                        <label class="form-label">Motif</label>
                        <input type="text" class="form-control" name="motif">

                        <label class="form-label">Quantité</label>
                        <input type="number" class="form-control" name="quantité" min="0" max="<?php echo $quantite_prod; ?>" required>
                        
                        <input type="submit" value="Modifier produit" class="btn btn-primary my-2" name="modifier">
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
