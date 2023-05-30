<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->

<!-- On a securisé la page c'est a dire le client a acces qu'au page client que si il est connecté 
sinon l'utilisateur est redirigé sur la page index -->
<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "client"){
        header('Location: ../../index.php');
    }
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
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i id="log-logo" class="bi bi-person-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <?php include 'barre_navigation_cl.php'; ?>
            <main class="col overflow-auto h-100 w-100">
                <a class="btn btn-dark btn-sm" href="commande.php">← Retour</a><br><br>
                <div class="container py-2">
                    <table class="table table-striped table-hover">
                        <!---- on se connecte a la base de donnée commande --->
                        <?php
                    require '../../include/config.php';
                    $id_commande = $_GET['id']; 
                    $commande_query = $bdd->query("SELECT * FROM commande WHERE id = $id_commande");
//si la base de donnée n'arrive pas a se connecter  alors un message s'affiche en expliquant le probleme 
                    if ($commande_query === false) {
                        print_r($bdd->errorInfo()); // Affiche le message d'erreur de PDO
 //sinon la commande peut s'executer normalement
                    } else {
                        $commande = $commande_query->fetch(PDO::FETCH_ASSOC);
                    }
                    // Affichage de l'en-tête de la facture avec les données personnel du client 
                    // son numero de commande, la date, le nom prenom, livraison et le total de commande
                    echo "<h1>Facture JeuxVente.fr</h1>";
                    echo "<p>Commande n° : ".$commande['numero_commande']."</p>";
                    echo "<p>Date : ".$commande['date_creation']."</p>";
                    echo "<p>Client : ".$commande['nom_prenom']."</p>";
                    echo "<p>Livraison : ".ucfirst($commande['livraison'])."</p>";
                    echo "<p>Total : ".round($commande['total'],2)." €</p>";
                ?>

                        <!-- en cliquant sur le bouton "imprimer page", il fait appel a un script qui permet d'imprimer la facture --->
                        <form><input id="impression" name="impression" type="button" onclick="imprimer_page()"
                                value="Imprimer cette page" /></form>
                        <thead>
                            <!--- tableau affichant les differentes informations --->
                            <tr>
                                <th>Article</th>
                                <th>Prix unitaire</th>
                                <th>Quantité</th>
                                <th>Total</th>
                                <?php
                        if($commande['commande_livre'] == 1){
                            echo "<th>Retourner l'article</th>";
                        }
                    ?>
                            </tr>
                        </thead>
                        </tbody>
                        <?php 
//on fait appel a la base de donnée pour afficher l'image, le prix.. en s'aidant de la table ligne_commande qui stock la quantité, id_produit... 
                    $requete = $bdd->prepare('SELECT produit.id, produit.image, produit.prix, produit.discount, ligne_commande.quantite FROM commande JOIN ligne_commande ON commande.id = ligne_commande.id_commande JOIN produit ON ligne_commande.id_produit = produit.id WHERE commande.id = ?');
                    $requete->execute([$id_commande]);
                    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($resultats as $resultat) {
 //on affiche donc l'article, le prix unitaire la quantité et le total  
                        $prix = number_format($resultat['prix']*(1-$resultat['discount']/100),2);
                        echo "<tr>";
                        echo "<td><img src =../".$resultat['image']." width=100></td>";
                        echo "<td>".$prix." €</td>";
                        echo "<td>".$resultat['quantite'] . "</td>";
                        echo "<td>".$prix*$resultat['quantite']." €</td>";
                        if($commande['commande_livre'] == 1){
                            echo "<td><a class='btn btn-primary btn-sm' href='retour_traitement.php?id=".$commande['id']."&id_prod=".$resultat['id']."'>retourner l'article</a></td>";
                        }
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
    function imprimer_page() {
        window.print();
    }
    </script>
</body>

</html>
