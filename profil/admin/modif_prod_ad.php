<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "admin"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de produit</title>
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
                    <a href="main_ad.php" class="d-block link-dark text-decoration-none">
                        <i id="log-logo" class="bi bi-person-circle"></i>
                    </a> 
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <?php include 'barre_navigation_ad.php'; ?>
            <main class="col overflow-auto h-100 w-100">
                <a class="btn btn-dark btn-sm" href="produit_ad.php">← Retour</a><br><br>
                <?php
                require '../../include/config.php';
                ?>
                <!-- Affichage d'un titre de niveau 4 -->
                <h4>Modifier produit</h4>

                <?php
                    // Récupération de l'identifiant du produit à modifier depuis l'URL
                    $id = $_GET['id'];

                    // Préparation d'une requête SQL pour obtenir les détails du produit à modifier
                    $sqlState = $bdd->prepare('SELECT * from produit WHERE id=?');
                    $sqlState->execute([$id]);

                    // Récupération des détails du produit
                    $produit = $sqlState->fetch(PDO::FETCH_OBJ);

                    // Vérification si le formulaire de modification a été soumis
                    if (isset($_POST['modifier'])) {
                        // Récupération des nouvelles valeurs des champs du formulaire
                        $libelle = htmlentities($_POST['libelle'], ENT_QUOTES, 'UTF-8');
                        $prix = $_POST['prix'];
                        $hauteur = $_POST['hauteur'];
                        $poids = $_POST['poids'];
                        $discount = $_POST['discount'];
                        $categorie = $_POST['categorie'];
                        $description = htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8');
                        $quantite = $_POST['quantite'];

                        $filename = '';
                        // Vérification si une nouvelle image a été téléchargée
                        if (!empty($_FILES['image']['name'])) {
                            $image = $_FILES['image']['name'];
                            $filename = uniqid() . $image;
                            // Déplacement de l'image téléchargée vers le dossier 'data'
                            move_uploaded_file($_FILES['image']['tmp_name'], '../../data' . $filename);
                        }

                        // Vérification si tous les champs obligatoires sont remplis
                        if (!empty($libelle) && !empty($prix) && !empty($categorie) && !(empty($hauteur)) && !(empty($quantite)) && !(empty($poids))) {
                            // Préparation de la requête SQL pour mettre à jour les détails du produit
                            if (!empty($filename)) {
                                $query = "UPDATE produit SET libelle=? ,prix=?, hauteur=?, poids=?, discount=?, id_categorie=?, description=?, image=?, quantite=?WHERE id = ? ";
                                $sqlState = $bdd->prepare($query);
                                $updated = $sqlState->execute([$libelle, $prix, $hauteur, $poids, $discount, $categorie, $description, $filename, $quantite, $id]);
                            } else {
                                $query = "UPDATE produit SET libelle=? ,prix=? ,hauteur=?,poids=?,discount=? ,id_categorie=?,description=?,quantite=? WHERE id = ? ";
                                $sqlState = $bdd->prepare($query);
                                $updated = $sqlState->execute([$libelle, $prix, $hauteur, $poids, $discount, $categorie, $description, $quantite,$id]);
                            }

                            if ($updated) {
                                header('location: produit_ad.php');
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
                                Libelle , prix , catégorie sont obligatoires.
                            </div>
                            <?php
                        }

                    }?>
                <!-- Début du formulaire de modification du produit -->
                <form method="post" enctype="multipart/form-data">

                    <!-- Un champ caché qui contient l'ID du produit -->
                    <input type="hidden" name="id" value="<?= $produit->id ?>">

                    <!-- Champ de texte pour le libellé du produit -->
                    <label class="form-label">Libelle</label>
                    <input type="text" class="form-control" name="libelle" value="<?= $produit->libelle ?>">

                    <!-- Champ numérique pour le prix du produit -->
                    <label class="form-label">Prix</label>
                    <input type="number" class="form-control" step="0.01" name="prix" min="0"
                        value="<?= $produit->prix ?>">

                    <!-- Champ numérique pour la hauteur du produit -->
                    <label class="form-label">Hauteur</label>
                    <input type="number" class="form-control" step="0.01" name="hauteur"
                        value="<?php echo $produit->hauteur ?>">

                    <!-- Champ numérique pour le poids du produit -->
                    <label class="form-label">Poids</label>
                    <input type="number" class="form-control" step="0.01" name="poids" min="0"
                        value="<?php echo $produit->poids ?>">

                    <!-- Champ de type "range" pour la réduction sur le produit -->
                    <label class="form-label">Discount</label>
                    <input type="range" value="0" class="form-control" name="discount" min="0" max="90"
                        value="<?= $produit->discount ?>">

                    <!-- Zone de texte pour la description du produit -->
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description"><?= $produit->description ?></textarea>

                    <!-- Champ numérique pour la quantité du produit -->
                    <label class="form-label">Quantité</label>
                    <input type="number" class="form-control" name="quantite" min="0" required="required"
                        value="<?php echo $produit->quantite?>">

                    <!-- Champ pour télécharger l'image du produit -->
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">

                    <!-- Affichage de l'image actuelle du produit -->
                    <img width="250" class="img img-fluid" src="../../data/<?= $produit->image ?>"><br>

                    <!-- Récupération des catégories de produits de la base de données -->
                    <?php
                    $categories = $bdd->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <!-- Liste déroulante pour sélectionner la catégorie du produit -->
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

                    <!-- Bouton pour soumettre le formulaire -->
                    <input type="submit" value="Modifier produit" class="btn btn-primary my-2" name="modifier">
                </form>
                <!-- Fin du formulaire -->
        </div>
        </main>
    </div>
    </div>
</body>
</html>
