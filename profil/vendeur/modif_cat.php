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
    <title>Modifier une catégorie</title>
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
                    <div id="title">JeuxVente.fr</div>
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
                <a class="btn btn-dark btn-sm" href="categorie.php">← Retour</a><br><br>
                <h4> Modifier une catégorie <h4><br>
                        <?php
                //récupération des données de la catégorie en question

                require_once '../../include/config.php';
                $check = $bdd->prepare('SELECT * FROM categorie WHERE id=?');
                $id = $_GET['id'];
                $check->execute([$id]);

                $category = $check->fetch(PDO::FETCH_ASSOC);
                if (isset($_POST['modifier'])) {
                    $libelle = $_POST['libelle'];
                    $description = $_POST['description'];

                    if (!empty($libelle) && !empty($description)) { // si les informations sont rentrés dans le formulaire on continue
                        //mise à jour de la base de donnée
                        $requete = $bdd->prepare('UPDATE categorie SET libelle = :libelle, description = :description WHERE id = :id');
                        $requete->execute(array(
                            'libelle' => $libelle, 
                            'description' => $description, 
                            'id' => $id));
                        header('location: categorie.php');
                    } else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Le libellé et la description sont obligatoires.
                        </div>
                        <?php
                    }
                }

                ?>
                <form method="post">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $category['id'] ?>">
                    <label class="form-label">Libellé</label>
                    <input type="text" class="form-control" name="libelle"
                        value="<?php echo $category['libelle'] ?>">

                    <label class="form-label">Description</label>
                    <textarea class="form-control"
                        name="description"><?php echo $category['description'] ?></textarea>

                    <input type="submit" value="Modifier catégorie" class="btn btn-primary my-2"
                        name="modifier">
                </form>
            </main>
        </div>
    </div>
</body>

</html>
