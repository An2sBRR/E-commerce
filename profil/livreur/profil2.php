<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['statut'] != "livreur"){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<!-----EN TETE // MENU -------->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Profil</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/sidenav.css" rel="stylesheet">
    <link href="../css/header2.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/profilpage.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plotly-2.18.2.min.js"></script>
    <script src="../js/graph.js"></script>
</head>

<body>
    <header class="shadow rounded-3 bg-light" id="header-box">
        <div class="container-fluid col-11" id="header-container">
            <div class=" d-flex align-items-center justify-content-between">
                <div class="py-3 col-sm-auto justify-content-center">
                    <div id="title">JeuVente.fr</div>
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
            <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3 col-lg-2">
                <div class="bg-light border rounded-3 p-1 h-100 sticky-top">
                    <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate">

                        <li class="my-1 ">
                            <a href="index2.php" class="nav-link px-2 text-truncate">
                                <i class="bi bi-house fs-5"></i>
                                <span class="d-none d-sm-inline">Accueil</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="colis.php" class="nav-link px-2 text-truncate">
                                <i class="bi bi-layout-text-sidebar-reverse"></i></i>
                                <span class="d-none d-sm-inline">Colis</span>
                            </a>
                        </li>
                        <li class="my-1">
                            <a href="testmap.php" class="nav-link px-2 text-truncate"><i
                                    class="bi bi-card-text fs-5"></i>
                                <span class="d-none d-sm-inline">Planning livraison</span> </a>
                        </li>
                        <li class="my-1 nav-item">
                            <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                <span class="d-none d-sm-inline">Profil</span> </a>
                        </li>
                        <a href="../../php/deconnexion.php" class="nav-link px-2 text-truncate">
                            <i class="bi bi-toggle-off"></i></i>
                            <span class="d-none d-sm-inline">Déconnexion</span>
                        </a>
                    </ul>
                </div>
            </aside>
<!------------FIN MENU ---------------------->

            <main class="col overflow-auto h-100 w-100">
                <div class="bg-light border rounded-3 p-3">
                    <h2>Votre Profil :</h2>
                    <div class="d-flex justify-content-center">
                        <i id="log-logo1" class="bi bi-person-circle"></i>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h3>
                            <?php 
                            require '../../include/config.php';
                            $requete = $bdd->prepare('SELECT nom, prenom FROM utilisateurs WHERE token = ?');
                            $requete->execute([$_SESSION['user']]);
                            $resultat = $requete->fetch();
                            echo ucfirst($resultat['prenom'])." ";
                            echo ucfirst($resultat['nom']);
                        ?></h3>
                    </div>
                    </br></br>
                      <!------------AFFICHAGE DES INFORMATIONS----->
                    <h4>Information personnel:</h4>
                    <div class="container">
                        <div class="col-md-12">
                            <p> Pseudo : <strong><?php 
                                $requete = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE token = ?');
                                $requete->execute([$_SESSION['user']]);
                                $resultat = $requete->fetch();
                                echo ucfirst($resultat['pseudo'])." ";
                            ?></strong></p>

                            <p> Adresse mail :<strong> <?php 
                                $requete = $bdd->prepare('SELECT email FROM utilisateurs WHERE token = ?');
                                $requete->execute([$_SESSION['user']]);
                                $resultat = $requete->fetch();
                                echo ucfirst($resultat['email'])." ";
                            ?></strong></p>
                            <p> Ville : <strong><?php 
                                $requete = $bdd->prepare('SELECT ville FROM utilisateurs WHERE token = ?');
                                $requete->execute([$_SESSION['user']]);
                                $resultat = $requete->fetch();
                                echo ucfirst($resultat['ville'])." ";
                            ?></strong></p>
                        </div>
                    </div></br>
    <!------------DEMANDE DES INFORMATIONS POUR SON PERMIS, ET LES HORAIRES----->
                    <?php
                      $requete = $bdd->prepare('SELECT id FROM livreur WHERE id_utilisateurs = (SELECT id FROM utilisateurs WHERE token = ?)');
                      $requete->execute([$_SESSION['user']]);
                      $resultat = $requete->fetchColumn();
                      if($resultat == null) {                     
                    ?>
                    <div class="container text-center">
                        <form action="traitement_livreur.php" method="post">
                            <div class="col-xs-3 center-block colordiv" style="background-color: rgba(0, 0, 0, 0);">
                                <div class="#">
                                    <div class="row">
                                        <div class="col">
                                              <select name="type_permis" class="form-select" aria-label="Default select example" required>
                                                <option disabled>--Type de permis--</option>
                                                <option value="1" >Permis cyclomoteur : AM</option>
                                                <option value="2">Permis auto : B</option>
                                                <option value="3">Permis moto : A</option>
                                                <option value="4">Permis professionnel : C et D</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="horaire_debut">Veuillez choisir une heure de début :</label>
                                            <input id="horaire_debut" type="time" name="horaire_debut" min="06:00"
                                                max="12:00" required value="7:30">
                                        </div>
                                        <div class="col">
                                            <label for="horaire_fin">Veuillez choisir une heure de fin :</label>
                                            <input id="horaire_fin" type="time" name="horaire_fin" min="13:00"
                                                max="20:00" required value="18:30">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41849.53154480777!2d2.0043335859188436!3d49.03729566715635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6f4c72416d693%3A0x40b82c3688b34e0!2sCergy!5e0!3m2!1sfr!2sfr!4v1679224313614!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                            <br><br>
                            <p class="text-danger">Une fois sauvegardées, ces informations ne pourront être modifié.</p>
                            <button type="submit" class="button button1 w-25">Sauvegarder</button>
                        </form>
                            </div>

                    </div>
                   <?php }?>


                
<?php 
// Récupération des données du livreur à partir de la base de données
$requete = $bdd->prepare('SELECT type_permis FROM livreur');
$requete->execute(array('id_livreur' => $_SESSION['user']));
$livreur = $requete->fetch();

// Vérification que la requête a renvoyé des résultats
if ($livreur !== false) {
    // Détermination du type de permis à partir de la valeur dans la base de données
    if ($livreur['type_permis'] == 1) {
        $type_permis = "Permis cyclomoteur : AM"; 
    } else if ($livreur['type_permis'] == 2) {
        $type_permis = "Permis auto : B"; 
    } else if ($livreur['type_permis'] == 3) {
        $type_permis = "Permis moto : A"; 
    } else if ($livreur['type_permis'] == 4) {
        $type_permis = "Permis professionnel : C et D"; 
    } else {
        $type_permis = "Type de permis inconnu";
    }
} 
?>
<!-- Affichage du type de permis et des horaire -->
<div class="container">
    <div class="col-md-12">
        <p> Type de permis : <strong><?php 
            echo ucfirst($type_permis). " ";
        ?></strong></p>
    </div>
</div>
                   <div class="container">
                        <div class="col-md-12">
                            <p> horaire debut : <strong><?php 
                                $requete = $bdd->prepare('SELECT horaire_debut FROM livreur');
                                $requete->execute([$_SESSION['user']]);
                                $resultat = $requete->fetch();
                                echo ucfirst($resultat['horaire_debut'])." ";
                            ?></strong></p>
                </div>
                <div class="container">
                        <div class="col-md-12">
                            <p> horaire fin  : <strong><?php 
                                $requete = $bdd->prepare('SELECT horaire_fin FROM livreur');
                                $requete->execute([$_SESSION['user']]);
                                $resultat = $requete->fetch();
                                echo ucfirst($resultat['horaire_fin'])." ";
                            ?></strong></p>
                </div>
               
                <hr/>
            </main>
        </div>
    </div>
</body>
</html>
