
<!--/*cette page va traiter les données du formulaire */--->
<?php
/*demarage des session de connexion + on inclut la connexion a la bdd */
    session_start(); // Démarrage de la session
    require_once '../include/config.php'; // On inclut la connexion à la base de données

    if(!empty($_POST['email']) && !empty($_POST['password'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
//on stock dans htmlspecialchars
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        $email = strtolower($email); // email transformé en minuscule

        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT pseudo, email, password, token FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
            
     
/*VERIFICATION : si l'email est valide alors, on verifie si le mdp est bon alors on renvoie la page suivante  
sinon renvoyer erreur avec le probleme (ex : password ou email*/
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($password, $data['password']))
                {
                    // On créer la session et on redirige sur landing.php
                    $_SESSION['user'] = $data['token'];
                    header('Location: landing.php');
                    die();
                }else{ header('Location: co.php?login_err=password'); die(); }
            }else{ header('Location:  co.php?login_err=email'); die(); }
        }else{ header('Location:  co.php?login_err=already'); die(); }
    }else{ header('Location:  co.php'); die();} // si le formulaire est envoyé sans aucune données
?>




