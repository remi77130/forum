

<!DOCTYPE html>
<html lang="en">

<body>
    <?php

$destinataire = "projetpro77@gmail.com";
$sujet = "test de mail";
$message = "contenu de mail";
$headers = "From:hguv5320@hguv5320.odns.fr";
$retval = mail($destinataire,$sujet,$message,$headers);

if($retval == true){
    echo "message envoyé";
}else{
    echo "fail";
}

?>
</body>
</html>

<!-- Je te relaisse la main, j'ai vu sur les forums que le problème venait de google, 
je vais voir pour te passer un domaine test et je reviens vers toi -->