<h4 class="title-element">Récupération de mot de passe</h4>
Un code de vérification vous a été envoyé par mail:
<br/>
<form method="post">
   <input type="text" placeholder="Code de vérification" name="verif_code"/><br/>
   <input type="submit" value="Valider" name="verif_submit"/>
</form>
<?php if(isset($error)) {echo '<span style="color:red">'.$error.'</span>';}