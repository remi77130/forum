<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo'])  AND !empty($_POST['mail'])  AND !empty($_POST['mail2']) 
    AND !empty($_POST['password']) AND !empty($_POST['password2']))
        
    {


        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255)
        {

            if($mail == $mail2)
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {

                    $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail = ?);  // REQUETE SI MAIL EXISTE DEJA
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0)
                    { 

                if($password == $password2)
                {
                    $insertmbr = $bdd->prepare("INSERT INTO users (pseudo, mail, mdp) VALUES(?,?,?)");
                    $insertmbr->execute(array($pseudo, $mail, $password));
                    $erreur  = " Votre compte est maintenant créer !"; 

                    

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
            else{

                $erreur = "Votre mail ne correspond pas ";
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

}



?>

