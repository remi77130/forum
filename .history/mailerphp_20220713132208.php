<?php

function smtpmailer($to, $from, $from_name, $subject, $body)
                               {
                                   $mail = new PHPMailer(true);
                                   $mail->IsSMTP();
                                   $mail->SMTPAuth = true; 
                            
                                   $mail->SMTPSecure = 'ssl'; 
                                   $mail->Host = 'sokar.o2switch.net';
                                   $mail->Port = 465;  
                                   $mail->Username = 'hguv5320@hguv5320.odns.fr';
                                   $mail->Password = 'Champagne-77';   
                              
                              //   $path = 'reseller.pdf';
                              //   $mail->AddAttachment($path);
                              
                                   $mail->IsHTML(true);
                                   $mail->From="hguv5320@hguv5320.odns.fr";
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
                               $from = 'hguv5320@hguv5320.odns.fr';
                               $name = 'rémi';
                               $subj = 'Email de confirmation de compte';
                               $msg = 'http://localhost:80/Forum/signup.php?id='.$_SESSION['id']; ///// 
                               
                               $error=smtpmailer($to,$from, $name ,$subj, $msg);











                           
                        } 
                                        