<?php



session_start();
require 'require/database.php';


//Validation du formulaire
if(isset($_POST['validate'])){


// SELECT NOM DPT 

$req_dpt="SELECT * FROM departement";
$pdo_stmt=$bdd->prepare($req_dpt);
$pdo_stmt->execute();


    

    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    $age = htmlspecialchars($_POST['age']);
    $sexe = htmlspecialchars($_POST['sexe']);
   //$password=password_hash($mdp, PASSWORD_DEFAULT);
   //$paswword2=password_hash($mdp, PASSWORD_DEFAULT);
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo'])  AND !empty($_POST['mail'])
    AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['age']) 
    AND !empty($_POST['sexe']))
        
    {


        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255)
        {

            if($password == $password2)  // verif password
            {
               

                    $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ? ");  // REQUETE SI MAIL EXISTE DEJA
                    $reqmail->execute(array($mail,));
                    $mailexist = $reqmail->rowCount();

                    
                    if($mailexist == 0)
                    { 
                       
                if($password == $password2)
                {
                   
              
                        try { // VOIR POUR AJOUTER DATE INSCRIPTION
                            $insertmbr = $bdd->prepare("INSERT INTO membres (pseudo, mail, mdp, age, sexe, avatar) VALUES(?,?,?,?,?,? )");
                            $insertmbr->execute(array($pseudo, $mail, $password, $age, $sexe, "default.jpg"));
                            
                        }
                        catch(Exception $e) {
                            echo 'Exception -> ';
                            var_dump($e->getMessage());
                        }










                        
                        $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
                        $requser->execute(array($pseudo));
                        $userexist = $requser->rowCount();
                        if($userexist == 1) {
                           $userinfo = $requser->fetch();
                           $_SESSION['id'] = $userinfo['id'];
                           $_SESSION['pseudo'] = $userinfo['pseudo'];
                           $_SESSION['mail'] = $userinfo['mail'];
                           header("Location: profil_membre.php");
                           exit();
                        } 
                                    
                        
                        

$destinataire = "$mail"; // DEST DU MAIL
$sujet = "Confirmation de compte";
$message ="
Bienvenue sur le site $pseudo garde bien ton pseudo et mot de passe car 
 pour l'instant il n'y a pas de systéme de récupération de mot de passe ! ";

$headers = "From:hguv5320@hguv5320.odns.fr"; 
mail($destinataire,$sujet,$message,$headers);


echo "mail envoyer à $destinataire avec succes ! ";  

header("Location: connexion.php"); // REDIRECTION PAR EMAIL IMPOSSIBLE CAR HEADER LOCATION PROFIL 
                   
                }
                else{

                    $erreur = "Votre password ne correspond pas ! ";
                
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