<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "client"){
        header('Location: ../../index.php');
    }
?>
<?php
require_once '../../include/config.php'; // On inclut la connexion à la BDD

// Si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // On vérifie que toutes les données requises ont été fournies
    if (!empty($_POST['id_client']) && !empty($_POST['motif'])) {
        // On récupère les données du formulaire et on les nettoie
        $id_client = htmlspecialchars($_POST['id_client']);
        $motif = htmlspecialchars($_POST['motif']);
        $details = !empty($_POST['details']) ? htmlspecialchars($_POST['details']) : null;

        // On insère les données dans la BDD
        $insert = $bdd->prepare('INSERT INTO retours(id_client, motif, details) VALUES(:id_client, :motif, :details)');
        $insert->execute(array(
            'id_client' => $id_client,
            'motif' => $motif,
            'details' => $details
        ));

        // On affiche un message de confirmation
        echo "Le retour a bien été enregistré.";
    } else {
        // Si des données requises sont manquantes, on affiche un message d'erreur
        echo "Tous les champs requis doivent être renseignés.";
    }
}
?>
