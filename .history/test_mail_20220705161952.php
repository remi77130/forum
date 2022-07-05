

<!DOCTYPE html>
<html lang="en">

<body>
    <?php

$destinataire = "refenech@gmail.com";
$sujet = "test de mail";
$message = "contenu de mail";
$headers = "From:testmailphp85@gmail.com";
mail($destinataire,$sujet,$message,$headers);



?>
</body>
</html>