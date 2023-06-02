<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->

<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "admin"){
        header('Location: ../../index.php');
    }

    require '../../include/config.php';
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
                    <a href="main_ad.php" class="d-block link-dark text-decoration-none">
                        <i id="log-logo" class="bi bi-person-circle"></i>
                    </a> 
                </div>            
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <!-- Barre de navigation -->
            <?php include 'barre_navigation_ad.php'; ?>
            <main class="col overflow-auto h-100 w-100">
                <a class="btn btn-dark btn-sm" href="produit_ad.php">← Retour</a><br><br>
                <?php
                    // connexion à la base de données
                    require_once '../../include/config.php'; 
                ?>
                <h4>Ajouter produit</h4>
                <?php
                // Vérification si le formulaire a été soumis
                if (isset($_POST['ajouter'])) {
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
                        // Génération d'un nom unique pour l'image et ajout de l'extension de l'image
                        $image = $_FILES['image']['name'];
                        $filename = '../data/'.uniqid() . $image;                        
                    }

                    // Vérification si les champs obligatoires ont été remplis
                    if (!empty($libelle) && !empty($prix) && !empty($categorie) && !empty($hauteur) && !empty($poids)) {
                        // Préparation de la requête SQL pour insérer les données dans la base de données
                        $sqlState = $bdd->prepare('INSERT INTO produit VALUES (null,?,?,?,?,?,?,?,?,?,?,?)');

                        // Exécution de la requête SQL avec les valeurs du formulaire
                        $inserted = $sqlState->execute([$libelle, $prix, $hauteur, $poids, $discount, $categorie, $id, $date, $description, $filename, $quantite]);

                        // Vérification si l'insertion a été réussie
                        if ($inserted) {
                            // Déplacement de l'image téléchargée dans le dossier de destination
                            move_uploaded_file($_FILES['image']['tmp_name'], '../../data/' . $filename);

                            // Redirection vers la page des produits
                            header('location: produit_ad.php');
                        } else {
                            // Affichage d'un message d'erreur si l'insertion a échoué
                            echo '<div class="alert alert-danger" role="alert">Database error (40023).</div>';
                        }
                    } else {
                        // Affichage d'un message d'erreur si les champs obligatoires ne sont pas remplis
                        echo '<div class="alert alert-danger" role="alert">Erreur lors de l\'insertion dans la base de donnée. Vérifiez que vous avez bien respecté les contraintes sur le format des informations.</div>';

                    }
                }
            // Début du formulaire pour ajouter un produit
            ?>
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
                <input type="file" class="form-control" name="image">

                <!-- Suite du formulaire ... -->
                <?php
                    // Récupération des catégories de la base de données
                    $categories = $bdd->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
                ?>
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
