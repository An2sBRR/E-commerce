<?php
    if(isset($_POST['nom'])){  //On créé une condition pour récup les données si on a bien le nom

        $demande = array() ;
        $demande['nom'] = $_POST['nom'] ;
        $demande['prenom'] = $_POST['prenom'] ;
        $demande['email'] = $_POST['email'] ;
        $demande['sujet'] = $_POST['sujet'] ;
        //$demande['tel'] = $_POST['tel'] ;
        $demande['contenu'] = $_POST['contenu'] ;
        $demande['date'] = date("d-m-Y  H:i") ;
        $demande['id'] = date("dmYHis") ; #Création d'un id unique par utilisateur

  
        $json = file_get_contents('../data/messages.json') ; #var qui contient notre fichier json sous forme de tableau
        $json = json_decode($json, true) ; #conversion en php
        $json[] = $demande ; #on rempli le tableau
        $json = json_encode($json) ; #reconversion en json
        file_put_contents('../data/messages.json', $json) ; #on remet le premier msg dans le fichier json puis on créé un mail prérempli avec les données saisies
        //echo ("<script language='Javascript'>document.location='mailto:couturalia@society.com?subject=".$demande['objet']."&body=".$demande['message']."%0A".$demande['nom']."%0ATéléphone :%20".$demande['tel']."'</script>");
        echo "<script language='Javascript'>document.location='../index.php'</script>";
    }

    else if(isset($_GET['del'])){  #Si on a del
        $demande = file_get_contents('../data/messages.json');  #on récupère le fichier json
        $demande = json_decode($demande, true);          #on le converti en php
 
        $verif = array() ;    #création d'un deuxième tableau vide 

        for($i=0; $i<count($demande); $i++){
            if($demande[$i]['id'] != $_GET['del']){ #si diff alors on fait entrer le msg dans le nvo tableau
                $verif[] = $demande[$i] ;
            } 
        
        }
        $verif = json_encode($verif);   #on remet en json
        file_put_contents('../data/messages.json', $verif) ;  #on remet le contenu du msg dans le json puis on réactualise la page
        echo "<script language='Javascript'>document.location='./gestion_messages.php'</script>";
    }
?>
