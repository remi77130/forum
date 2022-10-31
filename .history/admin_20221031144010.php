<?php
session_start();
 
require 'require/database.php';

// recup membres
$membres = $bdd->query('Select * from membres');

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
    <!-- afficher les membres-->
<?php while($m = $membres->fetch()) { ?>
    <li><?= $m['id'] ?> : <?= $m['pseudo'] ?></li> 
    <?php } ?>
</ul>


    
</body>
</html>