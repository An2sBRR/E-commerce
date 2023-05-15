<!-- On a securisé la page c'est a dire le client a acces qu'au page client que si il est connecté 
sinon l'utilisateur est redireigé sur la page index --> 
<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "client"){
        header('Location: ../../index.php');
    }

    require_once '../../include/config.php'; // On inclu la connexion à la bdd
    // Si la session n'existe pas 
    if(!isset($_SESSION['user'])){
        header('Location:../index.php');
        die();
    }

    // Si les variables existent 
    //c'est a dire si il rentre correctement le formulaire(l'ancien mot de passe et le nouveau)
    if(!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['new_password_retype'])){

// récupérer les données saisies par un utilisateur à partir d'un formulaire HTML
        $current_password = htmlspecialchars($_POST['current_password']); //Le champ 'current_password' est le champ qui demande à l'utilisateur de saisir son mot de passe actuel.
        $new_password = htmlspecialchars($_POST['new_password']);//Le champ 'new_password' est le champ qui demande à l'utilisateur de saisir son nouveau mot de passe.
        $new_password_retype = htmlspecialchars($_POST['new_password_retype']); // Le champ 'new_password_retype' est le champ qui demande à l'utilisateur de saisir à nouveau son nouveau mot de passe, pour confirmer qu'il a été correctement saisi.

        // On récupère les infos de l'utilisateur
        $check_password  = $bdd->prepare('SELECT password FROM utilisateurs WHERE token = :token');
        $check_password->execute(array(
            "token" => $_SESSION['user']
        ));
        $data_password = $check_password->fetch();

        // Si le mot de passe est le bon
        if(password_verify($current_password, $data_password['password']))
        {
            // Si le nouveau mdp est identique au mot de passe retapé 
            if($new_password === $new_password_retype){
                // On chiffre le mot de passe
                $cost = ['cost' => 12];
                //on prends le nouveau mot de passe et le crypt c'est a dire, le mot de passe ne sera pas affiché sur la base de donnée mais sera crypté 
                $new_password = password_hash($new_password, PASSWORD_BCRYPT, $cost);
                // On met à jour la table utilisateurs avec le nouveau mot de passe 
                $update = $bdd->prepare('UPDATE utilisateurs SET password = :password WHERE token = :token');
                $update->execute(array(
                    "password" => $new_password,
                    "token" => $_SESSION['user']
                ));
                // si tout se passe correctement on redirige vers la page profil 
                header('Location: profil_cl.php?err=success_password');
                die();
            }
        }
        else{
            //sinon on se met sur la page profil en affichant une erreur 
            header('Location: profil_cl.php?err=current_password');
            die();
        }

    }
    else{
        header('Location: profil_cl.php');
        die();
    }
?>
