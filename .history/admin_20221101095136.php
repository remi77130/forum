
<!--  COMFIRME MEMBRE SUPP MEMBRE -->

<?php
require 'require/database.php';

//if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1){
  //  exit(); }

?>


<?php

// CONFIRMER LES MEMBRES

if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
    $confirme = (int) $_GET['confirme'];

    $req = $bdd->prepare('UPDATE membres SET confirme = 1 WHERE id = ?');
    $req->execute(array($confirme));
 }

// SUPP LES MEMBRES

if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
    $supprime = (int) $_GET['supprime'];

    $req = $bdd->prepare('DELETE from membres WHERE id = ?');
    $req->execute(array($supprime));
 }


// recup membres
$membres = $bdd->query('Select * FROM membres ORDER BY id DESC LIMIT 5');

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace admin</title>
</head>
<body>


<ul>
<?php while($m = $membres->fetch()) { ?>
      <li><?= $m['id'] ?> : <?= $m['pseudo'] ?><?php if($m['confirme'] == 0) { ?> - <a href="admin.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a href="admin.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>
      <?php } ?>
</ul> <br><br><br>



<ul>
<?php while($c = $membres->fetch()) { ?>
      <li><?= $c['id'] ?> : <?= $c['pseudo'] ?><?php if($m['confirme'] == 0) { ?> - <a href="admin.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a href="admin.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>
      <?php } ?>
</ul>



    
</body>
</html>