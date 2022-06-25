
<?php 
session_start(); //pour recup dans la bdd
require('database.php');
if(isset ($_SESSION['id'])) //autorisation affichage page si user à un compte
{

    $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if(isset($_POST['newPseudo']) AND !empty($_POST['newPseudo']) AND $_POST['newPseudo'] != $uer['pseudo']);
    {
        $newPseudo= htmlspecialchars($_POST['newPseudo']);
        $insertPseudo = $bdd->prepare('UPDATE users SET pseudo = ? WHERE id = ?');
        $insertPseudo->execute(array($newPseudo, $_SESSION['id']));

        header('Location: profil.php?id='.$_SESSION['id']);
    }

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

<label>Pseudo: </label> <br>

<input type="text" name="newPseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br><br>

<label>Mail: </label><br>

<input type="text" name="newMail" placeholder="mail" value="<?php echo $user['mail']; ?>" /><br><br>

<label>Password: </label><br>

<input type="password" name="newPassword1" placeholder="password" /><br><br>

<label>Confirmation password : </label><br> 

<input type="password" name="newPassword2" placeholder="Confirmation password" /><br><br>

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