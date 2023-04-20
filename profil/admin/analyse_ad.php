
<!DOCTYPE html>
<html lang="en">
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
                        <li class="my-1 nav-item">
                            <a href="analyse_ad.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-graph-up"></i></i>
                                <span class="d-none d-sm-inline">Analyse</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="vendeur.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-layout-text-sidebar-reverse"></i></i>
                                <span class="d-none d-sm-inline">Liste des vendeurs</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="produit_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i>
                                <span class="d-none d-sm-inline">Liste des produits</span> </a>
                        </li>
                        <li class="my-1">
                            <a href="commande.php" class="nav-link px-2 text-truncate"><i class="bi bi-calendar2-check"></i></i>
                                <span class="d-none d-sm-inline">Commandes</span> </a>
                        </li>
                        <li class="my-1">
                            <a href="main_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Profil</span> </a>
                        </li>
                        <a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate">
                        <i class="bi bi-toggle-off"></i></i>
                                <span class="d-none d-sm-inline">Déconnexion</span>
                        </a>
                    </ul>
                </div>
            </aside>

            <main class="col overflow-auto h-100 w-100">
                <h4>Votre progression :</h4>
                <div id="ProgressionGraph" class="ProgressionGraph"></div>
                <script>

                var layout = {font: {size: 18},
                                title: "Progression",
                                yaxis: {title: 'chiffre d affaire (€)', showgrid: false},
                                xaxis: {showgrid: false},
                                paper_bgcolor: 'rgba(0,0,0,0)',
                                plot_bgcolor: 'rgba(0,0,0,0)'}
                var config = {responsive: true};

                var trace1 = {
                    x: [1, 2, 3, 4, 5, 6],
                    y: [88, 86, 78, 76, 75, 78],
                    type: 'scatter',
                    mode: 'lines + dot',
                    line: {color: "#702CF6"},
                    name: 'votre chiffre'
                    };
                    var trace2 = {
                    x: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                    y: [80, 80, 80, 80, 80, 80,80, 80, 80, 80],
                    mode: 'lines',
                    line: {dash: 'dot', width: 4, color: "#F29700"},
                    name: 'votre objectif'
                    };
                    var trace3={
                        x: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                    y: [73, 76, 52, 50, 73, 89,67, 50, 63, 80],
                    type: 'scatter',
                    mode: 'lines + dot',
                    name: 'N-1'
                    }

                var data = [trace1, trace2, trace3];

                TESTER = document.getElementById('ProgressionGraph');

                Plotly.newPlot(TESTER, data, layout, config);
                </script>
                <br><br>
<!--2 eme graphique --->
                <h4>Diagramme sur les vendeurs de cette année </h4>
                <div id="chart" class="col overflow-auto h-100 w-100"></div>
                <script>

// Données pour le graphique
var data = [{
  x: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai'],
  y: [10, 15, 12, 8, 11],
  type: 'bar'
}];

// Mise en forme du graphique
var layout = {
  title: 'Nombre de vendeurs',
  xaxis: {
    title: 'Mois'
  },
  yaxis: {
    title: 'Nombre de vendeurs'
  }
};

// Création du graphique
Plotly.newPlot('chart', data, layout);

// Fonction pour mettre à jour les données
function updateData(newData) {
  // Mettre à jour les données existantes
  data[0].y = newData;
  // Mettre à jour le graphique
  Plotly.update('chart', data, layout);
}

// Exemple d'utilisation de la fonction pour ajouter un nouveau vendeur
var newSellerCount = 1; // Nouveau vendeur ajouté en Mai
var currentData = data[0].y;
currentData[4] += newSellerCount; // Ajouter le nouveau vendeur à la liste des vendeurs de Mai
updateData(currentData);


</script>
            </main>
        </div>
    </div>
   

</body>
</html>


  