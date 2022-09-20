
<h4 class="title-element">Récupération de mot de passe</h4>
<br/>
<?php 
if($section == 'code') { ?>
<?php
?>
Un code de récuperation vous à été envoyer par mail :<?= $_SESSION['recup_mail']?><b> <br><br>
<form method="post">
   <input type="tel" placeholder="Code de vérification" name="verif_code"/><br/>
   <input type="submit" value="Valider" name="verif_submit"/>
</form>

<!-- FORMULAIRE MODIFICATION MOT DE PASSE !-->

<?php } elseif ($section == "changemdp") {?>
   Nouveau mot de passe pour <br> <b><?= $_SESSION['recup_mail']?><b> <br><br>

   <form method="post">
   <input type="password" placeholder="Nouveau mot de passe" name="change_mdp"/><br/>
   <input type="password" placeholder="Confirmation du mot de passe" name="change_mdpc"/><br/>
   <input type="submit" value="Valider" name="change_submit"/>
</form>

<?php } else {?>

<form method="post" action="">
   <input type="email" placeholder="Votre adresse mail" name="recup_mail"/><br/>
   <input type="submit" value="Valider" name="recup_submit"/>
</form>

<?php } ?>

<?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else { echo ""; } ?>
