<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');

?>



<?php

$reqInfo = $bdd ("SELECT pseudo FROM membres WHERE id = ?")

?>



<?= $reqInfo;
