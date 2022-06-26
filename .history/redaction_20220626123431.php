<?php 

require('database.php');
require('actions/redactionAction.php');

include('includes/head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Rédaction</title>
</head>
<body>


<form method="POST">

<input type="text" name="article_titre" placeholder="Titre" /><br>
<textarea name="article_contenu" placeholder="Contenu"></textarea><br>
<input type="submit" placeholder="Envoyer" />
</form>
 <br>

 <?php if(isset($eereur)){

    echo $erreur; // erreur si pas remplis
 }
?>


    
</body>
</html>