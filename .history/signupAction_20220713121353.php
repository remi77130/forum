<?php



session_start();
require 'require/database.php';


//Validation du formulaire
if(isset($_POST['validate'])){

    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    $age = htmlspecialchars($_POST['age']);
    $sexe = htmlspecialchars($_POST['sexe']);

    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo'])  AND !empty($_POST['mail'])
    AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['age']) 
    AND !empty($_POST['sexe']))
        
    {

        $token = rand(1000000, 9000000);
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
                   
              
                        try {
                            $insertmbr = $bdd->prepare("INSERT INTO membres (pseudo, mail, mdp, age, sexe, avatar, token) VALUES(?,?,?,?,?,?,? )");
                            $insertmbr->execute(array($pseudo, $mail, $password, $age, $sexe, $token, 0, "default.jpg"));
                            
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
                           header("Location: index.php"); 




                           function smtpmailer($to, $from, $from_name, $subject, $body)
                               {
                                   $mail = new PHPMailer();
                                   $mail->IsSMTP();
                                   $mail->SMTPAuth = true; 
                            
                                   $mail->SMTPSecure = 'ssl'; 
                                   $mail->Host = 'smtp.gmail.com';
                                   $mail->Port = 465;  
                                   $mail->Username = 'refenech@gmail.com';
                                   $mail->Password = 'Champagne-77';   
                              
                              //   $path = 'reseller.pdf';
                              //   $mail->AddAttachment($path);
                              
                                   $mail->IsHTML(true);
                                   $mail->From="refenech@gmail.com";
                                   $mail->FromName=$from_name;
                                   $mail->Sender=$from;
                                   $mail->AddReplyTo($from, $from_name);
                                   $mail->Subject = $subject;
                                   $mail->Body = $body;
                                   $mail->AddAddress($to);

                                   if(!$mail->Send())
                                   {
                                       $error ="Please try Later, Error Occured while Processing...";
                                       return $error; 
                                   }
                                   else 
                                   {
                                       $error = "Thanks You !! Your email is sent.";  
                                       return $error;
                                   }
                                
                            
                               }
                               
                               $to   = '$mail'; // EMAIL DESTINATAIRE
                               $from = 'refenech@gmail.com';
                               $name = 'rémi';
                               $subj = 'Email de confirmation de compte';
                               $msg = 'http://localhost:80/Forum/signup.php?id='.$_SESSION['id']; ///// 
                               
                               $error=smtpmailer($to,$from, $name ,$subj, $msg);











                           
                        } 
                                             
                   
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