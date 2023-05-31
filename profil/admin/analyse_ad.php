<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "admin"){
        header('Location: ../../index.php');
    }
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
    <header class="shadow rounded-3 bg-light" id="header-box">
        <div class="container-fluid col-11" id="header-container">
            <div class=" d-flex align-items-center justify-content-between">
                <div class="py-3 col-sm-auto justify-content-center">
                    <div id="title">LE REPÈRE DE MASS</div>
                </div>
                <div class="text-end">
                    <a href="main_ad.php" class="d-block link-dark text-decoration-none">
                        <i id="log-logo" class="bi bi-person-circle"></i>
                    </a> 
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <?php include 'barre_navigation_ad.php'; ?>
            <main class="col overflow-auto">
                <?php 
                  require '../../include/config.php';
                  $requete = $bdd->prepare("SELECT DATE_FORMAT(date_creation, '%Y-%m') as month, SUM(commission) as commission_sum FROM commande GROUP BY month ORDER BY month");
                  $requete->execute();
                  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

                  // On va stocker des données dans des tableaux pour les utiliser en php
                  $months = array();
                  $commissions = array();
                  foreach ($result as $row) {
                    
                    array_push($months, $row['month']);
                    array_push($commissions, $row['commission_sum']);
                  }                  
                ?>
                <title>Graphique des inscriptions de vendeurs</title>
                <h4>Votre chiffre d'affaire :</h4>
                <!-- Création de l'élément canvas qui va contenir le graphe -->
                <canvas id="graphique1"></canvas>
                <script>
                var balise = document.getElementById('graphique1').getContext('2d');
                var graph = new Chart(balise, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($months); ?>,
                        datasets: [{
                            label: 'Chiffre d\'affaires en fonction des commissions',
                            data: <?php echo json_encode($commissions); ?>,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Somme des commissions'
                                }
                            }],
                            xAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Mois'
                                }
                            }]
                        }
                    }
                });
                </script>
                <br><br>

                <!--2 eme graphique --->
                <?php
                $requete = $bdd->query("SELECT DATE_FORMAT(date_inscription, '%Y-%m') as month, COUNT(*) AS total_inscriptions FROM utilisateurs WHERE statut = 'vendeur' GROUP BY month ORDER BY month");
                $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
                // On construit les tableaux de labels et de données pour le graphique
                $labels = array();
                $data = array();
                foreach ($donnees as $row) {
                    $labels[] = $row['month'];
                    $data[] = $row['total_inscriptions'];
                }
              ?>
                <title>Graphique des inscriptions de vendeurs</title>
                <h4>Nombre de vendeur :</h4>
                <!-- Création de l'élément canvas qui va contenir le graphe -->
                <canvas id="graphique2"></canvas>
                <script>
                // Récupération de l'élément canvas et initialisation du graphe
                var element = document.getElementById('graphique2').getContext('2d');
                var graphique = new Chart(element, {
                    // Définition du type de graphe (barre)
                    type: 'bar',
                    // Définition des données à afficher
                    data: {
                        labels: <?php echo json_encode($labels); ?>, // étiquettes de l'axe x (date inscription)
                        datasets: [{
                            label: 'Nombre d\'inscriptions', // nom de la série de données
                            data: <?php echo json_encode($data); ?>, // valeurs de la série de données
                            backgroundColor: 'rgba(75, 192, 192, 0.2)', // couleur de fond des barres
                            borderColor: 'rgba(75, 192, 192, 1)', // couleur de bordure des barres
                            borderWidth: 2 // largeur de bordure des barres
                        }]
                    },
                    // Options de configuration du graphe
                    options: {
                        scales: {
                            xAxes: [{
                                ticks: {
                                    beginAtZero: true, // afficher l'axe y à partir de 0
                                    stepSize: 1 // afficher les valeurs de l'axe y de 1 en 1
                                }
                            }]
                        }
                    }
                });
                </script>
            </main>
        </div>
    </div>
</body>
</html>