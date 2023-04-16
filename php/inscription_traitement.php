<?php 
    session_start();
    require_once '../include/config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nom'])&&!empty($_POST['prenom']) && !empty($_POST['pseudo']) && !empty($_POST['ville']) &&!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {
        // Patch XSS
        $statut = isset($_POST['statut']) && !empty($_POST['statut']) ? htmlspecialchars($_POST['statut']) : null;
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $ville = htmlspecialchars($_POST['ville']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT nom, prenom, pseudo, ville, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($nom) <=100){
                if(strlen($prenom) <= 100){
                    if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                         if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                            if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                                 if($password === $password_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                      
                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(nom, prenom, pseudo, ville, email, password, token, statut) VALUES(:nom, :prenom, :pseudo, :ville, :email, :password, :token, :statut)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'pseudo' => $pseudo,
                                'ville' => $ville,
                                'email' => $email,
                                'password' => $password,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64)),
                                'statut' => $statut
                            ));
                            
                            // On redirige avec le message de succès
                            //$_SESSION['user'] = $data['token'];
                            header('Location:co.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: inscription.php?reg_err=prenom_length'); die();}
    }else{ header('Location: inscription.php?reg_err=nom_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }
?>