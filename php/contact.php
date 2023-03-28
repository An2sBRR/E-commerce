<?php
    session_start();
    $today = date('Y-m-d');
    $date_min = date('1905-01-01');

    $nom = isset($_POST['nom']) ? htmlentities($_POST['nom']) : "";
    $email = isset($_POST['email']) ? htmlentities($_POST['email']) : "";
    $date_naissance = isset($_POST['date_naissance']) ? htmlentities($_POST['date_naissance']) : "";
    $type_util = isset($_POST['type_util']) ? htmlentities($_POST['type_util']) : "";
    $prenom = isset($_POST['prenom']) ? htmlentities($_POST['prenom']) : "";
    $genre = isset($_POST['genre']) ? htmlentities($_POST['genre']) : "";
    $date_contact = isset($_POST['date_contact']) ? htmlentities($_POST['date_contact']) : "";
    $sujet = isset($_POST['sujet']) ? htmlentities($_POST['sujet']) : "";
    $contenu = isset($_POST['contenu']) ? htmlentities($_POST['contenu']) : "";
    $succes="";

    $erreurNom = "";
    $erreurPrenom = "";
    $erreurNaissance = "";
    $erreurMail = "";
    $erreurUtil = "";
    $erreurPrenom = "";
    $erreurContact = "";
    $erreurSujet = "";
    $erreurContenu = "";
    $erreurGenre = "";
    $nbr_erreur = 0;

    if (isset($_POST['envoyer'])) {
        if (empty($genre) || !isset($genre)) {
            $erreurGenre = '<pre class="erreurGenre" style="color:red;">Sélectionnez un genre</pre>';
            $nbr_erreur++;
        }
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (empty($email) || !isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurMail = '<pre class="erreurMail" style="color: red;">Entrez une adresse mail correct</pre>';
            $nbr_erreur++;
        }
        if ((empty($prenom)) || (!isset($prenom)) || (!preg_match("/^[a-zA-ZÀ-ú\s]*$/", $prenom))) {
            $erreurPrenom = '<pre class="erreurPrenom" style="color: red;">Entrez un prénom correct</pre>';
            $nbr_erreur++;
        }
        if (empty($nom) || !isset($nom) || (!preg_match("/^[a-zA-ZÀ-ú\s]*$/", $nom))) {
            $erreurNom = '<pre class="erreurNom" style="color: red;">Entrez un nom correct</pre>';
            $nbr_erreur++;
        }
        if (empty($type_util) || !isset($type_util)) {
            $erreurUtil = '<pre class="erreurUtil" style="color:red;">Séléctionnez un type d\'utilisateur</pre>';
            $nbr_erreur++;
        }
        if (empty($sujet) || !isset($sujet) || (!preg_match('/./', $sujet))) {
            $erreurSujet = '<pre class="erreurSujet" style="color: red;">Ne pas mettre de caractère spécial</pre>';
            $nbr_erreur++;
        }
        if (empty($date_naissance) || !isset($date_naissance) || $today <= $date_naissance || $date_naissance <= $date_min) {
            $erreurNaissance = '<pre class="erreurNaissance" style="color: red;">Séléctionnez une date correct</pre>';
            $nbr_erreur++;
        }
        if (empty($date_contact) || !isset($date_contact) || $date_contact != $today) {
            $erreurContact = '<pre class="erreurContact" style="color: red;">Séléctionnez la date d\'aujourd\'hui</pre>';
            $nbr_erreur++;
        }

        if (empty($contenu) || !isset($contenu) || (!preg_match('/./', $contenu))) {
            $erreurContenu = '<pre class="erreurContenu" style="color: red;">Entrez un message</pre>';
            $nbr_erreur++;
        }
        if($nbr_erreur == 0){
            $succes = 'Votre demande de contact a bien été envoyée';
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/contact.css">
    <title>Contactez nous</title>
</head>

<body>
    <div class="formulaire">
        <div class="formulaire_titre">Demande de contact</div>

        <form action="traitement_contact.php" method="post" id="form_contact" autocomplete="off">
            <div class=boite>
                <div class="gauche">
                    <div class="div_nom">
                        <input type="text" name="nom" placeholder="Entrer votre nom" size="10" id="Nom" class="Nom" value="<?php if (isset($nom)) echo $nom; ?>"><?php echo $erreurNom; ?>
                    </div>

                    <div class="div_mail">
                        <input type="mail" name="email" placeholder="Entrer votre adresse email" size="15" id="mail" class="mail" value="<?php if (isset($email)) echo $email; ?>"><?php echo $erreurMail; ?>
                    </div>

                    <div class="div_naissance">
                        <label for="Date_de_Naissance">Date de Naissance :</label>
                        <input type="date" name="date_naissance" id="Naissance" class="Naissance" min="1905-01-01" max="2030-01-01" value="<?php if (isset($date_naissance)) echo $date_naissance; ?>"><?php echo $erreurNaissance; ?>
                    </div>
                    <div class="div_util">
                        <label for="type_util" class="labeltype_util">Type utilisateur :</label><br><br>
                        <input type="radio" name="type_util" value="Client" <?php if ($type_util == 'Client') echo 'checked = "checked"'; ?>><label for="client">Client</label>
                        <input type="radio" name="type_util" value="Vendeur" <?php if ($type_util == 'Vendeur') echo 'checked = "checked"'; ?>><label for="vendeur">Vendeur</label>
                        <input type="radio" name="type_util" value="Livreur" <?php if ($type_util == 'Livreur') echo 'checked = "checked"'; ?>><label for="livreur">Livreur</label><?php echo $erreurUtil; ?>
                    </div>
                </div>

                <div class="droite">
                    <div class="div_prenom">
                        <input type="text" name="prenom" placeholder="Entrer votre prénom" size="10" id="Prenom" class="Prenom" value="<?php if (isset($prenom)) echo $prenom; ?>"><?php echo $erreurPrenom; ?>
                    </div>

                    <div class="GenreRadio">
                        <label for="genre" class="genre">Genre :</label>
                        <input type="radio" name="genre" value="Homme" <?php if ($genre == 'Homme') echo 'checked = "checked"'; ?>><label for="homme">Homme</label>
                        <input type="radio" name="genre" value="Femme" <?php if ($genre == 'Femme') echo 'checked = "checked"'; ?>><label for="femme">Femme</label><?php echo $erreurGenre; ?>
                    </div>

                    <div class="div_contact">
                        <label for="Date_de_Contact" id="Date2contact">Date de Contact :</label>
                        <input type="date" name="date_contact" id="Contact" class="Contact" value="<?php if (isset($date_contact)) echo $date_contact; ?>"><?php echo $erreurContact; ?>
                    </div>
                    <div class="div_sujet">
                        <input type="text" name="sujet" placeholder="Entrer le sujet de votre message" size="16" id="sujet" class="sujet" value="<?php if (isset($sujet)) echo $sujet; ?>"><?php echo $erreurSujet; ?>
                    </div>
                </div>
            </div>

            <div class="contenu_sujet">
                <textarea name="contenu" cols="70" rows="8" placeholder="Contenu de votre message ici" id="contenu" class="contenu"><?php if (isset($contenu)) echo $contenu; ?></textarea><?php echo $erreurContenu; ?>
            </div>

            <input type="submit" value="Envoyer" name="envoyer" id="button-sbt">
            <div class="succes" id="succes"><?php echo $succes; ?></div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/contact.js"></script> 
</body>
</html>