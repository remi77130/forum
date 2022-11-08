<?php
 
require 'require/database.php';
?>
<?php
// recup membres
$membres = $bdd->query('Select * FROM membres ORDER BY id DESC LIMIT 100');

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
    <li><?= $m['id'] ?> :  </li>
    <?php } ?>
</ul>


    
</body>
</html>