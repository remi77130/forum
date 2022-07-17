<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
include 'profil.php';
?>

<?php
 { 
 $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
 $requser->execute(array($getid));
 $userinfo = $requser->fetch();
}
   ?>
<?php

 echo $userinfo['pseudo']; 
 
 ?><br><br>









