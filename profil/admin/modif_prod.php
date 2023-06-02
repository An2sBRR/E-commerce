<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->

<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "vendeur"){
        header('Location: ../../index.php');
    }

    include 'fin_contrat.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier votre produit</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box">
        <div class="container-fluid col-11" id="header-container">
            <div class=" d-flex align-items-center justify-content-between">
                <div class="py-3 col-sm-auto justify-content-center">
                    <div id="title">LE REPÈRE DE MASS</div>
                </div>
                <div class="text-end">
                    <a href="profil.php" class="d-block link-dark text-decoration-none">
                        <i id="log-logo" class="bi bi-person-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <!-- BARRE DE NAVIGATION -->
            <?php include 'barre_navigation_vd.php'; ?>
            <main class="col overflow-auto h-100 w-100">
                <a class="btn btn-dark btn-sm" href="produit.php">← Retour</a><br><br>
                <?php
                require'../../include/config.php';
                ?>
                <h4>Modifier produit</h4>
                <?php

                    //récupération des données
                    $id = $_GET['id'];
                    $sqlState = $bdd->prepare('SELECT * from produit WHERE id=?');
                    $sqlState->execute([$id]);
                    $produit = $sqlState->fetch(PDO::FETCH_OBJ);;
                    if (isset($_POST['modifier'])) {
                        $libelle = htmlentities($_POST['libelle'], ENT_QUOTES, 'UTF-8');
                        $prix = $_POST['prix'];
                        $hauteur = $_POST['hauteur'];
                        $poids = $_POST['poids'];
                        $discount = $_POST['discount'];
                        $categorie = $_POST['categorie'];
                        $description = htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8');
                        $quantite = $_POST['quantite'];

                        $filename = '';
                        if (!empty($_FILES['image']['name'])) {
                            $image = $_FILES['image']['name'];
                            $filename = uniqid() . $image;
                            move_uploaded_file($_FILES['image']['tmp_name'], '../../data/' . $filename);
                        }

                        if (!empty($libelle) && !empty($prix) && !empty($categorie) && !(empty($hauteur)) && !(empty($quantite)) && !(empty($poids))) {
                            //On met à jour la base de donnée avec les nouvelles données récupérés
                            if (!empty($filename)) {
                                $query = "UPDATE produit SET libelle=? ,
                                                                    prix=? ,
                                                                    hauteur=?,
                                                                    poids=?,
                                                                    discount=? ,
                                                                    id_categorie=?,
                                                                    description=?,
                                                                    image=?,
                                                                    quantite=?
                                                                WHERE id = ? ";
                                $sqlState = $bdd->prepare($query);
                                $updated = $sqlState->execute([$libelle, $prix, $hauteur, $poids, $discount, $categorie, $description, $filename, $quantite, $id]);
                            } else {
                                $query = "UPDATE produit 
                                                                SET libelle=? ,
                                                                    prix=? ,
                                                                    hauteur=?,
                                                                    poids=?,
                                                                    discount=? ,
                                                                    id_categorie=?,
                                                                    description=?,
                                                                    quantite=?
                                                                WHERE id = ? ";
                                $sqlState = $bdd->prepare($query);
                                $updated = $sqlState->execute([$libelle, $prix, $hauteur, $poids, $discount, $categorie, $description, $quantite,$id]);
                            }

                            if ($updated) {
                                header('location: produit.php');
                            } else {

                                ?>
                <div class="alert alert-danger" role="alert">
                    Database error (40023).
                </div>
                <?php
                            }
                        } else {
                            ?>
                <div class="alert alert-danger" role="alert">
                    Le libellé, le prix et le nom du produits sont obligatoires.
                </div>
                <?php
                        }

                    }
                    ?>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $produit->id ?>">
                    <label class="form-label">Libelle</label>
                    <input type="text" class="form-control" name="libelle" value="<?= $produit->libelle ?>">

                    <label class="form-label">Prix</label>
                    <input type="number" class="form-control" step="0.01" name="prix" min="0"
                        value="<?= $produit->prix ?>">

                    <label class="form-label">Hauteur (en centimètre)</label>
                    <input type="number" class="form-control" step="0.01" name="hauteur"
                        value="<?= $produit->hauteur ?>">

                    <label class="form-label">Poids (en kilogramme)</label>
                    <input type="number" class="form-control" step="0.01" name="poids" min="0"
                        value="<?= $produit->poids ?>">

                    <label class="form-label">Discount</label>
                    <input type="range" value="0" class="form-control" name="discount" min="0" max="90"
                        value="<?= $produit->discount ?>">

                    <label class="form-label">Description (maximum 255 caractères)</label>
                    <textarea class="form-control" name="description"><?= $produit->description ?></textarea>

                    <label class="form-label">Quantité</label>
                    <input type="number" class="form-control" name="quantite" min="0" required="required"
                        value="<?= $produit->quantite?>"></input>

                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                    <img width="250" class="img img-fluid" src="../../data/<?= $produit->image ?>"><br>

                    <?php
                        $categories = $bdd->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                    <label class="form-label">Catégorie</label>
                    <select name="categorie" class="form-control">
                        <option value="">Choisissez une catégorie</option>
                        <?php
                            foreach ($categories as $categorie) {
                                $selected = $produit->id_categorie == $categorie['id'] ? ' selected ' : '';
                                echo "<option $selected value='" . $categorie['id'] . "'>" . $categorie['libelle'] . "</option>";
                            }
                            ?>
                    </select>
                    <input type="submit" value="Modifier produit" class="btn btn-primary my-2" name="modifier">
                </form>
        </div>
        </main>
    </div>
    </div>
</body>

</html>
