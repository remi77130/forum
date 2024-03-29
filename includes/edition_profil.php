<?php 

include_once 'cookieconnect.php';
require 'require/database.php';


if(isset($_SESSION['id'])) //autorisation affichage page si compte existe
{
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    $pseudo = "";
    $description = "";
    $astrologie = "";
    $taille = "";
    $choix = "";
    $sexualite = "" ;
    $nationality = "";
    $poids = "";
    $age = "";
    $mail = "";
    $mdp = "";
    $executeRequest = false;

    //Modification pseudo
    if(!empty($_POST['newpseudo']) && ($_POST['newpseudo']!=$user['pseudo'])) {
        echo 'pseudo';
        $executeRequest = true;
        $pseudo = htmlspecialchars($_POST['newpseudo']);
    }else{
        $pseudo = $user['pseudo'];
    }

    // Modification description
    if(isset($_POST['description_profil']) && ($_POST['description_profil']!=$user['description_profil'])) {
        echo 'descr';
        $executeRequest = true;
        $description = htmlspecialchars($_POST['description_profil']);
    }else{
        $description = $user['description_profil'];
    }
   
    // Modification astrologie
    if(isset($_POST['astrologie']) && ($_POST['astrologie']!=$user['astrologie'])) {
        echo 'astro';
        $executeRequest = true;
        $astrologie = htmlspecialchars($_POST['astrologie']);
    }else{
        $astrologie = $user['astrologie'];
    }
    
    // Modification taille
   
    if(isset($_POST['taille']) && ($_POST['taille']!=$user['taille'])) {
        echo 'taille';
        $executeRequest = true;
        $taille = htmlspecialchars($_POST['taille']);
    }else{
        $taille = $user['taille'];
    }


     // Modification choix
   
     if(isset($_POST['choix']) && ($_POST['choix']!=$user['choix'])) {
        echo 'choix';
        $executeRequest = true;
        $choix = htmlspecialchars($_POST['choix']);
        }else{
            $choix = $user['choix'];
        }


     // Modification sexualite
   
     if(isset($_POST['sexualite']) && ($_POST['sexualite']!=$user['sexualite'])) {
        echo 'sexualite';
        $executeRequest = true;
        $sexualite = htmlspecialchars($_POST['sexualite']);
        }else{
            $sexualite = $user['sexualite'];
        }


             // Modification nationality

    
             if(isset($_POST['nationality']) && ($_POST['nationality']!=$user['nationality'])) {
                echo 'nationality';
                $executeRequest = true;
                $nationality = htmlspecialchars($_POST['nationality']);
                }else{
                    $nationality = $user['nationality'];
                }


     // Modification poids
   
     if(isset($_POST['poids']) && ($_POST['poids']!=$user['poids'])) {
        echo 'poids';
        $executeRequest = true;
        $poids = htmlspecialchars($_POST['poids']);
        }else{
            $poids = $user['poids'];


        } 
        
        // Modification cheveux
   
        if(isset($_POST['cheveux_color']) && ($_POST['cheveux_color']!=$user['cheveux_color'])) {
           echo 'cheveux_color';
           $executeRequest = true;
           $cheveux_color = htmlspecialchars($_POST['cheveux_color']);
           }else{
               $cheveux_color = $user['cheveux_color'];
           }
        

           // Modification situation
   
     if(isset($_POST['situation']) && ($_POST['situation']!=$user['situation'])) {
        echo 'situation';
        $executeRequest = true;
        $situation = htmlspecialchars($_POST['situation']);
        }else{
            $situation = $user['situation'];
        }





    //Modification age
    if(!empty($_POST['newage']) && ($_POST['newage']!=$user['age'])) {
        echo 'age';
        $executeRequest = true;
        $age = htmlspecialchars($_POST['newage']);
   }else{
       $age = $user['age'];
   }

   //Modification  mail
    if(!empty($_POST['newmail']) && ($_POST['newmail']!=$user['mail'])) {
        echo 'mail';
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
            echo 'mdp';
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
    if(!empty($_FILES['avatar']) && ($_FILES['avatar']['name']!="")) {
        $tailleMax = 2097152; //2M0 // 2097152
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png', 'svg'); // AJOUT SVG
        if($_FILES['avatar']['size'] <= $tailleMax) {
           $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
           if(in_array($extensionUpload, $extensionsValides)) {
              $chemin = "/membres/avatars/".$_SESSION['id'].".".$extensionUpload;
              $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], "membres/avatars/".$_SESSION['id'].".".$extensionUpload);
              if($resultat) {
                echo 'avatar';
                $executeRequest = true;
                $avatar = $_SESSION['id'].".".$extensionUpload;
              } else {
                $avatar = $user['avatar'];
                $msg = "Erreur durant l'importation de votre photo de profil";
              }
           } else {
              $msg = "Votre photo de profil doit être au format jpg, jpeg, gif, png ou svg";
           }
        } else {
           $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
        }
  
      }else{
        $avatar = $user['avatar'];
      }



      
    // Requête edition profil
    
    if($executeRequest==true){
      $param = [
          'pseudo' => $pseudo,
          'description_profil' => $description,
          'astrologie' => $astrologie,
          'choix' => $choix,
          'sexualite' => $sexualite,
          'nationality' => $nationality,
          'poids' => $poids,
          'cheveux_color' => $cheveux_color,
          'situation' => $situation,
          'age' => $age,
          'mail' => $mail,
          'mdp' => $mdp,
          'avatar' => $avatar,
          'taille' => $taille,
          //'departement' => $departement,
          //'ville' => $ville,
          'id' => $_SESSION['id'],
      ];

      $updateProfil = $bdd->prepare('UPDATE membres
                                     SET pseudo = :pseudo,
                                     description_profil = :description_profil,
                                     astrologie = :astrologie,
                                     choix = :choix,
                                     sexualite = :sexualite,
                                     nationality = :nationality,
                                     poids = :poids,
                                     cheveux_color = :cheveux_color,
                                     situation = :situation,
                                     age = :age,
                                     mail = :mail,
                                     mdp = :mdp,
                                     taille = :taille,
                                     avatar = :avatar
                                     WHERE id = :id');
      $updateProfil->execute($param);
      $msg = "Votre profil a bien été modifié";
      header('Location: profil.php?id='.$_SESSION['id']);
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