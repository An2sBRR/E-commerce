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
    <title>analyse</title><link href="../css/bootstrap.css" rel="stylesheet"><link href="../css/bootstrap-icons.css" rel="stylesheet"><link href="../css/sidenav.css" rel="stylesheet"><link href="../css/header2.css" rel="stylesheet"><link href="../css/index.css" rel="stylesheet"><link href="../css/profilpage.css" rel="stylesheet"><script src="../js/bootstrap.js"></script><script src="../js/plotly-2.18.2.min.js"></script><script src="../js/graph.js"></script>
</head>

<!-- permet d'avoir le menu de la page vendeur-->
<body><header class="shadow rounded-3 bg-light" id="header-box" > <div class="container-fluid col-11" id="header-container"><div class=" d-flex align-items-center justify-content-between"><div class="py-3 col-sm-auto justify-content-center"> <div id="title">JeuVente.fr</div></div><div class="dropdown text-end"><a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i id="log-logo" class="bi bi-person-circle"></i></a></div></div></div></header><div class="row flex-grow-sm-1 flex-grow-0 container-fluid"> <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2"><div class="bg-light border rounded-3 p-1 h-100 sticky-top"> <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate"><li class="my-1"><a href="../../index.php" class="nav-link px-2 text-truncate">
 <i class="bi bi-house fs-5"></i><span class="d-none d-sm-inline">Accueil</span></a> </li><li class="my-1"><a href="" class="nav-link px-2 text-truncate"><i class="bi bi-graph-up"></i></i><span class="d-none d-sm-inline nav-item">Analyse</span></a></li><li class="my-1"><a href="categorie.php" class="nav-link px-2 text-truncate"><i class="bi bi-layout-text-sidebar-reverse"></i></i><span class="d-none d-sm-inline">Liste des categories</span></a></li><li class="my-1"><a href="produit.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i><span class="d-none d-sm-inline">Liste des produits</span> </a></li><li class="my-1"><a href="profil.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i><span class="d-none d-sm-inline">Profil</span> </a> </li><a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate"><i class="bi bi-toggle-off"></i></i><span class="d-none d-sm-inline">Déconnexion</span></a></ul></div>
</aside>
            <main class="col overflow-auto h-100 w-100">
            <?php 
            //permet d'inclure le fichier de configuration de la base de données. 
                require '../../include/config.php';
                // requête SQL qui récupère les quantités de produits vendues groupées par mois pour un utilisateur spécifique
                $requete = $bdd->prepare("SELECT DATE_FORMAT(c.date_creation, '%Y-%m') as mois, SUM(lc.quantite) AS quantite_vendue
                                            FROM ligne_commande lc
                                            INNER JOIN commande c ON lc.id_commande = c.id
                                            INNER JOIN produit p ON lc.id_produit = p.id
                                            WHERE p.id_utilisateurs = (SELECT id FROM utilisateurs WHERE token = ?)
                                            GROUP BY mois
                                            ORDER BY mois
                                            ");
                $requete->execute([$_SESSION['user']]);
                $result = $requete->fetchAll(PDO::FETCH_ASSOC);

                //permettent de stocker les données récupérées par la requête SQL dans deux tableaux : $mois contenant les mois, et $quantite contenant les quantités de produits vendues.
                $mois = array();
                $quantite = array();
                foreach ($result as $row) {
                    array_push($mois, $row['mois']);
                    array_push($quantite, $row['quantite_vendue']);
                }                 
            ?> 
            <h4>Votre progression :</h4> <!-- Affiche le titre de la section -->
<canvas id="ProgressionGraph"></canvas> <!-- Crée un canvas pour afficher le graphique -->

<script> <!-- Débute une section de code JavaScript -->
    var balise = document.getElementById('ProgressionGraph').getContext('2d'); //Récupère le contexte 2D du canvas 
    var graph = new Chart(balise, { //Crée une nouvelle instance de la classe Chart pour dessiner le graphique -->
        type: 'line', //Définit le type de graphique comme une ligne 
        data: { // Définit les données à afficher dans le graphique 
            labels: <?php echo json_encode($mois); ?>, //Récupère les mois à afficher dans le graphique et les encode en format JSON -->
            datasets: [{ // Définit les jeux de données à afficher 
                label: 'Nombre de ventes', //Nom du jeu de données 
                data: <?php echo json_encode($quantite); ?>, // Récupère les quantités vendues à afficher dans le graphique et les encode en format JSON 
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Couleur de fond du graphique
                borderColor: 'rgba(54, 162, 235, 1)', // Couleur de bordure du graphique 
                borderWidth: 1 <!-- Largeur de bordure du graphique -->
            }]
        },
        options: { // Définit les options pour personnaliser le graphique
            scales: { //Définit les échelles pour les axes X et Y du graphique 
                yAxes: [{ //Axe Y 
                    ticks: { // Définit les options pour les étiquettes de l'axe Y 
                        beginAtZero: true // Démarre l'axe à 0 
                    },
                    scaleLabel: { // Définit le titre de l'axe Y 
                        display: true,
                        labelString: 'Nombre de ventes'
                    }
                }],
                xAxes: [{ // Axe X 
                    scaleLabel: { //Définit le titre de l'axe X 
                        display: true,
                        labelString: 'Mois'
                    }
                }]
            }
        }
    });
</script> <!-- Termine la section de code JavaScript -->

            </main>
        </div>
    </div>
</body>
</html>