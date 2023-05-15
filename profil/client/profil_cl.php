<!-- On a securisé la page c'est a dire le client a acces qu'au page client que si il est connecté 
sinon l'utilisateur est redirigé sur la page index -->

<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "client"){
        header('Location: ../../index.php');
    }
?>
<!-- permet d'avoir le menu de la page client -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Client</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box">
        <div class="container-fluid col-11" id="header-container">
            <div class=" d-flex align-items-center justify-content-between">
                <div class="py-3 col-sm-auto justify-content-center">
                    <div id="title">JeuxVente.fr</div>
                </div>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i id="log-logo" class="bi bi-person-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3 container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
        <div class="row flex-grow-sm-1 flex-grow-0 container-fluid">
            <?php include 'barre_navigation_cl.php' ?>
            <!-----FIN DU MENU ----->
            <main class="col overflow-auto h-100 w-100">
                <div class="bg-light border rounded-3 p-3">
                    <h2>Votre Profil : Client </h2>
                    <div class="d-flex justify-content-center">
                        <i id="log-logo1" class="bi bi-person-circle"></i>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h3>
                            <!--- on se connecte a la vase de donnée pour avoir le nom et prenom de l'utilisateur-->
                            <?php 
                            require '../../include/config.php';
                            $requete = $bdd->prepare('SELECT nom, prenom FROM utilisateurs WHERE token = ?');
                            $requete->execute([$_SESSION['user']]);
                            $resultat = $requete->fetch();
                            //suite a cette requette on affiche le prenom et le nom de l'utilisateur 
                            echo ucfirst($resultat['prenom'])." ";
                            echo ucfirst($resultat['nom']);
                        ?>
                        </h3>
                    </div>
                    <!--- on va faire de meme avec les informations personnel on va donc demander son pseudo,l'adresse mail, et la ville
nous alons donc faire le meme processus --->
                    <h4>Information personnel :</h4>
                    <div class="container">
                        <div class="col-md-12">
                            <p> Pseudo : <?php 
                            require '../../include/config.php'; $requete = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE token = ?');$requete->execute([$_SESSION['user']]);$resultat = $requete->fetch();
                            echo ucfirst($resultat['pseudo'])." ";
                        ?></p>

                            <p> Adresse mail : <?php 
                            require '../../include/config.php';$requete = $bdd->prepare('SELECT email FROM utilisateurs WHERE token = ?');$requete->execute([$_SESSION['user']]);$resultat = $requete->fetch();
                            echo ucfirst($resultat['email'])." ";
                        ?></p>
                            <p> Ville : <?php 
                            require '../../include/config.php';$requete = $bdd->prepare('SELECT ville FROM utilisateurs WHERE token = ?');$requete->execute([$_SESSION['user']]);$resultat = $requete->fetch();
                            echo ucfirst($resultat['ville'])." ";
                        ?></p>
                            <?php
//lorsque le mot de passe a été changé par l'utilisateur, il recoit un message d'erreur ou de succes 
//cependant si l'utilisateur rentre un mauvais mot de passe actuel  un message d'erreur s'affiche
// et si l'utilisateur decide de changer son mot de passe alors une notification succes apparait
                                    if(isset($_GET['err'])){
                                        $err = htmlspecialchars($_GET['err']);
                                        switch($err){
                                            case 'current_password':
                                                echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                            break;

                                            case 'success_password':
                                                echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                            break; 
                                        }
                                    }
                                ?>
                            </br>
                            <!-- Button trigger modal -->
                            <p>Vous avez la possibilité de changer votre mot de passe : <button type="button"
                                    data-toggle="modal" data-target="#change_password">Changer mon mot de passe</button>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Modalité pour changer le mot de passe 
                une pop up apparait avec un formulaire -->
                <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Changer mon mot de passe</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="change_mdp.php" method="POST">
                                    <label for='current_password'>Mot de passe actuel</label>
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control" required />
                                    <br />
                                    <label for='new_password'>Nouveau mot de passe</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control"
                                        required />
                                    <br />
                                    <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                                    <input type="password" id="new_password_retype" name="new_password_retype"
                                        class="form-control" required />
                                    <br />
                                    <!-- en appuyant sur envoyer, les données sont envoyé a change_mdp.php, les données sont alors vérifié-->
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    </div>
    </main>
    </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>
</html>
