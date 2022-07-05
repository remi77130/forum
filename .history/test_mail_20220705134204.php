

<!DOCTYPE html>
<html lang="en">

<body>
    <?php

$destinataire = "projetpro77@gmail.com";
$sujet = "test de mail";
$message = "contenu de mail";
$headers = "From:refenech@gmail.com";
mail($destinataire,$sujet,$message,$headers);



?>
</body>
</html>