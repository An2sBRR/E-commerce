<?php
    session_start();
    //unset($_SESSION['panier']);
    if($_SESSION['panier'] == NULL){
        unset($_SESSION['panier']);
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/panier.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">    

    <title>Votre panier</title>
</head>
<body>
    <header class="container-fluid header">
        <div class="container">
            <a href="../index.php" class="logo">JeuxVentes.fr</a>
        </div>
    </header>
    <section class="h-100" style="background-color: #eee;">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    <div class="d-flex align-items-center mb-4">
                    <?php 
                    $total = 0;
                    if(isset($_SESSION['panier'])){
                        echo"<h3 class='fw-normal mb-0 text-black'>Votre panier</h3></div>";
                        if(getAbonnement() == 1){echo "<h6>Vous êtes abonné(e), ainsi vous bénéficiez d'une réduction de 10% et de la livraison gratuite.</h6>";}
                        foreach ($_SESSION['panier'] as $idProduit => $quantite) {
                            require '../include/config.php';
                            $requete = $bdd->query('SELECT * FROM produit WHERE id LIKE '.$idProduit.'')->fetchAll(PDO::FETCH_OBJ);
                            foreach ($requete as $produit){
                                $id=$produit->id;
                                $prix = $produit->prix;
                                $discount = $produit->discount;
                                $prixFinale = $prix - (($prix*$discount)/100);
                                $image=$produit->image;
                                $libelle=$produit->libelle;
                                $quantiteproduit = $produit->quantite;
                            }
                            echo "<div class='card rounded-3 mb-4'>
                            <div class='card-body p-4'>
                                <div class='row d-flex justify-content-between align-items-center'>
                                    <div class='col-md-2 col-lg-2 col-xl-2'>
                                        <img class='img-fluid' width='100' src='../data/".$image."'>
                                    </div>
                                    <div class='col-md-3 col-lg-3 col-xl-3'>
                                        <p class='lead fw-normal mb-2'>".$libelle."</p>
                                        <p><span class='text-muted'>Vendu par : </span>M</p>
                                        <p><span class='text-muted'>Prix unitaire :</span> ".$prixFinale." €</p>
                                    </div>
                                    <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                                        <input min='0' id='".$id."' max='".$quantiteproduit."' name='quantity' value='".$quantite."' type='number' class='form-control form-control-sm ".$id."' onFocus='this.blur()' onchange='modifier_quantite(this.id,this.value)'/>
                                    </div>
                                    <div class='col-md-3 col-lg-2 col-xl-2 offset-lg-1'>
                                        <h5 class='mb-0'>".$prixFinale*$quantite." €</h5>
                                    </div>
                                    <div class='col-md-1 col-lg-1 col-xl-1 text-end'>
                                        <i class='fa fa-trash fa-lg text-danger' id='".$id."' onclick='supprimer_ligne(this.id)'></i>
                                    </div>
                                </div>
                            </div>
                            </div>";
                            $total += $prixFinale*$quantite;
                        }
                        echo "<h4 class='fw-normal text-black total'>Total (hors livraison) : ".$total." €</h4>";
                        if(!isset($_SESSION['user']))echo "<h6 class='connexion'>Veuillez-vous connecter <a id='connexion' href='co.php'>ici</a> pour valider votre panier.</h6><br>";
                        if(getAbonnement() == 1){echo "<h4 class='text-danger total_abo'>Total avec réduction : ".$total*(1-0.1)." €</h4>";}
                        echo "<h5 class='text-uppercase mb-3'>Livraison</h5>
                        <div class='mb-4 pb-2'>
                        <select class='select'>
                            <option value='1'>Livraison standard (5 jours) - ";if(getAbonnement() == 1){echo "Gratuit";}else{echo "5.00 €";}
                            echo "</option>
                            <option value='2'>Livraison en relais (5 jours) - ";if(getAbonnement() == 1){echo "Gratuit";}else{echo "2.00 €";} echo "</option>
                            <option value='3'>Livraison express (1 à 2 jours) - ";if(getAbonnement() == 1){echo "Gratuit";}else{echo "8.00 €";} echo "</option>
                        </select>
                        </div>
                        <div class='card'>
                        <div class='card-body'>
                            <button type='button' class='btn btn-block btn-lg'>Valider votre panier</button>
                        </div>
                        </div>";
                    }else{
                        echo "<h3 class='fw-normal mb-0 text-black'>Votre panier est vide</h3></div>";
                    }
                    ?>
                </div>
                </div>
            </div>
        </section>
        <?php
            function getAbonnement(){
                require '../include/config.php';
                if(isset($_SESSION['user'])){
                    $req = "SELECT abonnement FROM utilisateurs WHERE token='".$_SESSION['user']."'";
                    $stmt = $bdd->prepare($req);
                    $stmt->execute();
                    $data = $stmt->fetchColumn();
                    return $data;
                }else return 2; //il n'est pas connecte
            }
        ?>
        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/panier.js"></script>
</body>
</html>