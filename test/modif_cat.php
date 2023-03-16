<!doctype html>
<html lang="en">
<head>
    <title>Modifier catégorie</title>
    <!-- CSS -->
<link rel="stylesheet" href ="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style_admin.css">

</head>
<body>
    <?php include 'test.php' ?>
    <h4> Modifier catégories <h4>
    <?php
    require_once '../include/config.php';
    $sqlState = $bdd->prepare('SELECT * FROM categorie WHERE id=?');
    $id = $_GET['id'];
    $sqlState->execute([$id]);

    $category = $sqlState->fetch(PDO::FETCH_ASSOC);
    if (isset($_POST['modifier'])) {
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];

        if (!empty($libelle) && !empty($description)) {
            $sqlState = $bdd->prepare('UPDATE categorie SET libelle = ? ,description = ?, WHERE id = ? ');
            $sqlState->execute([$libelle, $description, $id]);
            header('location: categorie.php');
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Libelle , description sont obligatoires
            </div>
            <?php
        }

    }

    ?>

<form method="post">
        <input type="hidden" class="form-control" name="id" value="<?php echo $category['id'] ?>">
        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle" value="<?php echo $category['libelle'] ?>">

        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"><?php echo $category['description'] ?></textarea>

        <input type="submit" value="Modifier catégorie" class="btn btn-primary my-2" name="modifier">
    </form>
</div>

</body>
</html>