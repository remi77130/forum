<?php include 'includes/head.php';

$reqUser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND mdp = ?");
      $reqUser->execute(array($mailconnect, $mdpconnect));
      $userExist = $reqUser->rowCount();
      if($userExist == 1) 
      {
         if(isset($_POST['rememberme'])) //checkbox remember
         {
            setcookie('email',$mailconnect,time()+365*24*3600,null,null,false,true);
            setcookie('password',$mdpconnect,time()+365*24*3600,null,null,false,true);
         }
         $userInfo = $reqUser->fetch();
         $_SESSION['id'] = $userInfo['id'];
         $_SESSION['pseudo'] = $userInfo['pseudo'];
         $_SESSION['mail'] = $userInfo['mail'];

         header("Location: profil.php?id=".$_SESSION['id']);
      }