<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2">
    <link rel="stylesheet" href="../css/contacter.css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <title>Test données</title>
</head>
<body>

    <?php
        $demande = file_get_contents('../data/messages.json') ; #on récupère les données du json
        $demande = json_decode($demande, true) ; #on remet en php

        for($i=0; $i<count($demande); $i++) : #on fait une boucle jusqu'à ce que tous les éléments soient lus puis on les écrit
    ?>
        <div class="test">
            <div class="zones">
                <!-- Lien sur le "bouton" x pour supprimer le message sélectionné -->
            <a href="traitement_contact.php?del=<?php echo$demande[$i]['id']; ?>" class="action" id="fermé">X</a> <br>
            <p>
                <b>
                <?php echo$demande[$i]['utilisateur']; ?></b><br>
                <?php echo$demande[$i]['nom']; ?></b><br>
                <?php echo$demande[$i]['email']; ?><br>
                <?php echo$demande[$i]['tel']; ?><br>
                <?php echo$demande[$i]['objet']; ?> <br>
                <?php echo$demande[$i]['message']; ?> <br>
                
                <b> <?php echo$demande[$i]['date']; ?></b><br> </p>
                
            </div>
            
               

        </div>
    <?php endfor; ?>

</body>
</html>
