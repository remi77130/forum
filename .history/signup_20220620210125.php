<?php require('signupAction.php'); ?>
<?php include 'includes/head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<body>

<header>

<div>
    <img src="img/3.png" alt="logo" width="50px">
  </div>
  <div>
<button type="button" class="btn btn-primary"><a href="connexion.php">Connexion</a></button>
  </div>
 
</header>

<section class="section_signup">
    
<d


<?php
if(isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
{
  echo '<font color="red">'.$erreur."</font>";
  
} 
?>

</div>

</section>

<footer>
<P>Le footer</P>
</footer>

</body>
</html>