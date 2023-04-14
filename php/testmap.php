<?php
// Coordonnées GPS de Cergy
$origin_lat = 49.0397;
$origin_lng = 2.0640;

// Coordonnées GPS aléatoires pour les destinations
$destinations = array();
for ($i = 1; $i <= 10; $i++) {
    $lat = 48.8 + (mt_rand() / mt_getrandmax()) * 0.4;
    $lng = 1.9 + (mt_rand() / mt_getrandmax()) * 0.3;
    $destinations[] = array('lat' => $lat, 'lng' => $lng);
}

// Génération de l'URL des directions avec les coordonnées GPS des destinations
$waypoints = '';
foreach ($destinations as $destination) {
    $waypoints .= '|' . $destination['lat'] . ',' . $destination['lng'];
}

// Génération du code JavaScript pour afficher la carte avec les directions
echo '<div id="map" style="height: 600px;"></div>';
echo '<button onclick="startDirections()">Démarrer l\'itinéraire</button>';
echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2ztn-aM9tO6iM2dJ6iNdsZOZPmo7H4tA"></script>';
echo '<script>';
echo 'var map = new google.maps.Map(document.getElementById("map"), { center: { lat: ' . $origin_lat . ', lng: ' . $origin_lng . ' }, zoom: 13 });';
echo 'var directionsService = new google.maps.DirectionsService();';
echo 'var directionsRenderer = new google.maps.DirectionsRenderer();';
echo 'directionsRenderer.setMap(map);';
echo 'var request = { origin: { lat: ' . $origin_lat . ', lng: ' . $origin_lng . ' }, destination: { lat: ' . $origin_lat . ', lng: ' . $origin_lng . ' }, waypoints: [';
foreach ($destinations as $destination) {
    echo '{ location: { lat: ' . $destination['lat'] . ', lng: ' . $destination['lng'] . ' } },';
}
echo '], optimizeWaypoints: true, travelMode: "DRIVING" };';
echo 'directionsService.route(request, function(result, status) { if (status == "OK") { directionsRenderer.setDirections(result); } });';

// Fonction pour démarrer l'itinéraire
echo 'function startDirections() {';
echo 'window.open("' . 'https://www.google.com/maps/dir/?api=1&origin=' . $origin_lat . ',' . $origin_lng . '&destination=' . $origin_lat . ',' . $origin_lng . '&waypoints=' . urlencode(substr($waypoints, 1)) . '", "_blank");';
echo '}';

echo '</script>';
?>
