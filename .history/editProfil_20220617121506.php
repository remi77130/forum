
<?php 
session_start(); //pour recup dans la bdd
require('database.php');


if(isset($_SESSION['id'])) //autorisation affichage page si compte existe
{
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    
    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
       $newpseudo = htmlspecialchars($_POST['newpseudo']);
       $insertpseudo = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
       $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
       
       header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newage']) AND !empty($_POST['newage']) AND $_POST['newage'] != $user['age']) {
      $newage = htmlspecialchars($_POST['newage']);
      $insertage = $bdd->prepare("UPDATE users SET age = ? WHERE id = ?");
      $insertage->execute(array($newage, $_SESSION['id']));
      
      header('Location: profil.php?id='.$_SESSION['id']);
   }


    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
       $newmail = htmlspecialchars($_POST['newmail']);
       $insertmail = $bdd->prepare("UPDATE users SET mail = ? WHERE id = ?");
       $insertmail->execute(array($newmail, $_SESSION['id']));

       header('Location: profil.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
       $mdp1 = sha1($_POST['newmdp1']);
       $mdp2 = sha1($_POST['newmdp2']);
       if($mdp1 == $mdp2) {
          $insertmdp = $bdd->prepare("UPDATE users SET mdp = ? WHERE id = ?");
          $insertmdp->execute(array($mdp1, $_SESSION['id']));

          header('Location: profil.php?id='.$_SESSION['id']);

       } 
       
       else {
          $msg = "Vos deux mdp ne correspondent pas !";
       }
    }

    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
      $tailleMax = 2097152;
      $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
      if($_FILES['avatar']['size'] <= $tailleMax) {
         $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
         if(in_array($extensionUpload, $extensionsValides)) {
            $chemin = "membre/avatar/".$_SESSION['id'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
            if($resultat) {
               $updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar');
               $updateavatar->execute(array(
                  'avatar' => $_SESSION['id'].".".$extensionUpload,
                  'id' => $_SESSION['id']
                  ));
               header('Location: profil.php?id='.$_SESSION['id']);
            } else {
               $msg = "Erreur durant l'importation de votre photo de profil";
            }
         } else {
            $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
         }
      } else {
         $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
      }
   }
          
       
      
      
    
 ?>
 <html>
    <head>
       <title>TUTO PHP</title>
       <meta charset="utf-8">
    </head>
    <body>
       <div>
          <h2>Edition de mon profil</h2>
          <div>
             <form method="POST" action="" enctype="multipart/form-data">
                <label>Pseudo :</label>
                <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /><br />
                <label>Age</label>
                <input type="text" name="newage" placeholder="age" value="<?php echo $user['age']; ?>" /><br /><br />
                <label>Mail :</label>
                <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
                <label>Mot de passe :</label>
                <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
                <label>Confirmation - mot de passe :</label>
                <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
               <br>
               <label>Avatar</label>
               <input type="file" name="avatar"> <br><br>

                <input type="submit" value="Mettre à jour mon profil !" />
             </form>
             <?php if(isset($msg)) { echo $msg; } ?>
          </div>
       </div>
    </body>
 </html>
 <?php   
 }
 else {
    header("Location: connexion.php");
 }
 ?>