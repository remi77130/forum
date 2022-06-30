<?php require 'signupAction.php'; ?>
<?php include 'includes/head.php'; ?>

<!DOCTYPE html>
<html lang="en">

<body>

<?php
include 'includes/header.php' ?>

<section class="section_signup">


<div class="title_section_signup">
  <h2>Faite de nouvel connaissance <br>
 </h2>
  
</div>


<?php include 'includes/FormSignup.php ' ?>

<?php
if(isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
{
  echo '<font color="red">'.$erreur."</font>";
  
} 
?>

</div>



</section>

<?php include 'includes/footer.php' ?>

</body>
</html>