
<?php 
session_start(); //pour recup dans la bdd
require('database.php');
if(isset ($_SESSION['id'])) //autorisation affichage page si user à un compte
{

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
<br>
<?php
if($userInfo['id'] == $_SESSION['id'])
{
  ?>
  <a href="#">Editer mon profil</a>
  <a href="deconnexion.php">Se déconnecter</a>
  <?php
}
?>




</body>
</html>

<?php

}