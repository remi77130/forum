

<!DOCTYPE html>
<html lang="en">

<body>
    <?php

$destinataire = "refenech@gmail.com";
$sujet = "test de mail";
$message = "contenu de mail";
$headers = "From:refenech@gmail.com";
$retval = mail($destinataire,$sujet,$message,$headers);

if($retval == true){
    echo "message envoyé";
}else{
    echo "fail";
}

?>
</body>
</html>