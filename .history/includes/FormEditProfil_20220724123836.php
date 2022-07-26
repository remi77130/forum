<section class="container_editprofil">
       <div class="edit_profil_container">
          <h2>Edition de mon profil</h2>
          <div>



             <form method="POST" enctype="multipart/form-data">
                <label>Pseudo :</label>
                <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /><br />
                <label>Age</label>
                <input type="text" name="newage" placeholder="age" value="<?php echo $user['age']; ?>" /><br /><br />
                <label>Mail :</label>
                <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
                
                <label>Mot de passe :</label>
                <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
                <label>Confirmation - mot de passe :</label>
                <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
               <br>
               <label>Avatar</label>
               <input type="file" name="avatar"> <br><br>

               <label>Astrologie</label>
               <select name="astrologie">
               <option value="nul"></option>
                  <option value="Bélier">Bélier</option>
                  <option value="Taureau">Taureau</option>
                  <option value="Gémeaux">Gémeaux </option>
                  <option value="Cancer">Cancer </option>
                  <option value="Lion">Lion</option>
                  <option value="Vierge">Vierge </option>
                  <option value="Balance">Balance </option>
                  <option value="Scorpion">Scorpion </option>
                  <option value="Sagittaire">Sagittaire </option>
                  <option value="Capricorne">Capricorne </option>
                  <option value="Verseau">Verseau</option>
                  <option value="Poissons">Poissons </option>
               </select> <br> <br>

               <label>Ici pour</label>
               <select  name="choix">
                  <option value="nul"></option>
                  <option value="Trouver l'amour">Trouver chaussure à mon pied</option>
                  <option value="Trouver de l'or">Trouver de l'or</option>
                  <option value="Qu'est-ce que ça peut te foutre ? !">Qu'est-ce que ça peut te foutre ? !</option>
                  <option value="Boire un verre">Boire un verre</option>
                  <option value="Boire plein de verres">Boire plein de verres</option>
                  <option value="Discuter">Discuter</option>
                  <option value="J'ai besoin de trouver un partenaire de confiance pour enterré quelque chose dans mon jardins">J'ai besoin de trouver un partenaire de confiance pour enterré quelque chose dans mon jardins</option>
               


               </select> <br>

               <label>Ajouter une description</label> <br> <br>
               <textarea class="textarea_edit_profil" name="description_profil" 
               cols="30" rows="5" > 
               <?php echo $user['description_profil']; ?>  </textarea> <br> <br>


               <form method="post" enctype="multipart/form-data">


                <input style="padding:20px; border:3px solid blue;" 
                type="submit" value="Mettre à jour mon profil !" />
   

             </form>




             


             <?php if(isset($msg)) { echo $msg; } ?>
          </div>
       </div>








    </section>


    