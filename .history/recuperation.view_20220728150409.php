<h4 class="title-element">Récupération de mot de passe</h4>
Un code de vérification vous a été envoyé par mail:
<br/>
<form method="post">
   <input type="email" placeholder="Votre adresse mail" name="recup_mail"/><br/>
   <input type="submit" value="Valider" name="submit_co"/>
</form>
<?php if(isset($error)) {echo '<span style="color:red">'.$error.'</span>';} else { echo "<br />";}?>