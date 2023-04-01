
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier produits</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/sidenav.css" rel="stylesheet">
    <link href="css/header2.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/profilpage.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <script src="js/plotly-2.18.2.min.js"></script>
    <script src="js/graph.js"></script>
</head>
<body>
    <header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">JeuVente.fr</div>
            </div>
            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i id="log-logo" class="bi bi-person-circle"></i>
              </a> 
            </div>
          </div>
        </div>
      </header>
      <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2">
                <div class="bg-light border rounded-3 p-1 h-100 sticky-top">
                    <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate">
                        <li class="my-1">
                            <a href="main.php" class="nav-link px-2 text-truncate">
                                <i class="bi bi-house fs-5"></i>
                                <span class="d-none d-sm-inline">Accueil</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="categorie.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-graph-up"></i></i>
                                <span class="d-none d-sm-inline">Analyse</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="categorie.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-layout-text-sidebar-reverse"></i></i>
                                <span class="d-none d-sm-inline">Liste des categories</span>
                            </a>
                        </li>
                        <li class="my-1 nav-item">
                            <a href="produit.php" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i>
                                <span class="d-none d-sm-inline">Liste des produits</span> </a>
                        </li>
                        <li class="my-1">
                            <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-calendar2-check"></i></i>
                                <span class="d-none d-sm-inline">Commandes</span> </a>
                        </li>
                        <li class="my-1">
                            <a href="profil.php" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Profil</span> </a>
                        </li>
                        <a href="../php/deconnexion.php" class="nav-link px-2 text-truncate">
                        <i class="bi bi-toggle-off"></i></i>
                            <span class="d-none d-sm-inline">Déconnexion</span>
                        </a>
                    </ul>
                </div>
            </aside>
            <main class="col overflow-auto h-100 w-100">
                <?php
                require_once '../include/config.php';
                ?>
                    <h4>Modifier produit</h4>
                    <?php
                    $id = $_GET['id'];
                    require_once '../include/config.php';
                    $sqlState = $bdd->prepare('SELECT * from produit WHERE id=?');
                    $sqlState->execute([$id]);
                    $produit = $sqlState->fetch(PDO::FETCH_OBJ);;
                    if (isset($_POST['modifier'])) {
                        $libelle = $_POST['libelle'];
                        $prix = $_POST['prix'];
                        $discount = $_POST['discount'];
                        $categorie = $_POST['categorie'];
                        $description = $_POST['description'];

                        $filename = '';
                        if (!empty($_FILES['image']['name'])) {
                            $image = $_FILES['image']['name'];
                            $filename = uniqid() . $image;
                            move_uploaded_file($_FILES['image']['tmp_name'], 'upload/produit/' . $filename);
                        }


                        if (!empty($libelle) && !empty($prix) && !empty($categorie)) {

                            if (!empty($filename)) {
                                $query = "UPDATE produit SET libelle=? ,
                                                                    prix=? ,
                                                                    discount=? ,
                                                                    id_categorie=?,
                                                                    description=?,
                                                                    image=?
                                                                WHERE id = ? ";
                                $sqlState = $bdd->prepare($query);
                                $updated = $sqlState->execute([$libelle, $prix, $discount, $categorie, $description, $filename, $id]);
                            } else {
                                $query = "UPDATE produit 
                                                                SET libelle=? ,
                                                                    prix=? ,
                                                                    discount=? ,
                                                                    id_categorie=?,
                                                                    description=?
                                                                WHERE id = ? ";
                                $sqlState = $bdd->prepare($query);
                                $updated = $sqlState->execute([$libelle, $prix, $discount, $categorie, $description, $id]);
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
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $produit->id ?>">
                        <label class="form-label">Libelle</label>
                        <input type="text" class="form-control" name="libelle" value="<?= $produit->libelle ?>">

                        <label class="form-label">Prix</label>
                        <input type="number" class="form-control" step="0.1" name="prix" min="0" value="<?= $produit->prix ?>">

                        <label class="form-label">Discount</label>
                        <input type="range" value="0" class="form-control" name="discount" min="0" max="90"
                            value="<?= $produit->discount ?>">

                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description"><?= $produit->description ?></textarea>

                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                        <img width="250" class="img img-fluid" src="upload/produit/<?= $produit->image ?>"><br>
                        <?php

                        ?>

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