<?php
session_start(); //pour recup dans la bdd
require('database.php');

if(isset($_POST['envoie_message'])){   //si form est valider

}

?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>Envoi de message</title>
      <meta charset="utf-8" />
   </head>
   <body>
      <form method="POST">
         <label>Destinataire:</label>
   
         </select>
         <input type="text" name="destinataire" />
         <br /><br />

         <textarea placeholder="Votre message" name="message"></textarea>
         <br /><br />

         <input type="submit" value="Envoyer" name="envoi_message" />
         <br /><br />

         <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
      </form>
      <br />
      <a href="reception.php">Boîte de réception</a>
   </body>



   
   </html>
