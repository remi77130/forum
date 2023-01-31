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