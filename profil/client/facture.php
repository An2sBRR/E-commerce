<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "client"){
        header('Location: ../../index.php');
    }
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
            <table class="table table-striped table-hover">
                <?php
                    require '../../include/config.php';
                    $id_commande = $_GET['id']; 
                    $commande_query = $bdd->query("SELECT * FROM commande WHERE id = $id_commande");

                    if ($commande_query === false) {
                        print_r($bdd->errorInfo()); // Affiche le message d'erreur de PDO
                    } else {
                        $commande = $commande_query->fetch(PDO::FETCH_ASSOC);
                    }
                    // Affichage de l'en-tête de la facture
                    echo "<h1>Facture JeuxVente.fr</h1>";
                    echo "<p>Commande n° : ".$commande['numero_commande']."</p>";
                    echo "<p>Date : ".$commande['date_creation']."</p>";
                    echo "<p>Client : ".$commande['nom_prenom']."</p>";
                    echo "<p>Livraison : ".ucfirst($commande['livraison'])."</p>";
                    echo "<p>Total : ".$commande['total']." €</p>";
                ?>
<!-- BOUTON QUI PERMET D'IMPRIMER LA COMMANDE PASSÉ + DE L'ENREGISTRER EN PDF--->
                           <form>
  <input id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer cette page" />
</form>
                <thead>
                <tr>
                    <th>Article</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                   
                </tr>
                </thead>
                </tbody>
                <?php 
                    $requete = $bdd->prepare('SELECT produit.image, produit.prix, produit.discount, ligne_commande.quantite FROM commande JOIN ligne_commande ON commande.id = ligne_commande.id_commande JOIN produit ON ligne_commande.id_produit = produit.id WHERE commande.id = ?');
                    $requete->execute([$id_commande]);
                    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($resultats as $resultat) {
                        $prix = $resultat['prix']*(1-$resultat['discount']/100);
                        echo "<tr>";
                        echo "<td><img src =../".$resultat['image']." width=100></td>";
                        echo "<td>".$prix." €</td>";
                        echo "<td>".$resultat['quantite'] . "</td>";
                        echo "<td>".$prix*$resultat['quantite']." €</td>";
                        echo "</tr>";
                    }
                ?>  
            </table>
            </div>
            </main>
        </div>
    </div>
<!-- SCRIPT QUI PERMET D'IMPRIMER LA FACTURE ---> 
    <script type="text/javascript">
function imprimer_page(){
  window.print();
}
</script>
</body>
</html>
