<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="../js/jQuery.js"></script>
    <script src="../js/signature_pad.js"></script>
    <link href="../css/contrat.css" rel="stylesheet">
</head>

<form method="post" action="signature_traitement.php">
<textera>
<text class ="pdf"> 

<h2> Contrat de vente : </h2>
	<p> Contrat de vente pour un site de jouet entre [Nom de la marketplace] et [Nom du vendeur] (ci-après désigné "le vendeur") à Cergy le [mettre la date].
<br><strong>Objet du contrat : </strong> <p>Le présent contrat établit les termes et conditions de la vente des jouets sur la marketplace.
<br><strong>La durée du contrat : </strong> Le présent contrat est valable pour une période de 1 an à compter de la date de signature.
<br><strong>Commission : </strong> La marketplace percevra une commission de [Commission] % sur chaque vente réalisée sur son site.
<br><strong>Conditions de vente : </strong> Les conditions de vente sont établies par la marketplace et sont soumises à l'approbation du vendeur. Le vendeur s'engage à respecter ces conditions et à les appliquer à toutes les transactions.
<br><strong>Responsabilité du vendeur : </strong> Le vendeur est responsable de la qualité des produits vendus sur la marketplace. En cas de litige avec un client, le vendeur s'engage à coopérer avec la marketplace pour trouver une solution satisfaisante pour toutes les parties.
<br><strong>Conditions de résiliation : </strong> Chaque partie peut résilier le contrat à tout moment, moyennant un préavis de [Nombre de jours] jours. La résiliation doit être notifiée par écrit.
<br><strong>Confidentialité : </strong> Les deux parties s'engagent à maintenir la confidentialité des informations échangées dans le cadre de ce contrat.
<br><strong>Loi applicable : </strong>Ce contrat est régi par les lois en vigueur dans le pays où est établie la marketplace.

<h2>Signatures : </h2> 
Le présent contrat est établi en deux exemplaires originaux, chacune des parties en conservant un exemplaire. Les deux parties reconnaissent avoir pris connaissance et accepté les termes et conditions de ce contrat.
<br>Fait à [Lieu de signature], le [Date de signature]
<br>Pour la marketplace : [Nom et signature de la personne habilitée]
<br>Pour le vendeur : [Nom et signature de la personne habilitée]
</p>
</textera>
    <br>
    <canvas id="signature-pad" class="signature-pad"></canvas>
  <input type="hidden" name="signature-data" id="signature-data" />
  <button type="button" onclick="signaturePad.clear()">Supprimer la signature</button>
    <button type="submit" name="generate_pdf">Générer le contrat en PDF</button>


</form>

<script>
  // Créer le canvas de signature
  var canvas = document.getElementById('signature-pad');
  var signaturePad = new SignaturePad(canvas);

  // Enregistrer la signature dans un champ caché lorsque le formulaire est soumis
  $('form').submit(function() {
    var dataURL = signaturePad.toDataURL();
    $('#signature-data').val(dataURL);
  });


  document.getElementById('signature-pad').parentNode.appendChild(clearButton);

</script>

<?php
  if(isset($_POST['signature-data'])) {
    $signatureData = $_POST['signature-data'];

    // Enregistrer la signature dans la base de données ou la stocker sous forme de fichier, etc.
  }
?>

 





