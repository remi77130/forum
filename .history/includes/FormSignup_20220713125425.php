




<section class="section_signup">
<form method="POST" action="">
            <table>
               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail">Mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2">Confirmation du mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" />
                  </td>
               </tr>
            </table>
         </form>
    </select>
  </div>




  <div class="mb-3">
    <label >Mail</label> <br>
    <input type="email"  name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
  </div>


  <div class="mb-3">
    <label for="pasword">Mot de passe</label> <br>
    <input type="password"  minlength="5" name="password">
  </div>

  
  <div class="mb-3">
    <label for="password2">Comfirmation mot passe</label> <br>
    <input type="password"  minlength="5" name="password2">
  </div>

 
  <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>

  <br><br>
 <a class="login_signup" href="connexion.php"><p>J'ai déjà un compte, <span class="span_login_signup"> je me connecte</span></p></a> <br>

      
   </form>
   <?php
if(isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
{
  echo '<font color="red">'.$erreur."</font>";
  
} 
?>
</div> <!--form_signup -->




</section>
