
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

    $pseudo = "";
    $description = "";
    $astrologie = "";
    $age = "";
    $mail = "";
    $mdp = "";
    $executeRequest = false;

    //Modification pseudo
    if(!empty($_POST['newpseudo'])) {
        $executeRequest = true;
        $pseudo = htmlspecialchars($_POST['newpseudo']);
    }else{
        $pseudo = $user['pseudo'];
    }

    // Modification description
    if(isset($_POST['description_profil'])) {
        $executeRequest = true;
        $description = htmlspecialchars($_POST['description_profil']);
    }else{
        $description = $user['description_profil'];
    }
   
    // Modification astrologie
    if(isset($_POST['astrologie'])) {
        $executeRequest = true;
        $astrologie = htmlspecialchars($_POST['astrologie']);
    }else{
        $astrologie = $user['astrologie'];
    }

    //Modification age
    if(!empty($_POST['newage'])) {
        $executeRequest = true;
        $age = htmlspecialchars($_POST['newage']);
   }else{
       $age = $user['age'];
   }

   //Modification  mail
    if(!empty($_POST['newmail'])) {
        $executeRequest = true;
        $mail = htmlspecialchars($_POST['newmail']);
    }else{
        $mail = $user['mail'];
    }

    //Modification mdp
    if(!empty($_POST['newmdp1']) AND !empty($_POST['newmdp2'])) {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']);
        if($mdp1 == $mdp2) {
            $executeRequest = true;
            $mdp = $mdp1;
         }else {
            $mdp = $user['mdp'];
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }else{
        $mdp = $user['mdp'];
    }
    //Modification avatar              //Avatar UPLOAD VOIR PAR LA SUITE POUR ENREGISTRER LE NAME DE LA PHOTO DANS LA BDD...
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
        $tailleMax = 2097152; //2M0 // 2097152
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['avatar']['size'] <= $tailleMax) {
           $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
           if(in_array($extensionUpload, $extensionsValides)) {
              $chemin = "/membres/avatars/".$_SESSION['id'].".".$extensionUpload;
              $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], "membres/avatars/".$_SESSION['id'].".".$extensionUpload);
              if($resultat) {
                $executeRequest = true;
                $avatar = $_SESSION['id'].".".$extensionUpload;
              } else {
                $avatar = $user['avatar'];
                $msg = "Erreur durant l'importation de votre photo de profil";
              }
           } else {
              $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
           }
        } else {
           $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
        }
  
      }

    // Requête edition profil
    if($executeRequest==true){
        $updateProfil = $bdd->prepare("UPDATE membres SET pseudo=?, description_profil=?, astrologie=?, age=?, mail=?, mdp =?, avatar=?, WHERE id = ?");
        $updateProfil->execute([$pseudo,$description,$astrologie,$age,$mail,$mdp,$avatar,$_SESSION['id']]);
        $msg = "Votre profil a bien été modifié";
    }


 ?>

<?php

include 'includes/FormEditProfil.php'

?>

 
 <?php   
 }
 else {
    header("Location: connexion.php");
 }
 ?>