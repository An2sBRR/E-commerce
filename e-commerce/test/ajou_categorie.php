<doctype html>
<html lang = "en">
<head>
     <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title> Ajouter categorie </title>

<link rel="stylesheet" href ="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style_admin.css">

</head>
<body>
<?php include 'test.php' ?>
    <h4> Ajouter catégorie </h4>  
    <?php
     if(isset($_POST['ajouter'])){
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];

        if(!empty($libelle) && !empty($description)){
            require_once '../include/config.php';
            $check = $bdd->prepare('INSERT INTO categorie(libelle,description) VALUES(?,?)');
            $check->execute([$libelle,$description]);
            header('location: categorie.php');
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
                Libelle , description sont obligatoires
            </div>
            <?php
        }
    }
?>
<form method="post">
    <label class="from-label">Libelle</label>
    <input type="text" class="from-control" name="libelle">
    <label class="from-label">Description</label>
    <input type="text" class="from-control" name="description">
    <input type="submit" value="Ajouter catégorie" class="btn btn-primary my-2" name="ajouter">
</form>

</body>
</html>


      

