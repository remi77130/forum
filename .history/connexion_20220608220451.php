
<?php require('database.php');?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>



<?php                                        //action

if (isset($_POST['formconnect']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $passwordconnect = sha1($_POST['passwordconnect']);
    if(!empty($mailconnect) AND !empty($passwordconnect))
    {

      $requser = $bdd->prepare("SELECT * FROM  users WHERE mail = ? AND mdp = ?");
      $requser->execute(array($mailconnect, $passwordconnect));
      $userExist = $requser->rowCount();
      if($userExist ==1)
      {

      }
      
      else
      {

        $erreur = "Mauvaise mail ou mdp";
      }
    }

    else
    {
$erreur = "tous les champs doivent être cmplétés!";
    }

}


?>









<body>
    <br><br>

    <form class="container" method="POST">



<h2>Connexion</h2>


  
  <div class="mb-3">
    <label for="mail" class="form-label">Mail</label>
    <input type="email" class="form-control" name="mailconnect" value="<?php if(isset($mail)) { echo $mail; } ?>">
  </div>

  <div class="mb-3">
    <label for="pasword" class="form-label">Password</label>
    <input type="password" class="form-control" name="passwordconnect">
  </div>
 
  <button type="submit" class="btn btn-primary" name="formconnect" value="Se connecter !">S'inscrire</button>

  <br><br>
 <a href="signup.php"><p>Je n'ai pas de compte, je m'incrit</p></a>

      
   </form>


<?php
if(isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
{
  echo '<font color="red">'.$erreur."</font>";
  
} 
?>




</body>
</html>