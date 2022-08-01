
<h4 class="title-element">Récupération de mot de passe</h4>
<br/>
<?php 
if($section == 'code') { ?>

Récupération du mot passe pour <br> <b><?= $_SESSION['recup_mail']?><b> <br><br>
<form method="post">
   <input type="number" placeholder="Code de vérification" name="verif_code"/><br/>
   <input type="submit" value="Valider" name="verif_submit"/>
</form>

<?php } else {?>

<form method="post">
   <input type="email" placeholder="Votre adresse mail" name="recup_mail"/><br/>
   <input type="submit" value="Valider" name="recup_submit"/>
</form>

<?php } ?>

<?php if(isset($error)) {echo '<span style="color:red">'.$error.'</span>';} else { echo "<br />";}?>