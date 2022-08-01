<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
include 'includes/head.php';
?>


<?php
if(isset($_GET['id']) AND $_GET['id'] > 0) 
?>

<div>
     <img src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil"><br>

   </div>
 
