

<!DOCTYPE html>
<html lang="en">

<body>


<?php


    $to = 'hguv5320@hguv5320.odns.fr';

    $subject = 'Mail envoyé depuis un script PHP';

    $message = 'Contenu text depuis sendmail de php';



    if (mail($to, $subject, $message,)) {

        echo 'Mail envoyé avec succèss.';

    } else {

        echo 'Unable to send mail. Please try again.';

    }

?>
</body>
</html>

