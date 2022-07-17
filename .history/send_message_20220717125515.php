<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');

?>



<?php

$requser = $bdd ("SELECT * FROM membres WHERE id = ?");
$requser->execute(array('pseudo'))

?>



<?= $requser['pseudo'] ;
