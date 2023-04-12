<?php
    session_start();

    if(empty($_SESSION['panier'])){
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
                        if(getAbonnement() == 1){echo "<h6 id='abonne'>Vous êtes abonné(e), ainsi vous bénéficiez d'une réduction de 10% et de la livraison gratuite.</h6>";}
                        foreach ($_SESSION['panier'] as $idProduit => $quantite) {
                            require '../include/config.php';
                            $requete = $bdd->query('SELECT produit.*, employes.pseudo AS pseudo FROM produit JOIN employes ON produit.id_employes = employes.id WHERE produit.id LIKE '.$idProduit.'')->fetchAll(PDO::FETCH_OBJ);
                            foreach ($requete as $produit){
                                $id=$produit->id;
                                $prix = $produit->prix;
                                $discount = $produit->discount;
                                $prixFinale = $prix - (($prix*$discount)/100);
                                $image=$produit->image;
                                $libelle=$produit->libelle;
                                $quantiteproduit = $produit->quantite;
                                $pseudo = $produit->pseudo;
                            }
                            echo "<div class='card rounded-3 mb-4'>
                            <div class='card-body p-4'>
                                <div class='row d-flex justify-content-between align-items-center'>
                                    <div class='col-md-2 col-lg-2 col-xl-2'>
                                        <img class='img-fluid' width='100' src='../data/".$image."'>
                                    </div>
                                    <div class='col-md-3 col-lg-3 col-xl-3'>
                                        <p class='lead fw-normal mb-2'>".$libelle."</p>
                                        <p><span class='text-muted'>Vendu par : </span>".$pseudo."</p>
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
                        echo "<h4 class='fw-normal text-black total'>Total (hors livraison) : <span id='total'>".$total."</span> €</h4><br>";
                        if(!isset($_SESSION['user']))echo "<h6 class='connexion'>Veuillez-vous connecter <a id='connexion' href='co.php'>ici</a> pour valider votre panier.</h6><br>";
                        echo "<div class='row'>
                                <div class='container'>
                                <form action='' method='post'>
                                    <div class='row'>
                                    <div>
                                        <h5 class='text-uppercase mb-3'>Vos informations</h5>
                                        <label for='nom'><i class='fa fa-user'></i> Nom Prénom</label>
                                        <input type='text' id='nom' name='nom' placeholder='Thomas Dupont' required>
                                        <label for='adresse'><i class='fa fa-address-card-o'></i> Adresse</label>
                                        <input type='text' id='adresse' name='adresse' placeholder='2 rue de la paix' required>
                                        <label for='ville'><i class='fa fa-institution'></i> Ville</label>
                                        <input type='text' id='ville' name='ville' placeholder='Paris' required>
                                        <label for='code_postal'>Code Postal</label>
                                        <input type='text' id='code_postal' name='code_postal' placeholder='75001' required>
                                        <div class='mb-4 '>
                                        <h5 class='text-uppercase mb-3'>Livraison</h5>
                                        <select id='livraison' name='livraison'>
                                            <option value='standard'>Livraison standard (5 jours) - ";if(getAbonnement() == 1){echo "Gratuit";}else{echo "5.00 €";}echo "</option>
                                            <option value='relais'>Livraison en relais (5 jours) - ";if(getAbonnement() == 1){echo "Gratuit";}else{echo "2.00 €";} echo "</option>
                                            <option value='express'>Livraison express (1 à 2 jours) - ";if(getAbonnement() == 1){echo "Gratuit";}else{echo "8.00 €";} echo "</option>
                                        </select><br><br>";
                                        
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                                            $nom_prenom = isset($_POST['nom']) && !empty($_POST['nom']) ? $_POST['nom'] : null;
                                            $adresse = isset($_POST['adresse']) && !empty($_POST['adresse']) ? $_POST['adresse'] : null;
                                            $ville = isset($_POST['ville']) && !empty($_POST['ville']) ? $_POST['ville'] : null;
                                            $code_postal = isset($_POST['code_postal']) && !empty($_POST['code_postal']) ? $_POST['code_postal'] : null;
                                            $livraison = isset($_POST['livraison']) && !empty($_POST['livraison']) ? $_POST['livraison'] : null;
                                        
                                            if (!$nom_prenom || !preg_match("/^[a-zA-ZÀ-ÖØ-öø-ÿ][a-zà-öø-ÿ]+(\s[a-zA-ZÀ-ÖØ-öø-ÿ][a-zA-Zà-öø-ÿ]*){1}$/", $nom_prenom)) {
                                                echo "<h6 class='erreur'> Nom et prénom invalides</h6>";
                                            } else if (!$adresse || !preg_match('/^\d+\s+([a-zA-Z]+\s)*[a-zA-Z]+$/', $adresse)) {
                                                echo "<h6 class='erreur'>Adresse invalide</h6>";
                                            } else if (!$ville || !preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ][a-zA-ZÀ-ÖØ-öø-ÿ\s-]*[a-zA-ZÀ-ÖØ-öø-ÿ]$/', $ville)) {
                                                echo "<h6 class='erreur'>Ville invalide</h6>";
                                            } else if (!$code_postal || !preg_match('/^[0-9]{5}$/', $code_postal)) {
                                                echo "<h6 class='erreur'>Code postal invalide</h6>";
                                            } else if (!$livraison || !in_array($livraison, array('standard', 'express', 'relais'))) {
                                                echo "<h6 class='erreur'>Type de livraison invalide</h6>";
                                            } else if(!isset($_SESSION['user'])){
                                                echo "<h6 class='erreur'>Veuillez-vous connecter</h6>";
                                            }else{
                                                echo "C'EST VALIDAX ON MET TOUS CA DANS LA BDD";
                                            }
                                        }
                                            echo "<h4 class='text-danger total_final'>";
                                            if(getAbonnement() == 1){echo "Total avec votre abonnement : ".$total*(1-0.1)." €";}
                                            echo "</h4><br>";     
                        echo "<div class='card'>
                        <div class='card-body'>
                            <input type='submit' name='submit' value='Valider votre panier' class='btn btn-block btn-lg'>
                        </div></div></div></div>
                        </form></div></div>";
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>        
        <script type="text/javascript" src="../js/panier.js"></script>
</body>
</html>
