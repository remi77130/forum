<?php

include 'includes/head.php';
require('database.php');


if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
   if(isset($_POST['envoi_message'])) {
      if(isset($_POST['destinataire'],$_POST['message']) AND !empty($_POST['destinataire']) AND !empty($_POST['message'])) {
         $destinataire = htmlspecialchars($_POST['destinataire']);
         $message = htmlspecialchars($_POST['message']);

       
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
         <!-- <select name="destinataire">
            <?php while($d = $destinataires->fetch()) { ?>
            <option><?= $d['pseudo'] ?></option>
            <?php } ?>
         </select> -->
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
<?php
}
?>
