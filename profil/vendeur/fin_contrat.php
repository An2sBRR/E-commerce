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

            // Calcul de la date d'alerte (2 jours avant la fin du contrat)
            $date_alerte = clone $nouvelle_date;
            $date_alerte->modify('-2 days');

            if ($nouvelle_date < $date_today) {
                echo '<script type="text/javascript">';
                echo 'alert("Votre contrat a pris fin.")';
                echo '</script>';
                header("Location: resilier.php");
            }elseif ($date_alerte >= $date_today && $date_alerte < $nouvelle_date) {
                echo '<script type="text/javascript">';
                echo 'alert("Attention, votre contrat va bientôt se terminer. Diriger vous vers votre profil pour le renouveler.")';
                echo '</script>';
            }
        }
    }
?>