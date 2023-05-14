<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "admin"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Votre Profil</title><link href="../css/bootstrap.css" rel="stylesheet"><link href="../css/bootstrap-icons.css" rel="stylesheet"><link href="../css/sidenav.css" rel="stylesheet"><link href="../css/header2.css" rel="stylesheet"><link href="../css/index.css" rel="stylesheet"><link href="../css/profilpage.css" rel="stylesheet"><script src="../js/bootstrap.js"></script><script src="../js/plotly-2.18.2.min.js"></script><script src="../js/graph.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">JeuVente.fr</div>
            </div>
            <div class="dropdown text-end"><a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i id="log-logo" class="bi bi-person-circle"></i></a></div></div></div></header><div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto"><div class="row flex-grow-sm-1 flex-grow-0 container-fluid"><aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2"><div class="bg-light border rounded-3 p-1 h-100 sticky-top"><ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate"><li class="my-1"><a href="../../index.php" class="nav-link px-2 text-truncate"><i class="bi bi-house fs-5"></i><span class="d-none d-sm-inline">Accueil</span></a></li><li class="my-1"><a href="analyse_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-graph-up"></i></i><span class="d-none d-sm-inline">Analyse</span></a></li><li class="my-1"><a href="vendeur.php" class="nav-link px-2 text-truncate"><i class="bi bi-layout-text-sidebar-reverse"></i></i><span class="d-none d-sm-inline">Liste des vendeurs</span></a></li><li class="my-1"><a href="produit_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i><span class="d-none d-sm-inline">Liste des produits</span> </a></li><li class="my-1 nav-item"><a href="commande.php" class="nav-link px-2 text-truncate"><i class="bi bi-calendar2-check"></i></i><span class="d-none d-sm-inline">Commandes</span> </a></li><li class="my-1"><a href="main_ad.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i><span class="d-none d-sm-inline">Profil</span> </a></li><a href="deconnexion.php" class="nav-link px-2 text-truncate"><i class="bi bi-toggle-off"></i></i><span class="d-none d-sm-inline">Déconnexion</span></a></ul></div>
</aside>
            <main class="col overflow-auto h-100 w-100">
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
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $hauteur = $_POST['hauteur'];
    $poids = $_POST['poids'];
    $discount = $_POST['discount'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];
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
                                //header('location: produit.php');
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

                    }
                    ?>
                    <!-- Début du formulaire de modification du produit -->
<form method="post" enctype="multipart/form-data">

<!-- Un champ caché qui contient l'ID du produit -->
<input type="hidden" name="id" value="<?= $produit->id ?>">

<!-- Champ de texte pour le libellé du produit -->
<label class="form-label">Libelle</label>
<input type="text" class="form-control" name="libelle" value="<?= $produit->libelle ?>">

<!-- Champ numérique pour le prix du produit -->
<label class="form-label">Prix</label>
<input type="number" class="form-control" step="0.1" name="prix" min="0" value="<?= $produit->prix ?>">

<!-- Champ numérique pour la hauteur du produit -->
<label class="form-label">Hauteur</label>
<input type="number" class="form-control" step="0.1" name="hauteur" value="<?php echo $produit->hauteur ?>">

<!-- Champ numérique pour le poids du produit -->
<label class="form-label">Poids</label>
<input type="number" class="form-control" step="0.1" name="poids" min="0" value="<?php echo $produit->poids ?>">

<!-- Champ de type "range" pour la réduction sur le produit -->
<label class="form-label">Discount</label>
<input type="range" value="0" class="form-control" name="discount" min="0" max="90" value="<?= $produit->discount ?>">

<!-- Zone de texte pour la description du produit -->
<label class="form-label">Description</label>
<textarea class="form-control" name="description"><?= $produit->description ?></textarea>

<!-- Champ numérique pour la quantité du produit -->
<label class="form-label">Quantité</label>
<input type="number" class="form-control" name="quantite" min="0" required="required" value="<?php echo $produit->quantite?>">

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
