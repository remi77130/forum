
<?php 
session_start(); //pour recup dans la bdd
require('database.php');?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>

<body>
    <br><br>


<?if (isset($_GET['id']))
{


?>
<h2>Profil de... </h2>
<br><br>
pseudo = ... 
<br>
mail = ...

<?php
if(isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
{
  echo '<font color="red">'.$erreur."</font>";
  
} 
?>




</body>
</html>
<?php 


}
?>