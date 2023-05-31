<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
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
    <title>Votre itinéraire</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
</head>
<!-----EN TETE // MENU -------->
<body>
    <header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">LE REPÈRE DE MASS</div>
            </div>
            <div class="text-end">
                    <a href="profil2.php" class="d-block link-dark text-decoration-none">
                        <i id="log-logo" class="bi bi-person-circle"></i>
                    </a> 
                </div>
          </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <!-- BARRE DE NAVIGATION -->
            <?php include 'barre_navigation_lv.php'; ?>

            <!------------FIN MENU ---------------------->
            <main class="col overflow-auto h-100 w-100">

            <?php
            // Coordonnées GPS de Cergy
            $origin_lat = 49.0397;
            $origin_lng = 2.0640;

            // Adresse pour les destinations
            require '../../include/config.php';
            $resultat = $bdd->query("SELECT id FROM utilisateurs WHERE token LIKE '".$_SESSION['user']."'")->fetch(PDO::FETCH_OBJ);
            $id_utilisateur = intval($resultat->id);
            $destinations= $bdd->query("SELECT * FROM commande WHERE id_livreur LIKE ".$id_utilisateur." AND commande_livre = 0")->fetchAll(PDO::FETCH_OBJ);

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
            </main>
        </div>
    </div>
</body>
</html>
