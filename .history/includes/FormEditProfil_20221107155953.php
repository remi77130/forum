
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
               <option value="Ici pour une relation sérieuse">Relation sérieuse</option>
               <option value="Ici pour on verra bien">On verra bien</option>
               <option value="Ici pour du non sérieux">non sérieux</option>
               </select> <br> <br>




            <label>Taille</label>
               <select name="taille">
               <option value="<?php echo $user['taille'];?>" selected>
               <?php echo $user['taille']; ?></option>

               <option value="135 cm">135 cm</option>
               <option value="136 cm">136 cm</option>
               <option value="137 cm">137 cm</option>
               <option value="138 cm">138 cm</option>
               <option value="139 cm">139 cm</option>
               <option value="140 cm">140 cm</option>
               <option value="141 cm">141 cm</option>
               <option value="142 cm">142 cm</option>
               <option value="143 cm">143 cm</option>
               <option value="144 cm">144 cm</option>
               <option value="145 cm">145 cm</option>
               <option value="146 cm">146 cm</option>
               <option value="147 cm">147 cm</option>
               <option value="148 cm">148 cm</option>
               <option value="149 cm">149 cm</option>
               <option value="150 cm">150 cm</option>
               <option value="151 cm">151 cm</option>
               <option value="152 cm">152 cm</option>
               <option value="153 cm">153 cm</option>
               <option value="154 cm">154 cm</option>
               <option value="155 cm">155 cm</option>
               <option value="156 cm">156 cm</option>
               <option value="157 cm">157 cm</option>
               <option value="158 cm">158 cm</option>
               <option value="159 cm">159 cm</option>
               <option value="160 cm">160 cm</option>
               <option value="161 cm">161 cm</option>
               <option value="162 cm">162 cm</option>
               <option value="163 cm">163 cm</option>
               <option value="164 cm">164 cm</option>
               <option value="165 cm">165 cm</option>
               <option value="166 cm">166 cm</option>
               <option value="167 cm">167 cm</option>
               <option value="168 cm">168 cm</option>
               <option value="169 cm">169 cm</option>
               <option value="170 cm">170 cm</option>
               <option value="171 cm">171 cm</option>
               <option value="172 cm">172 cm</option>
               <option value="173 cm">173 cm</option>
               <option value="174 cm">174 cm</option>
               <option value="175 cm">175 cm</option>
               <option value="176 cm">176 cm</option>
               <option value="177 cm">177 cm</option>
               <option value="178 cm">178 cm</option>
               <option value="179 cm">179 cm</option>
               <option value="180 cm">180 cm</option>
               <option value="181 cm">181 cm</option>
               <option value="182 cm">182 cm</option>
               <option value="183 cm">183 cm</option>
               <option value="184 cm">184 cm</option>
               <option value="185 cm">185 cm</option>
               <option value="186 cm">186 cm</option>
               <option value="187 cm">187 cm</option>
               <option value="188 cm">188 cm</option>
               <option value="189 cm">189 cm</option>
               <option value="190 cm">190 cm</option>
               <option value="191 cm">191 cm</option>
               <option value="192 cm">192 cm</option>
               <option value="193 cm">193 cm</option>
               <option value="194 cm">194 cm</option>
               <option value="195 cm">195 cm</option>
               <option value="196 cm">196 cm</option>
               <option value="197 cm">197 cm</option>
               <option value="198 cm">198 cm</option>
               <option value="199 cm">199 cm</option>
               <option value="200 cm">200 cm</option>
               <option value="201 cm">201 cm</option>
               <option value="202 cm">202 cm</option>
               <option value="203 cm">203 cm</option>
               <option value="204 cm">204 cm</option>
               <option value="205 cm">205 cm</option>
           

               </select>     <br> <br>
               
               
               <label>Poids</label>

               <select name="poids">
               <option value="<?php echo $user['poids']; ?>"selected>
               <?php echo $user['poids'] ;  ?> </option>


               <option value="pour 45 kg">45 kg</option>
               <option value="pour 46 kg">46 kg</option>
               <option value="pour 47 kg">47 kg</option>
               <option value="pour 48 kg">48 kg</option>
               <option value="pour 49 kg">49 kg</option>
               <option value="pour 50 kg">50 kg</option>
               <option value="pour 51 kg">51 kg</option>
               <option value="pour 52 kg">52 kg</option>
               <option value="pour 53 kg">53 kg</option>
               <option value="pour 54 kg">54 kg</option>
               <option value="pour 55 kg">55 kg</option>
               <option value="pour 56 kg">56 kg</option>
               <option value="pour 57 kg">57 kg</option>
               <option value="pour 58 kg">58 kg</option>
               <option value="pour 59 kg">59 kg</option>
               <option value="pour 60 kg">60 kg</option>
               <option value="pour 61 kg">61 kg</option>
               <option value="pour 62 kg">62 kg</option>
               <option value="pour 63 kg">63 kg</option>
               <option value="pour 64 kg">64 kg</option>
               <option value="pour 65 kg">65 kg</option>
               <option value="pour 66 kg">66 kg</option>
               <option value="pour 67 kg">67 kg</option>
               <option value="pour 68 kg">68 kg</option>
               <option value="pour 69 kg">69 kg</option>
               <option value="pour 70 kg">70 kg</option>
               <option value="pour 71 kg">71 kg</option>
               <option value="pour 72 kg">72 kg</option>
               <option value="pour 73 kg">73 kg</option>
               <option value="pour 74 kg">74 kg</option>
               <option value="pour 75 kg">75 kg</option>
               <option value="pour 76 kg">76 kg</option>
               <option value="pour 77 kg">77 kg</option>
               <option value="pour 78 kg">78 kg</option>
               <option value="pour 79 kg">79 kg</option>
               <option value="pour 80 kg">80 kg</option>
               <option value="pour 81 kg">81 kg</option>
               <option value="pour 82 kg">82 kg</option>
               <option value="pour 83 kg">83 kg</option>
               <option value="pour 84 kg">84 kg</option>
               <option value="pour 85 kg">85 kg</option>
               <option value="pour 86 kg">86 kg</option>
               <option value="pour 87 kg">87 kg</option>
               <option value="pour 88 kg">88 kg</option>
               <option value="pour 89 kg">89 kg</option>
               <option value="pour 90 kg">90 kg</option>
               <option value="pour 91 kg">91 kg</option>
               <option value="pour 92 kg">92 kg</option>
               <option value="pour 93 kg">93 kg</option>
               <option value="pour 94 kg">94 kg</option>
               <option value="pour 95 kg">95 kg</option>
               <option value="pour 96 kg">96 kg</option>
               <option value="pour 97 kg">97 kg</option>
               <option value="pour 98 kg">98 kg</option>
               <option value="pour 99 kg">99 kg</option>
               <option value="pour 100 kg">100 kg</option>
               <option value="pour 101 kg">101 kg</option>
               <option value="pour 102 kg">102 kg</option>
               <option value="pour 103 kg">103 kg</option>
               <option value="pour 104 kg">104 kg</option>
               <option value="pour 105 kg">105 kg</option>
               <option value="pour 106 kg">106 kg</option>
               <option value="pour 107 kg">107 kg</option>
               <option value="pour 108 kg">108 kg</option>
               <option value="pour 109 kg">109 kg</option>
               <option value="pour 110 kg">110 kg</option>
               <option value="pour 111 kg">111 kg</option>
               <option value="pour 112 kg">112 kg</option>
               <option value="pour 113 kg">113 kg</option>
               <option value="pour 114 kg">114 kg</option>
               <option value="pour 115 kg">115 kg</option>
               <option value="pour 116 kg">116 kg</option>
               <option value="pour 117 kg">117 kg</option>
               <option value="pour 118 kg">118 kg</option>
               <option value="pour 119 kg">119 kg</option>
               <option value="pour 120 kg">120 kg</option>
               <option value="pour 121 kg">121 kg</option>
               <option value="pour 122 kg">122 kg</option>
               <option value="pour 123 kg">123 kg</option>
               <option value="pour 124 kg">124 kg</option>
               <option value="pour 125 kg">125 kg</option>
               <option value="pour 126 kg">126 kg</option>
               <option value="pour 127 kg">127 kg</option>
               <option value="pour 128 kg">128 kg</option>
               <option value="pour 129 kg">129 kg</option>
               <option value="pour 130 kg">130 kg</option>

               

               </select> <br> <br>



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