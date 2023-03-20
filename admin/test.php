<link rel="stylesheet" type="text/css" href="signature-pad.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

<canvas id="signature-pad" class="signature-pad" width="400" height="200"></canvas>

<button type="button" onclick="signaturePad.clear()">Effacer</button>
<button type="button" onclick="saveSignature()">Enregistrer</button>

<script>
var canvas = document.getElementById('signature-pad');
var signaturePad = new SignaturePad(canvas);

function saveSignature() {
  var signatureData = signaturePad.toDataURL();
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        alert('La signature a été enregistrée avec succès !');
      } else {
        alert('Une erreur s\'est produite lors de l\'enregistrement de la signature.');
      }
    }
  };
  xhr.open('POST', 'enregistrer_signature.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send('signatureData=' + signatureData);
}
</script>

<?php
if (isset($_POST['signatureData'])) {
  $signatureData = $_POST['signatureData'];
  // Convertir les données de la signature au format PNG
  $encodedData = str_replace('data:image/png;base64,', '', $signatureData);
  $decodedData = base64_decode($encodedData);
  // Enregistrer la signature dans un fichier
  $filename = 'signature.png';
  file_put_contents($filename, $decodedData);
}
?>
