<?php
session_start(); //pour recup dans la bdd
require('database.php');

if(isset($_POST['envoie_message'])){   //si form est valider

if(isset($_POST['destinataire'],$_POST['message']) AND !empty($_POST['destinataire']) // si les post ne son pas rempli (!empty)
AND !empty($_POST['message'])){

   $destinataire = htmlspecialchars($_POST['destinataire']);
   $message = htmlspecialchars($_POST['message']);

   $id_destinataire = $bdd->prepare('SELECT id FROM users WHERE pseudo = ?');
   $id_destinataire->execute(array($destinataire));
   $id_destinataire = $id_destinataire->fetch();
   $id_destinataire = $id_destinataire['id'];

   $ins = $bdd->prepare('INSERT INTO chat(id_expediteur,id_destinataire,message) VALUES (?, ?, ?)');
   $ins->execute(array($_SESION['id'],$id_destinataire,$message));

   $error = "Message envoyé !";


}else
{
   $error = "Veuillez complétez tous les champs ! ";
}

}

$destinataires = $bdd->query('SELECT pseudo FROM users ORDER BY pseudo') //afficher tous les destinataires


?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>Envoi de message</title>
      <meta charset="utf-8" />
   </head>
   <body>
     



<form method="post">
   <label>Destinataire : </label>
   <select name="destinataire">
      <?php while($d = $destinataires->fetch())  { //  AFFICHER LES PSEUDO
      ?> <option><?= $d['pseudo'] ?></option> 

     <?php } ?>
   </select> <br><br>

   <textarea placeholder="Votre message" name="message"></textarea>
   <br><br>
   <input type="submit" value="Envoyer" name="envoi_message" />
   <br><br>
   <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>



</form>

         <br />
      <a href="reception.php">Boîte de réception</a>
   </body>



   
   </html>
