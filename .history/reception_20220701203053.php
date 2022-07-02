<?php                          ////// FEUILLE RECEPTION DU MESSAGE *********->LECTURE.PHP
session_start();
require 'require/database.php';


if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
$msg = $bdd->prepare('SELECT * FROM messages WHERE id_destinataire = ? ORDER BY id DESC');
$msg->execute(array($_SESSION['id']));
$msg_nbr = $msg->rowCount();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Boîte de réception</title>
   <meta charset="utf-8" />
</head>
<body>
   <a href="profil.php?id=<?= $_SESSION['id'] ?>">Profil</a>
   <a href="envoi.php">Nouveau message</a><br /><br /><br />
   <h3>Votre boîte de réception:</h3>

   <?php
   if($msg_nbr == 0) { echo "Vous n'avez aucun message..."; }
   
   while($m = $msg->fetch()) {
      $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
      $p_exp->execute(array($m['id_expediteur']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['pseudo'];
   ?>
   <a href="lecture.php?id=<?= $m['id'] ?>"<?php if($m['lu'] == 1) 
   { ?><span style="color:grey"><?php } ?><b>
      <?= $p_exp ?></b> vous a envoyé un message<br />

      <b>Objet:</b> <?= $m['objet'] ?> <br>

      <p> Image test</p>
      <img src="data:image/jpg;base64,'.base64_encode(<?php $m['img_msg'] ?>).'"/>  <!---- src ? dossier membres/img_message /
      <?php if($m['lu'] == 1) { ?></span>
         <?php } ?></a><br />
   -------------------------------------<br/>
   <?php } ?>
</body>
</html>
<?php } ?>