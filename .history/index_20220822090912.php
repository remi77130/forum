<?php require 'signupAction.php';

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/index.css">
<link rel="stylesheet" href="assets/FormSignup.css">

<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W8Q7JX5');</script>
<!-- End Google Tag Manager -->


<TITLE>Chanderland, chat gratuit</TITLE>

<META NAME="SUBJECT" CONTENT="chanderland pour discuter en live , rencontres et discussion avec chanderland le meilleur tchat de france"/>
<META NAME="ABSTRACT" CONTENT="Chat gratuit chanderland">
<META NAME="KEYWORDS" CONTENT="chanderland, chat, chat gratuit, tchat, chanderland chat, tchat gratuit, chanderland"/>
<META NAME="DESCRIPTION" CONTENT="chanderland est le premier chat gratuit de France : tchater et voir des profils. 
le chat sans inscription pour discuter avec des milliers de connectés "/>

<META NAME="REVISIT-AFTER" CONTENT="2 DAYS"/>
<meta http-equiv="cache-Control" content="no-cache, must-revalidate"> 
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>
<style>@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8Q7JX5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



<div class="title_section_signup">
  <h2>Faite de nouvel <span> connaissance</span> <br> </h2>
</div>

<div style="text-align: center; padding-top:20px;">
  <img src="membres/betaversion.svg" alt="logo_beta_verson" style="width: 250px;">
  <br>
  <p style="font-size:12px;">Site en cours de développement</p>
</div>

<section class="section_signup">

  <div class="parent_form_signup">

  <div class="box">

    <form style="text-align: center;" method="POST" enctype="multipart/form-data">

    <div>
    <input type="text" name="pseudo" maxlength="10" minlength="3" placeholder="Pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
  </div>

  <div>
    <input type="number" name="age" placeholder="Age">
  </div>  
  
  <div>
    <select name="sexe">
    <option value="Homme">Homme</option>
    <option value="Femme">Femme</option>
    </select>
  </div>



<div class="dpt"> <!-- Select departement -->

<label  for="inputdepart">Département</label>

<select id="inputdepart" name="inputdepart" require>

<option value="">Selectionnez un département</option>

<?php
// BOUCLE DPT
while($row = $pdostmt->fetch(PDO::FETCH_ASSOC)):
  ?>

<option value="<?php echo $row["departement_code"]?>"><?php echo $row["departement_nom"]?></option>

</select>

</div>





<div> <!-- Selectionnez une ville-->

<label for="inuputville">Ville</label>
<select name="inuputville" id="inuputville" required>



</select>
</div>

  <div>
    <input type="email"  name="mail" placeholder="Mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
  </div>


  <div>
    <input type="password"  minlength="5" name="password" placeholder="Mot de passe">
  </div>

  
  <div>
    <input type="password"  minlength="5" name="password2" placeholder="Confirmation passe">
  </div>

 <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>


<div class="lien_compte_user"> 
  <a class="login_signup" href="connexion.php"><p>J'ai déjà un compte, <span class="span_login_signup"> je me connecte</span></p></a> <br>
</div>
      
   </form>

</div>
  
</div> <!--form_signup -->


<?php
if(isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
{
  echo '<font color="red">'.$erreur."</font>";
  
} 
?>

</section>




</body>
</html>