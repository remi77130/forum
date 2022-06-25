<?php require('actions/signupAction.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <br><br>

    <form class="container" method="POST">

    <?php                            //Error msg
    if(isset($errorMsg)){
        echo '<p>'.$errorMsg.'<p>';
    }
    ?>



  <div class="mb-3">
    <label for="exampleInputPseudo" class="form-label">Pseudo</label>
    <input type="text" class="form-control" name="pseudo">
  </div>

  
  <div class="mb-3">
    <label for="mail" class="form-label">Mail</label>
    <input type="email" class="form-control" name="mail">
  </div>

  <div class="mb-3">
    <label for="mail2" class="form-label">Comfirmation mail</label>
    <input type="email" class="form-control" name="mail2">
  </div>


  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>


 
  <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>

  <br><br>
 <a href="login.php"><p>J'ai déjà un compte, je me connecte</p></a>

      
   </form>






</body>
</html>