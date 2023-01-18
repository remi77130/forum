<?php  

setcookie("usename", "pseudo", "mail", time()+60*60*24*30); //30jours
?>

<?php

if(!isset($_SESSION['id']) 
AND isset($_COOKIE['email'],$_COOKIE['password']) 
AND !empty($_COOKIE['email']) AND !empty($_COOKIE['password'])){

    $reqUser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
      $reqUser->execute(array($_COOKIE['email'], $_COOKIE['password']));
      $userExist = $reqUser->rowCount();
      if($userExist == 1) 
      {
      
         $userInfo = $reqUser->fetch();
         $_SESSION['id'] = $userInfo['id'];
         $_SESSION['pseudo'] = $userInfo['pseudo'];
         $_SESSION['mail'] = $userInfo['mail'];
      }

}

?>


