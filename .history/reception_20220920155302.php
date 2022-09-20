<?php                          ////// FEUILLE RECEPTION DU MESSAGE *********->LECTURE.PHP
session_start();
require 'require/database.php';
include 'includes/head.php';

if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
$msg = $bdd->prepare('SELECT * FROM messages WHERE id_destinataire = ? ORDER BY id DESC');
$msg->execute(array($_SESSION['id']));
$msg_nbr = $msg->rowCount();
?>
<!DOCTYPE html>
<html>
   <link rel="stylesheet" href="assets/recepetion.css">
<?php
include 'includes/head.php';
?>

<body>
   
   <h3>Votre boîte de réception</h3>

   <div class="nav_menu_reception">
<nav>

<a href="profil.php?id=<?= $_SESSION['id'] ?>">Profil</a>
<a href="envoi.php">Nouveau message</a><br /><br /><br />

</nav>
   </div>


   <?php
   if($msg_nbr == 0) { echo "Vous n'avez aucun message pour l'instant..."; }
   
   while($m = $msg->fetch()) {
      $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
      $p_exp->execute(array($m['id_expediteur']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['pseudo'];
   ?>
   <a href="lecture.php?id=<?= $m['id'] ?>"<?php if($m['lu'] == 1) 
   { ?><span style="color:grey"><?php } ?><b>
    

      <div class="container_img"> <br>
      <?= $p_exp ?></b> vous a envoyé un message<br /><br>


<b>Objet:</b> <?= $m['objet'] ?> <br>
      <?= nl2br($m['message']) ?><br /> <br>

      <?php if($m['lu'] == 1) { ?></span> 
      <?php } ?></a><br />
   <br/>

   <?php } ?>

      </div>


      <div class="conatainer_icone">

      <img class="icones_reception" src="icones/noun-letter-1091868.svg" alt="" srcset="">
      </div>
</body>
</html>
<?php } ?>