<?php
include 'includes/head.php';
require('database.php');

if(isset($_POST['envoi_message'])){ // SI LES CHAMPS NE SONT PAS REMPLIS
if(isset($_POST['destinataire'],$_POST['message']) AND !empty($_POST['destinataire']) 
AND !empty($_POST['message'])){

}else{
    $error = "Veuillez complétez tous les champs! ";
}


}

?>

<!DOCTYPE html>
<html lang="en">

<body>

<form method="post">

<label>Destinataire : </label>

<input type="text">
<select name="destinataire">
<option>
Boucle
</option>

</select> <br> <br>

<textarea placeholder="Votre message" name="message"></textarea> <br><br>
<input type="submit" value="Envoyer" name="envoi_message"> <br><br>
<?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>


</form>
    
</body>
</html>