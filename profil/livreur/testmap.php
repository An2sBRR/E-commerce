<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "livreur"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil livreur</title>
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
<!-----EN TETE // MENU -------->
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
                        <li class="my-1 nav-item">
                            <a href="../../index.php" class="nav-link px-2 text-truncate">
                                <i class="bi bi-house fs-5"></i>
                                <span class="d-none d-sm-inline">Accueil</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="colis.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-layout-text-sidebar-reverse"></i></i>
                                <span class="d-none d-sm-inline">Colis</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="testmap.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i>
                                <span class="d-none d-sm-inline">Planning livraison</span> </a>
                        </li>
                        <li class="my-1">
                            <a href="profil2.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
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

<!------------FIN MENU ---------------------->

<?php
// Coordonnées GPS de Cergy
$origin_lat = 49.0397;
$origin_lng = 2.0640;

// Adresse pour les destinations
require '../../include/config.php';
$destinations= $bdd->query('SELECT * FROM commande')->fetchAll(PDO::FETCH_OBJ);

// Génération du code JavaScript pour afficher la carte avec les directions
echo '<div id="map" style="height: 600px;"></div>';
echo '<button class="button button1 w-25" onclick="startDirections()">Démarrer l\'itinéraire</button>';
echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2ztn-aM9tO6iM2dJ6iNdsZOZPmo7H4tA"></script>';
echo '<script>';
echo 'var map = new google.maps.Map(document.getElementById("map"), { center: { lat: ' . $origin_lat . ', lng: ' . $origin_lng . ' }, zoom: 13 });';
echo 'var directionsService = new google.maps.DirectionsService();';
echo 'var directionsRenderer = new google.maps.DirectionsRenderer();';
echo 'directionsRenderer.setMap(map);';
echo 'var request = { origin: { lat: ' . $origin_lat . ', lng: ' . $origin_lng . ' }, destination: { lat: ' . $origin_lat . ', lng: ' . $origin_lng . ' }, waypoints: [';
// Génération de l'URL des directions avec les coordonnées GPS des destinations
$waypoints = '';
foreach ($destinations as $destination) {
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address="
    .urlencode($destination->adresse_livraison)
    .urlencode($destination->ville)
    .urlencode($destination->code_postal)
    ."&key=AIzaSyA2ztn-aM9tO6iM2dJ6iNdsZOZPmo7H4tA";

    $response = file_get_contents($url);
    $data = json_decode($response);

    $lat = $data->results[0]->geometry->location->lat;
    $lng = $data->results[0]->geometry->location->lng;
    $waypoints .= '|' . $lat . ',' . $lng;
    echo '{ location: { lat: ' . $lat . ', lng: ' . $lng . ' } },';
}
echo '], optimizeWaypoints: true, travelMode: "DRIVING" };';
echo 'directionsService.route(request, function(result, status) { if (status == "OK") { directionsRenderer.setDirections(result); } });';

// Fonction pour démarrer l'itinéraire
echo 'function startDirections() {';
echo 'window.open("' . 'https://www.google.com/maps/dir/?api=1&origin=' . $origin_lat . ',' . $origin_lng . '&destination=' . $origin_lat . ',' . $origin_lng . '&waypoints=' . urlencode(substr($waypoints, 1)) . '", "_blank");';
echo '}';

echo '</script>';
?>
