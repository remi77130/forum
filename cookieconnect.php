<?php 
//session_start();

setcookie('pseudo', $_SESSION['pseudo'], time() +365*24*3600);
setcookie('mail', $_SESSION['mail'], time() +365*24*3600);
setcookie('id', $_SESSION['id'], time() +365*24*3600);

//if(!isset($_SESSION['id']) 
//AND isset($_COOKIE['email'],$_COOKIE['password']) 
//AND !empty($_COOKIE['email']) AND !empty($_COOKIE['password'])){

  //  $reqUser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
    //$reqUser->execute(array($_COOKIE['email'], $_COOKIE['password']));
      //$userExist = $reqUser->rowCount();
      //if($userExist == 1) 
      //{ 
        // $userInfo = $reqUser->fetch();
        // $_SESSION['id'] = $userInfo['id'];
        // $_SESSION['pseudo'] = $userInfo['pseudo'];
        // $_SESSION['mail'] = $userInfo['mail'];
        // $_SESSION['password'] = $userInfo['password'];
      //}
//}

?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>

<span>Pseudo : </span><//?php echo $_COOKIE['pseudo']; ?> <br>
<span>Mail : </span><//?php echo $_COOKIE['mail']; ?> <br>
<span>Id : </span><//?php echo $_COOKIE['id']; ?> <br>
   
</body>
</html>




