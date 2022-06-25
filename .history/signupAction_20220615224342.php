<?php
session_start();
require('database.php');


//Validation du formulaire
if(isset($_POST['validate'])){

    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    $age = htmlspecialchars($_POST['age']);
    $avatar = htmlspecialchars($_POST['avatar']);

    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo'])  AND !empty($_POST['mail'])
    AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['age'])
    AND !empty($_POST['avatar']))
        
    {


        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255)
        {

            if($password == $password2)  // verif password
            {
               

                    $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail = ? ");  // REQUETE SI MAIL EXISTE DEJA
                    $reqmail->execute(array($mail,));
                    $mailexist = $reqmail->rowCount();

                    
                    if($mailexist == 0)
                    { 
                       
                if($password == $password2)
                {
                    $insertmbr = $bdd->prepare("INSERT INTO users (pseudo, mail, mdp, age) VALUES(?,?,?,?)");
                    $insertmbr->execute(array($pseudo, $mail, $password, $age));
                    
                    $erreur  = " Votre compte est maintenant créer ! <a style='color: 'green' href=\"connexion.php\">Me conecter</a>";" ";
                    
                }
                else{

                    $erreur = "Votre password ne correspond pas ! ";
                
                  } 
                 
                  if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
                    $tailleMax = 2097152; //2MO
                    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

                    if($_FILES['avatar']['size'] <= $tailleMax) {
                       $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

                       if(in_array($extensionUpload, $extensionsValides)) {
                          $chemin = "Forum/membres/avatars/".$_SESSION['id'].".".$extensionUpload;
                          $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

                          if($resultat) {
                             $updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                             $updateavatar->execute(array(
                                'avatar' => $_SESSION['id'].".".$extensionUpload,
                                'id' => $_SESSION['id']
                                ));

                             header("Location: profil.php?id=".$_SESSION['id']);

                          } 
                          
                          else 
                          {
                             $erreur = "Erreur durant l'importation de votre photo de profil";
                          }
                       } 
                       else 
                       {
                          $erreur = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
                       }
                    } 
                    else 
                    {
                       $erreur = "Votre photo de profil ne doit pas dépasser 2Mo";
                    }
                 } 
                 
                 { 
                      

                  }
                  
                  }
                  else
                  {
                      $erreur = " mail déja utilisé ! ";  // ERREUR SI MAIL EXISTE DEJA 
                  }

                   }

                  else{

                    $erreur= "Votre mail n'est pas valide ";
                  }
             }
            
        }
        
        else
        {

            $erreur = "Votre pseudo ne doit pas dépasssser 255 caractrere ";

        }


    }
    else{
        
        $erreur = "Veuillez completé tous les champs ! ";
    }





?>

