
<!DOCTYPE html>
<html lang="en">
<head>

   <title>Formulaire d'édition du profil</title>
<?php include 'includes/head.php' ?>
<body>
   


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
               <option value="<?php echo $user['choix'];?>"selected><?php echo $user['choix']; ?></option>
               <option value="Relation sérieuse">Relation sérieuse</option>
               <option value="On verra bien">On verra bien</option>
               <option value="Plan cul">Plan cul</option>
               <option value="t'es de la police ?">T'es de la police ?</option>
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
               
               
               <label>Poids</label>
               <select name="poids">
               <option value="45">45 kg</option>
               <option value="46">46 kg</option>
               <option value="47">47 kg</option>
               <option value="48">48 kg</option>
               <option value="49">49 kg</option>
               <option value="50">50 kg</option>
               <option value="51">51 kg</option>
               <option value="52">52 kg</option>
               <option value="53">53 kg</option>
               <option value="54">54 kg</option>
               <option value="55">55 kg</option>
               <option value="56">56 kg</option>
               <option value="57">57 kg</option>
               <option value="58">58 kg</option>
               <option value="59">59 kg</option>
               <option value="60">60 kg</option>
               <option value="61">61 kg</option>
               <option value="62">62 kg</option>
               <option value="63">63 kg</option>
               <option value="64">64 kg</option>
               <option value="65">65 kg</option>
               <option value="66">66 kg</option>
               <option value="67">67 kg</option>
               <option value="68">68 kg</option>
               <option value="69">69 kg</option>
               <option value="70">70 kg</option>
               <option value="71">71 kg</option>
               <option value="72">72 kg</option>
               <option value="73">73 kg</option>
               <option value="74">74 kg</option>
               <option value="75">75 kg</option>
               <option value="76">76 kg</option>
               <option value="77">77 kg</option>
               <option value="78">78 kg</option>
               <option value="79">79 kg</option>
               <option value="80">80 kg</option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>

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