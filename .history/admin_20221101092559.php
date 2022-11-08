<?php
 
require 'require/database.php';
?>
<?php
// recup membres
$membres = $bdd->query('Select * FROM membres ORDER BY id DESC LIMIT 100');

// CONFIRMER LES MEMBRES

if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
    $confirme = (int) $_GET['confirme'];
}
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
</ul>


    
</body>
</html>