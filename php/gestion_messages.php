<?php
$demandes = json_decode(file_get_contents('../data/messages.json'), true);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/contacter.css" />
    <link href="https://fonts.googleapis.com/css2?family=Boogaloo&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

     <!-- INCLUSION ICONS -->
     <script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" ></script> 
    <script  nomodule  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" ></script>

    <title>Gestion des messages</title>
</head>
<body>

    <!-- HEADER -->
    <header class="container-fluid header">
        <div class="container">

            <!-- LOGO SITE -->
            <a href="../index.php" class="logo">JeuxVentes.fr</a>
            
            <!-- ICONS -->
            <div class="icons">
                    <a href='./gestion_messages.php' class='reseauxlog'><ion-icon name=mail-unread-outline></ion-icon> </a>
                    <a href='../profil/admin/main_ad.php' class='reseauxlog'> <ion-icon name=flask-outline></ion-icon> </a>
                    <a href='./deconnexion.php' class='reseauxlog'><ion-icon name=power-outline></ion-icon> </a>
             
        </div>
    </header>
    <!-- FIN DU HEADER -->


<main>

<!-- si l'admin na recu aucun message alors une notification apparait --->
<?php if(empty($demandes)): ?>
    <div class="message">
        <p>Pas de nouveau message</p>
    </div>
<!-- sinon afficher les messages  --->
<?php else: ?>
    <?php foreach ($demandes as $demande) : ?>
        <section class="message <?php echo $demande['utilisateur']; ?>">
            <a href="traitement_contact.php?del=<?php echo $demande['id']; ?>" class="action" id="ferme">X</a><br>
            <header>
                <div class="user-date">
                    <h2><?php echo $demande['utilisateur']; ?></h2>
                    <p><b>Date : </b><?php echo $demande['date']; ?></p>
                </div>
            </header>
            <div class="nom">
                <h3><?php echo $demande['nom']; ?></h3>
            </div>
            <div class="content">
                <div class="contenu">
                    <p><b><u>Objet</u> :</b> <?php echo $demande['objet']; ?></p>
                    <p><b>Message :</b> <em><?php echo $demande['message']; ?></em></p>
                    <p><b>Email :</b> <?php echo $demande['email']; ?></p>
                </div>
                <div class="coordonnees">
                    <p><b>Tel :</b> <?php echo $demande['tel']; ?></p>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
<?php endif; ?>


</main>

</body>
</html>
