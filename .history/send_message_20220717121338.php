<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
include 'profil.php';
?>

<?php
 
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
}
   ?>
<?php

 echo $requser['pseudo']; 
 
 ?><br><br>




