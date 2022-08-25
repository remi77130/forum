<?php

// DB O2SWITCH $bdd = new PDO('mysql:host=localhost;dbname=oemr6702_forum', 'oemr6702', 'WTDz-geeS-az4+');


if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
$requser = $bdd->prepare('SELECT * FROM membres WHERE id = id');
$requser->execute(array($_SESSION['id']));
$msg_nbr = $requser->rowCount();
?>
<?php

while($m = $requser->fetch()) {
      $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
      $p_exp->execute(array($m['id_expediteur']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['pseudo'];

}}
   ?>


<?= $p_exp ?></b> vous a envoyé un message<br />

