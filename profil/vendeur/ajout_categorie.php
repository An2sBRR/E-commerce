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
    <title>Ajouter une catégorie</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box" >
        <div class="container-fluid col-11" id="header-container">
          <div class=" d-flex align-items-center justify-content-between">
            <div class="py-3 col-sm-auto justify-content-center">
              <div id="title">JeuxVente.fr</div>
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
            <?php include 'barre_navigation_vd.php'; ?>
            <main class="col overflow-auto h-100 w-100">
                <h4> Ajouter catégorie </h4>  <br>
                <form method="post">
                    <label class="from-label">Libellé</label>
                    <input type="text" class="from-control" name="libelle"><br><br>
                    <label class="from-label">Description</label>
                    <input type="text" class="from-control" name="description"><br><br>
                    <input type="submit" value="Ajouter catégorie" class="btn btn-primary my-2" name="ajouter">
                </form>
                <?php
                    if(isset($_POST['ajouter'])){
                        $libelle = $_POST['libelle'];
                        $description = $_POST['description'];
                        $date = date('Y-m-d H:i:s');

                        if(!empty($libelle) && !empty($description)){
                            require '../../include/config.php';
                            $check = $bdd->prepare('INSERT INTO categorie(libelle,description,date_creation) VALUES(:libelle,:description,:date_creation)');
                            $check->execute(array(
                                'libelle' => $libelle,
                                'description' => $description,
                                'date_creation' => $date));
                        }else{
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Le libellé et la description sont obligatoires.
                            </div>
                            <?php
                        }
                    }
                ?>
            </main>
        </div>
    </div>
</body>
</html>
