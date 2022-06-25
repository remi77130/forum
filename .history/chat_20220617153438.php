<?php 

include 'includes/head.php';
require('database.php');

if(isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['pseudo']) 
AND !empty($_POST['message']))
{
    $pseudo = htmlspecialchars( $_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);

    $insertmsg= $bdd->prepare('INSERT INTO chat (pseudo,message) VALUES(?,?)');
    $insertmsg->execute(array($pseudo, $message));
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

    <?php // AFFICHAGE MESSAGE

$allmsg = $bdd->query('SELECT * FROM chat');
while($msg=$allmsg->fetch())
{
?>
<b>Pseudo:</b>Message <br />
<?php 
}
?>
    
</body>
</html>