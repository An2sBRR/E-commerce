<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>


<?php
require('fpdf/fpdf.php');

class ContractPDF extends FPDF {

    // En-tête
    function Header() {
        // Logo
        //$this->Image('logo.png',10,6,30);
        // Police Arial gras 15
        $this->SetFont('Arial','B',15);
        // Décalage à droite
        $this->Cell(80);
        // Titre
        $this->Cell(30,10,'Contrat',1,0,'C');
        // Saut de ligne
        $this->Ln(20);
    }

    // Pied de page
    function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Numéro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Contenu du contrat
    function Content($data) {
        // Police Arial 12
        $this->SetFont('Arial','',12);
        // Paragraphe
        $this->MultiCell(0,10,'Je soussigné(e) '.$data['name'].' déclare avoir pris connaissance et accepter les termes du contrat suivant : '.$data['contract'],0,'J');
    }
    
}
if(isset($_POST['generate_pdf'])) {

    // Récupération des données du formulaire
    $name = $_POST['name'];
    $contract = $_POST['contract'];

    // Création de l'objet PDF
    $pdf = new ContractPDF();
    // Ajout d'une nouvelle page
    $pdf->AddPage();
    // Ajout du contenu
    $pdf->Content(array('name' => $name, 'contract' => $contract));
    // Nombre total de pages
    $pdf->AliasNbPages();
    // Envoi du PDF au navigateur
    $pdf->Output('D', 'contrat.pdf');
}
?>
