
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





<h2>Edition de mon profil</h2>



</body>
</html>

<?php
}

else

{

header("Location: connexion.php");
}

?>