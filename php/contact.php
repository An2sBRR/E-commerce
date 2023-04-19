<!DOCTYPE html>
<!-- AIT CHADI Anissa, BELHADJ Dillan, CERF Fabien COSTA Mathéo
PréING2 MI Groupe 3-->
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
    <link rel="stylesheet" href="../css/contact.css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico"/>
</head>
<body>

    <div class="contenu">
        <!-- Formulaire de contact-->
        <div class="formulaire">
          <div class="contact-info">
            <h3 class="titre">L'équipe JeuxVente à votre écoute!</h3>
            <p class="texte">
              Pour toute remarque, complément d'information, problème ou réclamation,
              nous vous invitons à remplir notre formulaire de contact.
              Vous pouvez également faire un tour sur nos réseaux et nous envoyer un message privé dessus !
            </p>
              
            <!-- Infos pratiques -->
            <div class="info">
              <div class="information">
                <img src="../data/map.png" class="icone"/>
                <p>42 boulevard du port, 95100 CERGY</p>
              </div>
              <div class="information">
                <img src="../data/email.png" class="icone"/>
                <p>JeuxVente-contact@society.com</p>
              </div>
              <div class="information">
                <img src="../data/tel.png" class="icone"/>
                <p> 01.77.88.92.99</p>
              </div>
            </div>
  
            <div class="social-media">
              <p>Nous suivre :</p>
              <div class="logos-reseaux">
                <a href="https://twitter.com" target="_blank">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
                <a href="https://instagram.com" target="_blank">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="https://github.com/Le-7/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA" target="_blank">
                  <ion-icon name="logo-github"></ion-icon>
                </a>
                <a href="https://pinterest.com" target="_blank">
                  <ion-icon name="logo-pinterest"></ion-icon>
                </a>
              </div>
            </div>
          </div>
           <!-- Partie de droite du formulaire de contact-->
          <div class="contact-formulaire">
            <span class="bulle un"></span>
            <span class="bulle deux"></span>
  
              <!-- Raccord au fichier traitement.php avec la méthode POST-->
            <form action="traitement_contact.php" method="post">
              <h3 class="titre">Nous contacter</h3>

              <div class="input-contenu">
                <select name="utilisateur">
                <option value="Client">Client</option>
                <option value="Vendeur">Vendeur</option>
                <option value="Livreur">Livreur</option>
                </select>
              </div>
                
              <div class="input-contenu">
                <input type="text" name="nom" class="input" placeholder="Nom prénom"/>   
              </div>
                
              <div class="input-contenu">
                <input type="email" name="email" class="input" placeholder="Email" required />   
              </div>
                
              <div class="input-contenu">
                <input type="text" name="objet" class="input" placeholder="Objet" required /> 
              </div>

              <div class="input-contenu">
                <input type="tel" name="tel" class="input" placeholder="Téléphone" required pattern="^\d{10}$"/>
              </div>
                
              <div class="input-contenu textarea">
                <textarea name="message" class="input" placeholder="Votre message" required></textarea>
              </div>
                
              <input type="submit" name="envoyer" value="Envoyer" class="bouton" required/>
            </form>
          </div>
        </div>
        <!-- Scripts pour utiliser ionicons-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
    <?php  
        #Récupération de la query dans l'url
        function getquery(){ $url = $_SERVER['REQUEST_URI'];
            return (parse_url($url, PHP_URL_QUERY)); }

        function affichageerror() {  #Fonction pour afficher les erreurs dans le formulaire
        $err = explode('=',getquery());
        if($err[1]!=NULL)   
        {
         //echo "<script language='Javascript'>console.log(document.querySelectorAll('input[name=$err[1]]')[0]);</script>";
         echo"<script language='Javascript'>document.querySelectorAll('input[name=$err[1]]').forEach(el => el.style.background='red');</script>";
        }
    }
        affichageerror();
    ?>


</html>





