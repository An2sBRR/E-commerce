<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "vendeur"){
        header('Location: ../../index.php');
    }

    include 'fin_contrat.php';

    $requete = $bdd->prepare('SELECT id FROM utilisateurs WHERE token ="'.$_SESSION['user'].'"');
    $requete->execute();
    $id = $requete->fetchColumn();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
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
            <?php include 'barre_navigation_vd.php'; ?>
            <main class="col overflow-auto h-100 w-100">
                <a class="btn btn-dark btn-sm" href="produit.php">← Retour</a><br><br>
                <?php
            require_once '../../include/config.php';
            ?>
                <h4>Ajouter produit</h4>
                <?php
                if (isset($_POST['ajouter'])) { // Vérification si le formulaire a été soumis
                    // Récupération des valeurs du formulaire
                    $libelle = htmlentities($_POST['libelle'], ENT_QUOTES, 'UTF-8');
                    $prix = $_POST['prix'];
                    $hauteur = $_POST['hauteur'];
                    $poids = $_POST['poids'];
                    $discount = $_POST['discount'];
                    $categorie = $_POST['categorie'];
                    $description = htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8');
                    $quantite = $_POST['quantite'];
                    $date = date('Y-m-d H:i:s');
                    // Assignation d'une image par défaut pour le produit
                    $filename = 'produit.png';
                    // Vérification si une image a été téléchargée
                    if (!empty($_FILES['image']['name'])) {
                        $image = $_FILES['image']['name'];
                        $filename = '../data/'.uniqid() . $image;
                    }
                    // Vérification si les champs obligatoires ont été remplis
                    if (!empty($libelle) && !empty($prix) && !empty($categorie) && !empty($hauteur) && !empty($poids)) {
                        $sqlState = $bdd->prepare('INSERT INTO produit VALUES (null,?,?,?,?,?,?,?,?,?,?,?)');
                        $inserted = $sqlState->execute([$libelle, $prix, $hauteur, $poids, $discount, $categorie, $id, $date, $description, $filename, $quantite]);
                    
                        // Vérification si l'insertion a été réussie
                        if ($inserted) {
                            move_uploaded_file($_FILES['image']['tmp_name'], '../../data/' . $filename);
                            header('location: produit.php');
                        }else {
                            var_dump($sqlState->errorInfo());
                            // Affichage d'un message d'erreur si l'insertion a échoué
                            ?>
                <div class="alert alert-danger" role="alert">
                    Erreur lors de l'insertion dans la base de donnée. Vérifiez que vous avez bien respecté les contraintes sur le format des informations.
                </div>
                <?php
                        }
                    } else {
                        // Affichage d'un message d'erreur si les champs obligatoires ne sont pas remplis
                        ?>
                <div class="alert alert-danger" role="alert">
                    Le libellé, le prix et la catégorie sont obligatoires.
                </div>
                <?php
                    }
                }
                ?>
                <!-- Formulaire -->
                <form method="post" enctype="multipart/form-data">
                    <label class="form-label">Libelle</label>
                    <input type="text" class="form-control" name="libelle">

                    <label class="form-label">Prix</label>
                    <input type="number" class="form-control" step="0.01" name="prix" min="0">

                    <label class="form-label">Hauteur (en centimètre)</label>
                    <input type="number" class="form-control" step="0.01" name="hauteur" min="0">

                    <label class="form-label">Poids (en kilogramme)</label>
                    <input type="number" class="form-control" step="0.001" name="poids" min="0">

                    <label class="form-label">Discount&nbsp&nbsp</label><output name="discountOutput" for="discount">0</output>%
                    <input type="range" value="0" class="form-control" name="discount" min="0" max="90" oninput="discountOutput.value = discount.value">
                    

                    <label class="form-label">Description (255 caractères maximum)</label>
                    <textarea class="form-control" name="description"></textarea>

                    <label class="form-label">Quantité</label>
                    <input type="number" class="form-control" name="quantite" min="0" required="required"></input>

                    <label class="form-label">Image</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" name="image">

                    <?php
                    $categories = $bdd->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <!-- Affichage des différentes catégories -->
                    <label class="form-label">Catégorie</label>
                    <select name="categorie" class="form-control">
                        <option value="">Choisissez une catégorie</option>
                        <?php
                        foreach ($categories as $categorie) {
                            echo "<option value='" . $categorie['id'] . "'>" . $categorie['libelle'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Ajouter produit" class="btn btn-primary my-2" name="ajouter">
                </form>
            </main>
        </div>
    </div>
</body>

</html>
