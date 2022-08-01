
<h4 class="title-element">Récupération de mot de passe</h4>
<br/>
<?php 
if($section == 'code') { ?>
	<form method="post">
   <input type="password" placeholder="Nouveau mot de passe" name="change_mdp"/><br/>
   <input type="password" placeholder="Confirmation du mot de passe" name="change_mdpc"/><br/>
   <input type="submit" value="Valider" name="change_submit"/>
</form>
<?php } else { ?>
<form method="post">
   <input type="email" placeholder="Votre adresse mail" name="recup_mail"/><br/>
   <input type="submit" value="Valider" name="recup_submit"/>
</form>
<?php } ?>

<?php if(isset($error)) {echo '<span style="color:red">'.$error.'</span>';} else { echo "<br />";}?>