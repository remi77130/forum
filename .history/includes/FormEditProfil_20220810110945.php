
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/FormEditProfil.css">
<body>
   


<section class="container_editprofil">

<div class="edit_profil_container">

<h2>Edition de mon profil</h2>

<div>



             <form method="POST" action="" enctype="multipart/form-data">
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
               </select> <br>

               

               <label>Taille</label> <br>

                  <select name="taille">

                  <option value=""></option>
                  <option value="Petit(e) est mignion(e) (enfin c'est ce qu'on dit) ">Petit(e) est mignion(e) (enfin c'est ce qu'on dit) </option>
                  <option value="Je suis dans la moyenne (j'ai pied dans la piscine)">Je suis dans la moyenne (j'ai pied dans la piscine)</option>
                  <option value="Ultra grand(e) (j'arrive à changer les ampoule sans monter sur la chaise)">Ultra grand(e) (j'arrive à changer les ampoule sans monter sur la chaise)</option>

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






<footer>

</footer>


</body>



</html>