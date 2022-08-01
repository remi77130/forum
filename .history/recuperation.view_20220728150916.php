<h4 class="title-element">Récupération de mot de passe</h4>
<br/>
<form method="post">

   <input type="mail" placeholder="Votre adresse mail" name="recup_mail"/><br/>
   <input type="submit" value="Valider" name="recup_submit"/>
</form>
<?php if(isset($error)) {echo '<span style="color:red">'.$error.'</span>';} else { echo "<br />";}?>