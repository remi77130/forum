
<?php 
session_start(); //pour recup dans la bdd
require('database.php');
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getId = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $requser->execute(array($getid));
    $userInfo = $reqUser->fetch();


?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>

<body>
    
    <br><br>





<h2>Profil de <?php echo $userInfo['pseudo'];?></h2>
<br><br>
pseudo <?php echo $userInfo['pseudo'];?> 
<br>
mail <?php echo $userInfo['mail'];?>

<?php
if(isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
{
  echo '<font color="red">'.$erreur."</font>";
  
} 
?>




</body>
</html>

<?php  }