<?php

$destinataire = "projetpro77@gmail.com"; // DEST DU MAIL
$sujet = "test de mail02";
$message = "un contenu de mail 02";

$headers = "From:hguv5320@hguv5320.odns.fr"; 
mail($destinataire,$sujet,$message,$headers);


echo "mail envoyer à $destinataire avec succes ! ";  


else{

    echo "fail";
}
?>