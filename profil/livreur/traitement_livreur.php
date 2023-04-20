<?php
session_start();
require_once '../../include/config.php'; // On inclut la connexion à la bdd

// Vérification que l'utilisateur est bien un livreur
if ($_SESSION['statut'] == "livreur") {

  // Récupération de l'id du livreur
  $livreur_id = $_SESSION['id'];

  // Insertion des données dans la table "livreur"
  $req = $bdd->prepare("INSERT INTO livreur (id_utilisateur, type_permis, horaire_debut, horaire_fin) VALUES (:id_utilisateur, :type_permis, :horaire_debut, :horaire_fin)");
  $req->bindParam(':id_utilisateur', $livreur_id);
  $req->bindParam(':type_permis', $_POST['type_permis']);
  $req->bindParam(':horaire_debut', $_POST['horaire_debut']);
  $req->bindParam(':horaire_fin', $_POST['horaire_fin']);
  $req->execute();

  // On redirige avec le message de succès
  header('Location:profil2.php?reg_err=success');
  exit;
} else {
  echo "Vous n'êtes pas autorisé à accéder à cette page.";
  exit;
}
?>