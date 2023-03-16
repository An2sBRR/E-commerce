<doctype html>
<html lang = "en">
<head>
     <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

      <!-- CSS -->
<link rel="stylesheet" href ="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style_admin.css">

    <title> Liste des categories </title>
</head>
<body>
  
  <?php include 'test.php' ?>
    <div class="container py-2">
    <h2>Liste des catégories</h2>
        <a href="ajou_categorie.php" class ="btn btn-primary">Ajouter catégorie</a>
        <table class = "table table-striped table-hover">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Description</th>
                <th>Date</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <body>
        <?php
        require_once '../include/config.php';
        $categories = $bdd->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categories as $categorie){
            ?>
            <tr>
                <td><?php echo $categorie['id'] ?></td>
                <td><?php echo $categorie['libelle'] ?></td>
                <td><?php echo $categorie['description'] ?></td>
                <td><?php echo $categorie['date_creation'] ?></td>
                <td>
                    <a href="modif_cat.php?id<?php echo $categorie['id'] ?>" class="btn btn-primary"> Modifier</a>
                    <a href="supp_cat.php?id= <?php echo $categorie['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $categorie['libelle'] ?>');" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        ?>