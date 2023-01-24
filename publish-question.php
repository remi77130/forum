<?php
require('actions/publishQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication question chanderland</title>
</head>
<body>

<?php include 'includes/navbar.php'; ?>


<h1>Publiez une question</h1>
         <br /><br />
         <form method="POST" action="">

         <?php 
         if(isset($errorMsg)) // MESSAGE ERREUR SI CHAMPS VIDE
         { echo
          '<p>'.$errorMsg.'</p>';
          }
          
          elseif (isset($successMsg)) // MESSAGE SUCCESS SI CHAMPS REMPLIS
          {
            echo '<p>'.$successMsg.'</p>';
          } 
          
          ?>

          
         <label>Titre de la question</label>
         <input type="text" name="title"> <br>
         
         <label>Description de la question</label>
         <textarea type="text" name="description"> </textarea> <br>
         
         <label>Contenu de la question</label>
         <input type="text" name="content"><br>


<button type="submit" name="validate">Publier</button>


            </form>
    
</body>
</html>