<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "vendeur"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/contrat.css" rel="stylesheet">

    <!-- Inclure la bibliothèque SignaturePad -->
    <script src="https://unpkg.com/signature_pad"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>


</head>

<body>

<div class="mt-3 container pb-3 flex-grow-1 d-flex flex-column flex-sm-row ">
  <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
        <h2>Contrat de vente :</h2>
        <p>Contrat de vente pour un site de jouet entre JeuxVente et <strong>
          <?php 
              require '../../include/config.php';
              $requete = $bdd->prepare('SELECT nom, prenom FROM utilisateurs WHERE token = ?');
              $requete->execute([$_SESSION['user']]);
              $resultat = $requete->fetch();
              echo ucfirst($resultat['prenom'])." ";
              echo ucfirst($resultat['nom']);
          ?></strong> à Cergy le
          <?php 
              $requete = $bdd->prepare('SELECT date_inscription FROM utilisateurs WHERE token = ?');
              $requete->execute([$_SESSION['user']]);
              $resultat = $requete->fetch();
              echo ucfirst($resultat['date_inscription'])." ";
              
          ?></p>
        <strong>Objet du contrat :</strong>
        <p>Le présent contrat établit les termes et conditions de la vente des jouets sur la marketplace.</p>
        <strong>La durée du contrat :</strong>
        <p>Le présent contrat est valable pour une période de 1 an à compter de la date de signature.</p>
        <strong>Commission :</strong>
        <p>La marketplace percevra une commission de 5% sur chaque vente réalisée sur son site.</p>
        <strong>Conditions de vente :</strong>
        <p>Les conditions de vente sont établies par la marketplace et sont soumises à l'approbation du vendeur. Le
            vendeur s'engage à respecter ces conditions et à les appliquer à toutes les transactions.</p>
        <strong>Responsabilité du vendeur :</strong>
        <p>Le vendeur est responsable de la qualité des produits vendus sur la marketplace. En cas de litige avec un
            client, le vendeur s'engage à coopérer avec la marketplace pour trouver une solution satisfaisante pour
            toutes les parties.</p>
        <strong>Conditions de résiliation :</strong>
        <p>Chaque partie peut résilier le contrat à tout moment, moyennant un préavis de 30 jours. La résiliation doit
            être notifiée par écrit dans l'espace demande contact, seul l'admin peut gerer cette modification.</p>
        <strong>Confidentialité :</strong>
        <p>Les deux parties s'engagent à maintenir la confidentialité des informations échangées dans le cadre de ce
            contrat.</p>

        <!-- Ajouter les balises pour la signature électronique -->
        <br><br>
          <h5>Signature de : <?php 
                              $requete = $bdd->prepare('SELECT nom, prenom FROM utilisateurs WHERE token = ?');
                              $requete->execute([$_SESSION['user']]);
                              $resultat = $requete->fetch();
                              echo ucfirst($resultat['prenom'])." ";
                              echo ucfirst($resultat['nom']);
                          ?></h5>
          <canvas id="signature-pad" style="border: 1px solid black; padding: 10px;"></canvas>
          <br>
          <form>
              <button id="clear-button">Effacer la signature</button>
              <button id="impression-bouton" type="button" onclick="imprimer_page()">Imprimer cette page</button>
          </form>

          <!-- SCRIPT QUI PERMET D'IMPRIMER LA FACTURE --->
          <script type="text/javascript">
            function imprimer_page() {
                window.print();
            }
            // Créer une nouvelle instance de SignaturePad
            var canvas = document.getElementById('signature-pad');
            var signaturePad = new SignaturePad(canvas);

            // Effacer la signature lorsque le bouton "Effacer" est cliqué
            document.getElementById('clear-button').addEventListener('click', function(event) {
                signaturePad.clear();
            });
          </script>

          <!-- SCRIPT QUI PERMET D'IMPRIMER LA FACTURE --->
          <script type="text/javascript">
          function imprimer_page() {
              window.print();
          }
          </script>
      </div>
    </div>
</body>
</html>
