<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
include 'profil.php';
?>

<?php
 { 
 $requser = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
 $requser->execute(array($getid));
}
   ?>
<?php

 echo $requser['pseudo']; 
 
 ?><br><br>









