
<?php 
session_start(); //pour recup dans la bdd
require('database.php');
if(isset ($_SESSION['id'])) //autorisation affichage page si user à un compte
{

    $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>

<body>
    
    <br><br>
<div>
<h2>Edition de mon profil</h2>
<br><br>

<form action="" method="post">

<input type="text" name="newPseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br><br>

<input type="text" name="newMail" placeholder="mail" value="<?php echo $user['mail']; ?>" /><br><br>

<input type="text" name="newPassword1" placeholder="password" /><br><br>

<input type="text" name="newPassword2" placeholder="Confirmation password" /><br><br>

<input type="submit" value="Mettre à jour" />





</form>
</div>

</body>
</html>

<?php
}

else

{

header("Location: connexion.php");
}

?>