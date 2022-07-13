<?php

$destinataire = "refenech@gmail.com";
$sujet = "test de mail";
$message = "un contenu de mail";

$headers = "From:hguv5320@hguv5320.odns.fr";
mail($destinataire,$sujet,$message,$headers);


?>