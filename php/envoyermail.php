<?php
session_start();

$to = "bergeresar@cy-tech.fr";
$subject = "Utilisation de mail() avec php";
$message = "Merci d'avoir pris notre abonnement qui va vous permettre de faire des économies. \nPour toute question, n'hésitez pas à nous contactez via notre site internet.\n\nBonne journée et à bientôt,\nL'équipe de Jeux et Loisirs";

$headers = "Content-Type: text/plain; charset=utf-8\r\n";
$headers = "From: sarahbergere10@gmail.com\r\n";

if(mail($to, $subject, $message, $headers))
    echo "Envoyer!";
else 
    echo "Erreur envoi";

?>