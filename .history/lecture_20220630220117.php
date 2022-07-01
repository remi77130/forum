<?php
session_start();
require 'require/database.php';



if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
   if(isset($_GET['id']) AND !empty($_GET['id'])) {
      $id_message = intval($_GET['id']);

      $msg = $bdd->prepare('SELECT * FROM messages WHERE id = ? AND id_destinataire = ?');
      $msg->execute(array($_GET['id'],$_SESSION['id']));
      $msg_nbr = $msg->rowCount();
      $m = $msg->fetch();

      $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
      $p_exp->execute(array($m ['id_expediteur']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['pseudo'];
     
?>
<!DOCTYPE html>
<html>
<head>
   <title>Lecture message<?= $id_message ?></title>
   <meta charset="utf-8" />
</head>
<body>
   <a href="reception.php">Boîte de réception</a>
   <a href="envoi.php?r=<?= $p_exp ?>&o=<?= urlencode($m['objet']) ?>">Répondre</a>
   <a href="supprimer.php?id=<?= $m['id'] ?>">Supprimer</a><br /><br /><br />
   <h3 align="center">Lecture du message <?= $p_exp ?></h3> 
   <div align="center">
      <?php if($msg_nbr == 0) { echo "Erreur"; } 
      else { ?>
      <b><?= $p_exp ?></b> vous a envoyé: <br /><br />
      <b>Objet:</b> <?= $m['objet'] ?>
      <br /><br />
      <?= nl2br($m['message']) ?><br />
     
      
      <div>

      
<?php echo $m['img_message'] ?>
      <img src="membres\img_message/<?php echo $m['img_msg']; ?>" alt="photo_profil" width="150"><br>
      </div>
      
      <?php } ?>
   </div>
</body>
</html>
<?php
      $lu = $bdd->prepare('UPDATE messages SET lu = 1 WHERE id = ?');
      $lu->execute(array($m['id']));
   }
}
?>