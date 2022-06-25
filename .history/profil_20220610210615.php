
<?php 
session_start(); //pour recup dans la bdd
require('database.php');
if(isset($_GET['id']) AND $_GET['id'] >0)
{
    $getId = intval($_GET['id'])


?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>

<body>
    
    <br><br>





<h2>Profil de... </h2>
<br><br>
pseudo = ... <?php echo "$pseudo";?>
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

<?php  }