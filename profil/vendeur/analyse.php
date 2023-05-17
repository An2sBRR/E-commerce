<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "vendeur"){
        header('Location: ../../index.php');
    }

    include 'fin_contrat.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Analyse</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        <!-- BARRE DE NAVIATION -->
            <?php include 'barre_navigation_vd.php'; ?>
            <main class="col overflow-auto h-100 w-100">
            <?php 

                //on récupère les données pour le graphique et on les organise par date
                require '../../include/config.php';
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

                // On va stocker des données dans des tableaux pour les utiliser en php
                $mois = array();
                $quantite = array();
                foreach ($result as $row) {
                    array_push($mois, $row['mois']);
                    array_push($quantite, $row['quantite_vendue']);
                }                 
            ?> 
            <!-- Création des graphiques -->
            <h4>Votre progression :</h4>
                    <canvas id="ProgressionGraph"></canvas>
                    <script>
                        var balise = document.getElementById('ProgressionGraph').getContext('2d');
                        var graph = new Chart(balise, {
                            type: 'line',
                            data: {
                                labels: <?php echo json_encode($mois); ?>,
                                datasets: [{
                                    label: 'Nombre de ventes',
                                    data: <?php echo json_encode($quantite); ?>,
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    xAxes: [{
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Mois'
                                        }
                                    }],
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            min: 0,
                                            stepSize: 1
                                            
                                        },
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Nombre de ventes'
                                        }
                                    }]                                    
                                },
                                elements: {
                                    line: {
                                        tension: 0.3
                                    }
                                }
                            }
                        });
                    </script>
            </main>
        </div>
    </div>
</body>
</html>
