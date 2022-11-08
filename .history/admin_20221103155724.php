
<!--  COMFIRME MEMBRE SUPP MEMBRE -->

<?php
require 'require/database.php';

//if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1){
  //  exit(); }

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
      <li><?= $m['id'] ?> : <?= $m['pseudo'] ?><?php if($m['confirme'] == 0) { ?> - 
        <a href="admin.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a href="admin.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>
      <?php } ?>
</ul> <br><br><br>


<!-- supp les commentaire -->

<ul>
      <?php while($c = $commentaires->fetch()) { ?>
      <li><?= $c['id'] ?> : <?= $c['pseudo'] ?> : <?= $c['contenu'] ?>
      <?php if($c['approuve'] == 0) { ?> - <a href="admin.php?type=commentaire&approuve=<?= $c['id'] ?>">
        Approuver</a><?php } ?> - <a href="admin.php?type=commentaire&supprime=<?= $c['id'] ?>">Supprimer</a></li>
      <?php } ?>
   </ul>



    
</body>
</html>