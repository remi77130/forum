<?php

$destinataire = "remi_user@hguv5320.odns.fr";
$sujet = "test de mail";
$message = "un contenu de mail";

$headers = "From:hguv5320@hguv5320.odns.fr";
mail($destinataire,$sujet,$message,$headers);


?>