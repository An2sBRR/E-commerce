<!-- SITE WEB 
AÏT CHADI Anissa, BERGERE Sarah, COSTA Mathéo, FELGINES Sara
ING 1 GI GROUPE 4 -->
<?php
    require '../../include/config.php';

    if (isset($_SESSION['user'])) {
        $requete = $bdd->prepare('SELECT date_inscription FROM utilisateurs WHERE token = ?');
        $requete->execute([$_SESSION['user']]);
        $utilisateur = $requete->fetch();

        if ($utilisateur) {
            $date_inscription = new DateTime($utilisateur['date_inscription']);
            $date_inscription->modify('+1 year');
            $nouvelle_date = $date_inscription->format('Y-m-d H:i:s');
            $date_today = date('Y-m-d H:i:s');

            if ($nouvelle_date < $date_today) {
                echo '<script type="text/javascript">';
                echo 'alert("Votre contrat a pris fin.")';
                echo '</script>';
            }
        }
    }
?>