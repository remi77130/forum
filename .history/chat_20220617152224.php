<?php 

include 'includes/head.php';
require('database.php');

if(isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['pseudo']) 
AND !empty($_POST['message']))
{
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'] = 
}

?>

<!DOCTYPE html>
<html lang="en">


<body>
    <form action="" method="post">
<input type="text" placeholder="pseudo" name="pseudo"><br>
<textarea type="text" placeholder="Message" name="message" ></textarea><br>

<input type="submit" value="Envoyer">


    </form>
    
</body>
</html>