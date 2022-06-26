<?php 

require('database.php');

include('includes/head.php');


if(isset($_POST['article_titre'], $_POST['article_contenu'])){

    if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])){ // SI PAS REMPLIS


    }else {

        $erreru = "Veuillez remplir tous les champs ! ";
    }
}


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

 <?php if(isset($erreur)){

    echo $erreur; // erreur si pas remplis
 }
?>


    
</body>
</html>