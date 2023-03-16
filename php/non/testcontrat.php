
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Contrat de vente de jouets en ligne</title>
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF GENERATOR</title>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        </head>
<body>
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
</p></textera>
	
	<button onclick="generatePDF()">Télécharger le PDF</button>

	<script>
        function generatePDF(){
            //nom du fichier | file name
            var nom_fichier = prompt("Nom du fichier PDF :");
            //generer le pdf
            var element = document.getElementById('text').value;
            var opt = {
                    margin:  0.5,
                    filename:     `${nom_fichier}.pdf`,
                    image:        { type: 'jpeg', quality: 1 },
                    html2canvas:  { scale: 2 },
                    jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
                };
            if(nom_fichier != null){
                html2pdf().set(opt).from(element).save()
            }else {
                alert("Veuillez choisir un nom ")
            }
        }
    </script>
</body>
</html>