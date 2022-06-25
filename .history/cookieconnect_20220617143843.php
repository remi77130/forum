<?php include 'includes/head.php';

if(!isset($_SESSION['id']) AND isset($_COKIE['email'],$_COKIE['password']) 
AND !empty($_COKIE['email']) AND !empty($_COKIE['password'])){

    $reqUser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND mdp = ?");
      $reqUser->execute(array($mailconnect, $mdpconnect));
      $userExist = $reqUser->rowCount();
      if($userExist == 1) 
      {
      
         $userInfo = $reqUser->fetch();
         $_SESSION['id'] = $userInfo['id'];
         $_SESSION['pseudo'] = $userInfo['pseudo'];
         $_SESSION['mail'] = $userInfo['mail'];

         header("Location: profil.php?id=".$_SESSION['id']);
      }

}

