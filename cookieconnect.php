<?php

if(!isset($_SESSION['id']) AND isset($_COKIE['email'],$_COKIE['password']) 
AND !empty($_COKIE['email']) AND !empty($_COKIE['password'])){

    $reqUser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
      $reqUser->execute(array($_COKIE['email'], $_COKIE['password']));
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