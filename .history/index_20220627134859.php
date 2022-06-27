<!-- Page affichage des membres -->


<?php 
session_start(); //pour recup dans la bdd   

require('database.php');


?>

<?php 

$sql = "SELECT * FROM membres WHERE id = ?";
