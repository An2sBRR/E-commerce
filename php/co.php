<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
            <link rel="stylesheet" type="text/css" href="../css/co.css">
            <title>Connexion</title>
</head>
<body>
    <section>
    <div class="form-box">   
<!--Pour afficher un message d'erreur--->
            <?php 
//On verifie si le get existe
                if(isset($_GET['login_err'])){
                    $err = htmlspecialchars($_GET['login_err']);
/*on utilise un switch : c'est a dire si le mdp est incorrect un message va s'afficher
sinon si le mail est eroné, un message s'affiche
sinon affiche compte non existant
*/
                    switch($err){
                        case 'success':
                            ?>
                                <div class="alert alert-success">
                                    <strong>Succès</strong> inscription réussie !
                                </div> <?php
                            break;
                        case 'password':
            ?>
                            <div class="alert alert-danger">
                            <strong>Erreur</strong> mot de passe incorrect
                            </div><?php
                        break;
                        case 'email':
            ?>              <div class="alert alert-danger">
                            <strong>Erreur</strong> email incorrect
                            </div><?php
                break;
                case 'already':
             ?><div class="alert alert-danger">
                <strong>Erreur</strong> compte non existant
            </div><?php
                break;
                    }}
            ?>         

            <form action="connexion.php" method="post">
                <h2>Se connecter</h2>
                <div class="social-media">
                    <p><i class="fab fa-google"></i></p>
                    <p><i class="fab fa-facebook-f"></i></p>
                    <p><i class="fab fa-apple"></i></p>
                </div>  
                <p class="choose-email">ou utiliser mon adresse e-mail :</p>         
                <div class="inputs">
                        <input type="email"  name="email"  placeholder="Email &#128233" required="required" autocomplete="off" >
                        <input type="password" type="password"  name="password" placeholder="password &#x1F512" required="required" autocomplete="off">
                    </div>
                    <p class="inscription">Je n'ai pas enocre de <span>compte</span>.Je m'en <span><a href="inscription.php">crée</span> un.</a></p>
                    <div class="form-group">
                </div>   
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
    </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
