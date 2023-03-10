<!DOCTYPE html>
<?php 
    session_start();
//Variable de session : 0 = Déconnecté ; 1 = Connecté ; 2 = Connecté en tant qu'administrateur
    $_SESSION['Connected'];
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <title>COUTURALIA</title>
</head>
<body>
    <div class="contenu">
        <!--Formulaire de connexion-->
        <form  id="formulaire" action="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/php/connexion.php" method="POST">
        <input id="fermé" type="button" value="X" onclick="document.getElementById('formulaire').style.display='none'">
            <p>Bienvenue</p>
            <input name="login" type="text" placeholder="login" required> <br>
            <input name="pass" type="password" placeholder="mot de passe" required> <br>
            <input type="submit" value="connexion" ><br>
            <!--Lien vers la page d'inscription-->
            <a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/php/inscription.php">Pas de compte? Inscrivez vous!</a>
        </form>
    
        <header>
            <div class="nvo">
                <img src="img/logotest3.png" alt="logo" id="logo">
            </div>

            <div class="banniere">
                <h1>Couturalia</h1> 
                <!--Boutons redirigeant vers le panier // Ouvrant le formulaire de connexion-->
                <div class="placement"><button class="button1" onclick="location.href='http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/php/cart.php'">Panier</div>
                <div class="placement" id="connexion"><button class="button1" onclick="document.getElementById('formulaire').style.display='block'"> Connexion</div> 
               
                <div class="menuH">
                    <!--Menu des différentes pages du site-->
                    <ul>
                        <li><a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php">Accueil</a></li>
                        <li><a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php?cat=tissu">Tissus</a></li>
                        <li><a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php?cat=materiel">Matériel</a></li>
                        <li><a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php?cat=machines">Machines</a></li>                        
                        <li id="contact"><a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/php/contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </header>
            <!--Contenu principal de la page courante-->
            <div class="milieu">
                <main> 
                    <p>Chez Couturalia, qualité et professionnalisme à votre service.
                    Que vous soyiez débutants, amateurs ou professionnels, vous trouverez tout le matériel nécessaire
                    pour la réalisation de vos pièces. 
                    Soie, cotton, polyester, fils, aiguilles, machines, vous trouverez assurément votre bonheur !
                    </p>    
                    <img src="img/tissus.jpg" alt="illustration" id="illustration">
                </main>
            </div>
        
        <footer>
            <!--Pied de page commun à tous les catalogues du site-->
            <div class="infos" id="réseaux">
                <p style="font-size:22px">
                    <a class="reseauxlog" href="https://twitter.com" target="_blank">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                    <a class="reseauxlog" href="https://instagram.com" target="_blank">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                        <a class="reseauxlog" href="https://github.com/Le-7/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA" target="_blank">
                    <ion-icon name="logo-github"></ion-icon>
                    </a>
                </p>  
            </div>

            <div class="infos" id="contact2">
                <p style="font-size:22px"><a href="mailto:couturalia@society.com?subject=Demande%20de%20contact&body=Bonjour,"> 
                couturalia@society.com </a></p>  
            </div>  

            <div class="infos" id="mentions">
                <p style="font-size:22px">©Couturalia</p>
            </div>
           
            <div class="infos" id="contact1">
                <p style="font-size:22px">01.77.88.92.99</p>        
            </div>
           
            <div class="infos" id="plan">
                <ul>
                    <li><a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php">Accueil</a></li>
                    <li><a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php?cat=tissu">Tissus</a></li>
                    <li><a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php?cat=materiel">Matériel</a></li>
                    <li><a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php?cat=machines">Machines</a></li>                        
                    <li><a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/php/contact.php">Contact</a></li>
                </ul>
            </div>      
        </footer>
<!--Images de 'bulles' pour l'esthétique du site-->
        <span class="bulle un"></span>
        <span class="bulle deux"></span>
        <span class="bulle trois"></span>
        <span class="bulle quatre"></span>
        <span class="bulle cinq"></span>
        

    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!--Fonction pour la déconnexion-->
    <script>
        function disconnect(){
            document.location.href = "http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php?cat=disconnect";
        }
    </script>

    <?php
        //Fonction pour récupérer l'url de la page
        function getquery(){ $url = $_SERVER['REQUEST_URI'];
            return (parse_url($url, PHP_URL_QUERY)); }
        
        //Fonction modifiant le contenu de la page selon l'url
        function affichage() {
            $num = explode('=',getquery());

            if($num[1]=="unknown"){
                echo "<script>document.location.href = 'http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php';</script>";
            }

            if($num[1]=="disconnect"){
                $_SESSION['Connected'] = NULL;
                echo "<script>document.location.href = 'http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php';</script>";
            }

            if($num[1]!=NULL)   
            {
                $csv = array_map('str_getcsv', file('./data/test.csv'));
                echo "<script>document.getElementsByTagName('main')[0].innerHTML=\"<table><thead><tr><th>Photo</th><th>Nom</th><th>Stock</th><th>Prix</th></thead> <tbody>";
                foreach($csv as $line){
                    if($line[2] == $num[1] && $line[4] != 0){
                        echo "<tr>";    
                        echo "<td><div class='container'><input type='checkbox' id='$line[0]'><label for='$line[0]'><img style='width:20%;height:20%;'src='img/".$line[3]."'></label></div></td>";
                        echo "<td>".$line[1]."</td>";
                        echo "<td>".$line[4];
                        if($num[1]!=="machines"){
                            echo "m";
                        }
                        echo "</td>";
                        echo "<td>".$line[5]."</td>";
                        if($_SESSION['Connected'] == 1){
                            echo "<td><label for='q'>Quantité: </label>";
                            echo "<form action='http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/php/cart.php' method='POST'>";
                            echo "<input type='range' name='value' value='1' min='1' max='$line[4]' oninput='this.nextElementSibling.value = this.value'><output>1</output>";
                            echo "<input type='hidden' name='name' value='$line[1]'>";
                            echo "<input type='hidden' name='price' value='$line[5]'>";
                            echo "<input type='submit' value='Ajouter au panier' class='add-to-cart'>";
                            echo "</form></td>";
                        }
                        echo "</tr>";
                    }
                }
                echo "</tbody></table>\";</script>";
            }
        }
        affichage();
        //Si connecté, changer le bouton 'connexion' en 'déconnexion'
        if($_SESSION['Connected'] == 1){
            echo"<script language='Javascript'>document.getElementById('connexion').innerHTML='<button class=\'button1\' onclick=\'disconnect()\'>Déconnexion'</script>";
        }
        //Si connecté en tant qu'admin, changer, en plus, le formulaire de contact par la page de gestion des demandes
        if($_SESSION['Connected'] == 2){
            echo"<script language='Javascript'>document.getElementById('connexion').innerHTML='<button class=\'button1\' onclick=\'disconnect()\'>Déconnexion'</script>";
            echo"<script language='Javascript'>document.getElementById('contact').innerHTML='<a href=\'http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/php/contacter.php\'>Demandes</a>'</script>";
        }
    ?>
</body>
</html>