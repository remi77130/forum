

<!DOCTYPE html>
<html lang="en">

<body>
    <?php

$destinataire = "reflech598@gmail.com";
$sujet = "test de mail";
$message = "contenu de mail";
$headers = "From:refenech@gmail.com";
mail($destinataire,$sujet,$message,$headers);



?>
</body>
</html>