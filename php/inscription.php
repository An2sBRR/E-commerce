<!--/*cette page va avoir le formulaire */--->

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="../css/co.css">
            
            <title>Inscription Client</title>
        </head>
        <body>
        <div class="login-form">
        <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);
/*on fait un switch pour l'inscription : si tout est reussit alors afficher succes,
sinon si le mdp est different du 2eme : affiche mot de passe incorect
sinon si le mail est trop long ou @ > 100 : attention trop long / pas valide
de meme pour le pseudo qui doit etre inferieur a 100
sinon le compte existe deja*/
                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div> <?php
                        break;
                        case 'password':
                        ?><div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                        </div><?php
                        break;
                        case 'email':
                        ?><div class="alert alert-danger">
                            <strong>Erreur</strong> email non valide
                        </div><?php
                        break;
                         case 'email_length':
                        ?><div class="alert alert-danger">
                            <strong>Erreur</strong> email trop long
                        </div><?php 
                        break;
                        case 'pseudo_length':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> pseudo trop long
                        </div> <?php 
                        case 'already':
                        ?><div class="alert alert-danger">
                            <strong>Erreur</strong> compte deja existant
                        </div>
                        <?php 
                    }
                }
                ?>
<!--creation du formulaire d'inscription--->

    <form action="inscription_tratement.php" method="post">   
    <h2>Inscription</h2>
        <div class="inputs">
            <input type="text" name="pseudo" placeholder="Pseudo" required="required" autocomplete="off">
            <input type="email" name="email"  placeholder="Email" required="required" autocomplete="off">
            <input type="adresse" name="votre adresse" placeholder="Votre adresse" required="required" autocomplete="off">
            <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
        </div>
<!--verifier que l'email est valide c'est a dire : pas dans la base de donnée et les deux mp soient valide--->
                <div class="form-group">
                    <input type="password" name="password_retype" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>  
                 
            </form>
        </div>
            </section>
        </body>
</html>


