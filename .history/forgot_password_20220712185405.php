<?php 
session_start(); //pour recup dans la bdd
require 'require/database.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site web</title>
  </head>
  <body>
    <h2>Forgot password</h2>
    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter mail" name="mail" required>
        <button type="submit">Send me a random password</button>
      </div>
    </form>
  </body>
</html>


<?php
if(isset($_POST['mail'])){

  $password = uniqid();
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
}


?>