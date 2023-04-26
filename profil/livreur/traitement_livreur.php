
<!-- On a securisé la page c'est a dire le livreur a acces qu'au page livreur que si il est connecté 
sinon l'utilisateur est redireigé sur la page index -->
<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "livreur"){
        header('Location: ../../index.php');
    }
?>
<?php
  require_once '../../include/config.php'; // On inclut la connexion à la bdd
// on appelle la table utilisateuur pour prendre l'id
  $requete=$bdd->prepare('SELECT id FROM utilisateurs WHERE token = ?');
  $requete->execute([$_SESSION['user']]);
  $livreur_id = $requete->fetchColumn();
  // Vérification que l'utilisateur est bien un livreur
  if ($_SESSION['statut'] == "livreur") {
    // Insertion des données dans la table "livreur"
    $req = $bdd->prepare("INSERT INTO livreur(id_utilisateurs, type_permis, horaire_debut, horaire_fin) VALUES (:id_utilisateur, :type_permis, :horaire_debut, :horaire_fin)");
    $req->execute(array(
      'id_utilisateur' => $livreur_id,
      'type_permis' => $_POST['type_permis'],
      'horaire_debut' => $_POST['horaire_debut'],
      'horaire_fin' => $_POST['horaire_fin']
    ));

    // On redirige avec le message de succès
    header('Location:profil2.php?reg_err=success');
    exit;
  } else {
    echo "Vous n'êtes pas autorisé à accéder à cette page.";
    exit;
  }
?>
