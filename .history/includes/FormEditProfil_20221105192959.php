
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
                <input type="text" name="newpseudo" placeholder="Pseudo" maxlength="10" value="<?php echo $user['pseudo']; ?>" /><br /><br />
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

                  <option value="<?php echo $user['astrologie']; ?>" selected><?php echo $user['astrologie']; ?></option>
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
               <select name="choix">
               <option value="<?php echo $user['choix'];?>" selected><?php echo $user['choix']; ?></option>

               <option value="Du sérieux, mariage, gamins et tous l'bordel..."> ou sérieux</option> <!-- afficher-->
               <option value="Plan cul, j'ai pas l'temps">Plan cul, j'ai pas l'temps</option>

              


               </select>

            <label>Taille</label>
               <select name="taille">
               <option value="<?php echo $user['taille'];?>" selected><?php echo $user['taille']; ?></option>

               <option value="135">135 cm</option>
               <option value="136">136 cm</option>
               <option value="137">137 cm</option>
               <option value="138">138 cm</option>
               <option value="139">139 cm</option>
               <option value="140">140 cm</option>
               <option value="141">141 cm</option>
               <option value="142">142 cm</option>
               <option value="143">143 cm</option>
               <option value="144">144 cm</option>
               <option value="145">145 cm</option>
               <option value="146">146 cm</option>
               <option value="147">147 cm</option>
               <option value="148">148 cm</option>
               <option value="149">149 cm</option>
               <option value="150">150 cm</option>
               <option value="151">151 cm</option>
               <option value="152">152 cm</option>
               <option value="1.53">1.53 cm</option>
               <option value="154">154 cm</option>
               <option value="155">155 cm</option>
               <option value="156">156 cm</option>
               <option value="157">157 cm</option>
               <option value="158">158 cm</option>
               <option value="159">159 cm</option>
               <option value="160">160 cm</option>
               <option value="161">161 cm</option>
               <option value="162">162 cm</option>
               <option value="163">163 cm</option>
               <option value="164">164 cm</option>
               <option value="165">165 cm</option>
               <option value="166">166 cm</option>
               <option value="167">167 cm</option>
               <option value="168">168 cm</option>
               <option value="169">169 cm</option>
               <option value="170">170 cm</option>
               <option value="171">171 cm</option>
               <option value="172">172 cm</option>
               <option value="173">173 cm</option>
               <option value="174">174 cm</option>
               <option value="175">175 cm</option>
               <option value="176">176 cm</option>
               <option value="177">177 cm</option>
               <option value="178">178 cm</option>
               <option value="179">179 cm</option>
               <option value="180">180 cm</option>
               <option value="181">181 cm</option>
               <option value="182">182 cm</option>
               <option value="183">183 cm</option>
               <option value="184">184 cm</option>
               <option value="185">185 cm</option>
               <option value="186">186 cm</option>
               <option value="187">187 cm</option>
               <option value="188">188 cm</option>
               <option value="189">189 cm</option>
               <option value="190">190 cm</option>
               <option value="191">191 cm</option>
               <option value="192">192 cm</option>
               <option value="193">193 cm</option>
               <option value="194">194 cm</option>
               <option value="195">195 cm</option>
               <option value="196">196 cm</option>
               <option value="197">197 cm</option>
               <option value="198">198 cm</option>
               <option value="199">199 cm</option>
               <option value="200">200 cm</option>
               <option value="201">201 cm</option>
               <option value="202">202 cm</option>
               <option value="203">203 cm</option>
               <option value="204">204 cm</option>
               <option value="205">205 cm</option>
           

               </select>     
               
               




               <label>Ma description</label> <br> <br>
               <textarea class="textarea_edit_profil" name="description_profil" 
               cols="30" rows="5" maxlength="150"><?php echo $user['description_profil'];?></textarea> <br> <br>




                <input style="padding:20px; border:3px solid blue;" 
                type="submit" value="Mettre à jour mon profil !" />

                <input style="padding:20px; border:3px solid blue;" 
                type="button" value="Revenir en arrière"onclick="history.go(-1);" />
   

             </form>




             


             <?php if(isset($msg)) { echo $msg; } ?>
          </div>
       </div>








    </section>






<script>let $selects = document.querySelectorAll('.linked-select')
$selects.forEach(function ($select) {
  new LinkedSelect($select)
})</script>


<footer>

</footer>


</body>



</html>