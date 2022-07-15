
<?php 
session_start(); //pour recup dans la bdd

include_once 'cookieconnect.php';
require 'require/database.php';
include 'includes/head.php';





if(isset($_SESSION['id'])) //autorisation affichage page si compte existe
{
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    
    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
       $newpseudo = htmlspecialchars($_POST['newpseudo']);
       $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
       $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
       
       header('Location: profil.php?id='.$_SESSION['id']);
    }



    if(isset($_POST['description_profil'])) {
      $newdescription = htmlspecialchars($_POST['description_profil']);
      $insertdescription = $bdd->prepare("UPDATE membres SET description_profil = ? WHERE id = ?");
      $insertdescription->execute(array($newdescription, $_SESSION['id']));
      
      header('Location: profil.php?id='.$_SESSION['id']);
   }




if(isset($_FILES['astrologie'])) {
   $newastrologie = htmlspecialchars($_POST['astrologie']);
   $insertastrologie = $bdd->prepare("UPDATE membres SET astrologie = ? WHERE id = ?");
   $insertastrologie->execute(array($newastrologie, $_SESSION['id']));
   
   header('Location: profil.php?id='.$_SESSION['id']);
}

////////////////////////////////////


    if(isset($_POST['newage']) AND !empty($_POST['newage']) AND $_POST['newage'] != $user['age']) {
      $newage = htmlspecialchars($_POST['newage']);
      $insertage = $bdd->prepare("UPDATE membres SET age = ? WHERE id = ?");
      $insertage->execute(array($newage, $_SESSION['id']));
      
      header('Location: profil.php?id='.$_SESSION['id']);
   }


    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
       $newmail = htmlspecialchars($_POST['newmail']);
       $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
       $insertmail->execute(array($newmail, $_SESSION['id']));

       header('Location: profil.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
       $mdp1 = sha1($_POST['newmdp1']);
       $mdp2 = sha1($_POST['newmdp2']);
       if($mdp1 == $mdp2) {
          $insertmdp = $bdd->prepare("UPDATE membres SET mdp = ? WHERE id = ?");
          $insertmdp->execute(array($mdp1, $_SESSION['id']));

          header('Location: profil.php?id='.$_SESSION['id']);

       } 
       
       else {
          $msg = "Vos deux mdp ne correspondent pas !";
       }
    }
    //Avatar UPLOAD VOIR PAR LA SUITE POUR ENREGISTRER LE NAME DE LA PHOTO DANS LA BDD...

    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
      $tailleMax = 2097152; //2M0
      $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
      if($_FILES['avatar']['size'] <= $tailleMax) {
         $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
         if(in_array($extensionUpload, $extensionsValides)) {
            $chemin = "membres\avatars/".$_SESSION['id'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
            if($resultat) {
               $updateavatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
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

   

   if(!empty($_FILES['img'])){ // SI UN FICHIER A BIEN ETE ENVOYER

      $img = $_FILES['img'];
      $ext = strtolower(substr($img['name'],-3));
      $allow_ext = array("jpg",'png','gif');
      if($in_array($ext,$allow_ext)) {  // PERMET DE VERIFIER/AJOUTER LES EXTENSION EN PLUS OU PAS
      
         $updateimg = $bdd->prepare('UPDATE membres img WHERE id = id');

      move_uploaded_file($img['tmp_name'],"images/".$img['name']); // img = name input

       }
       else { 
         $msg = "votre fichier n'est pas une images";
            }

    }


  
 ?>
 <html>
    <head>
       <title>TUTO PHP</title>
       <meta charset="utf-8">
    </head>
    <body>


   
    </body>
 </html>


<?php

include 'includes/FormEditProfil.php'

?>

 
 <?php   
 }
 else {
    header("Location: connexion.php");
 }
 ?>