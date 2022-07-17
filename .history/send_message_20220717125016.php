<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');

?>



<?php

$reqInfo = $bdd ("SELECT * FROM membres WHERE id = ?")

?>



<?= $reqInfo;
