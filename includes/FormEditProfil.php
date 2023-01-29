<!DOCTYPE html>
<html lang="fr">
<head>
<title>Formulaire d'édition du profil</title>
<link rel="stylesheet" href="assets/FormEditProfil.css">

<body>
   


<header>
<h1>
   Edition de mon profil
</h1></header>


<section class="container_editprofil">





             <form method="POST" action="" enctype="multipart/form-data">
                <label>Pseudo</label>
                <input type="text" name="newpseudo" placeholder="Pseudo" maxlength="10"
                value="<?php echo $user['pseudo']; ?>" /><br /><br />
                <label>Age</label>
                <input type="tel" pattern="[0-9]*" inputtype="numeric" name="newage" placeholder="age" minlength="1" maxlength="2" value="<?php echo $user['age']; ?>" /><br /><br />
                <!--<label>Mail :</label>
                <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
-->
                <label>Mot de passe :</label>
                <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
                <label>Confirmation - mot de passe :</label>
                <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
               <br>
               <label>Avatar</label>
               <input type="file" name="avatar"> <br><br> <br>

               <label>Astrologie</label> <br>
               <select name="astrologie">

                  <option value="<?php echo $user['astrologie']; ?>" 
                  selected><?php echo $user['astrologie']; ?></option>
                  <option value="Astrologie: Bélier">Bélier</option>
                  <option value="Astrologie: Taureau">Taureau</option>
                  <option value="Astrologie: Gémeaux">Gémeaux </option>
                  <option value="Astrologie: Cancer">Cancer </option>
                  <option value="Astrologie: Lion">Lion</option>
                  <option value="Astrologie: Vierge">Vierge </option>
                  <option value="Astrologie: Balance">Balance </option>
                  <option value="Astrologie: Scorpion">Scorpion </option>
                  <option value="Astrologie: Sagittaire">Sagittaire </option>
                  <option value="Astrologie: Capricorne">Capricorne </option>
                  <option value="Astrologie: Verseau">Verseau</option>
                  <option value="Astrologie: Poisson">Poissons </option>
                  <option value="Astrologie: Dragon">Dragon </option>

               </select> <br> <br>

               <label>Ici pour</label> <br>

               <select name="choix">
               <option value="<?php echo $user['choix'];?>"selected><?php echo $user['choix']; ?></option>
               <option value="Ici pour: Relation sérieuse">Relation sérieuse</option>
               <option value="Ici pour: On verra bien">On verra bien</option>
               <option value="Ici pour: Non sérieux">Non sérieux</option>
               </select> <br> <br>


               <!-- Sexuality -->

               <label>Ma sexualite</label> <br>

               <select name="sexualite">
               <option value="<?php echo $user['sexualite'];?>"selected><?php echo $user['sexualite']; ?></option>
               <option value="Sexualité: Hétéro">Hétéro</option>
               <option value="Sexualité: Gay">Gay</option>
               <option value="Sexualité: Lesbienne">Lesbienne</option>
               <option value="Sexualité: Bisexuelle">Bisexuelle</option>
               <option value="Sexualité: Trans">Trans</option>
               <option value="Sexualité: Queers">Queers</option>
               <option value="Sexualité: Extratereste">J'aime tout le monde</option>
               </select> <br> <br>



               <!-- Nationnalité -->

               <label>Nationalité</label> <br>
               <select name="nationality">

               <option value="Nationalité: Albanian">Albanian</option>
               <option value="Nationalité: American">American</option>
               <option value="Nationalité: Argentinian">Argentinian</option>
               <option value="Nationalité: Armenian">Armenian</option>
               <option value="Nationalité: Australian">Australian</option>
               <option value="Nationalité: Austrian">Austrian</option>
               <option value="Nationalité: Belarussian">Belarussian</option>
               <option value="Nationalité: Belgian">Belgian</option>
               <option value="Nationalité: Brazilian">Brazilian</option>
               <option value="Nationalité: British">British</option>
               <option value="Nationalité: Bulgarian">Bulgarian</option>
               <option value="Nationalité: Canadian">Canadian</option>
               <option value="Nationalité: Chinese">Chinese</option>
               <option value="Nationalité: Colombian">Colombian</option>
               <option value="Nationalité: Croatian">Croatian</option>
               <option value="Nationalité: Cuban">Cuban</option>
               <option value="Nationalité: Czech">Czech</option>
               <option value="Nationalité: Danish">Danish</option>
               <option value="Nationalité: Dutch">Dutch</option>
               <option value="Nationalité: Estonian">Estonian</option>
               <option value="Nationalité: Filipino">Filipino</option>
               <option value="Nationalité: Finnish">Finnish</option>
               <option value="Nationalité: French">French</option>
               <option value="Nationalité: German">German</option>
               <option value="Nationalité: Greek">Greek</option>
               <option value="Nationalité: Hungarian">Hungarian</option>
               <option value="Nationalité: Indian">Indian</option>
               <option value="Nationalité: Irish">Irish</option>
               <option value="Nationalité: Israeli">Israeli</option>
               <option value="Nationalité: Italian">Italian</option>
               <option value="Nationalité: Jamaican">Jamaican</option>
               <option value="Nationalité: Japanese">Japanese</option>
               <option value="Nationalité: Korean">Korean</option>
               <option value="Nationalité: Latvian">Latvian</option>
               <option value="Nationalité: Lithuanian">Lithuanian</option>
               <option value="Nationalité: Malaysian">Malaysian</option>
               <option value="Nationalité: Mexican">Mexican</option>
               <option value="Nationalité: Moldovian">Moldovian</option>
               <option value="Nationalité: Montenegrian">Montenegrian</option>
               <option value="Nationalité: Norwegian">Norwegian</option>
               <option value="Nationalité: Polish">Polish</option>
               <option value="Nationalité: Portuguese">Portuguese</option>
               <option value="Nationalité: Puerto Rican">Puerto Rican</option>
               <option value="Nationalité: Romanian">Romanian</option>
               <option value="Nationalité: Russian">Russian</option>
               <option value="Nationalité: Serbian">Serbian</option>
               <option value="Nationalité: Singaporean">Singaporean</option>
               <option value="Nationalité: Slovak">Slovak</option>
               <option value="Nationalité: Slovenian">Slovenian</option>
               <option value="Nationalité: Spanish">Spanish</option>
               <option value="Nationalité: Swedish">Swedish</option>
               <option value="Nationalité: Swiss">Swiss</option>
               <option value="Nationalité: Thai">Thai</option>
               <option value="Nationalité: Ukrainian">Ukrainian</option>
               <option value="Nationalité: Venezuelan">Venezuelan</option>
               <option value="Nationalité: Vietnamese">Vietnamese</option>
         </select> <br> <br>  






            <label>Taille</label> <br>
               <select name="taille">
               <option value="<?php echo $user['taille'];?>" selected>
               <?php echo $user['taille']; ?></option>

               <option value="Taille: Nain">Nain</option>
               <option value="Taille: 136 Cm">136 cm</option>
               <option value="Taille: 137 Cm">137 cm</option>
               <option value="Taille: 138 Cm">138 cm</option>
               <option value="Taille: 139 Cm">139 cm</option>
               <option value="Taille: 140 Cm">140 cm</option>
               <option value="Taille: 141 Cm">141 cm</option>
               <option value="Taille: 142 Cm">142 cm</option>
               <option value="Taille: 143 Cm">143 cm</option>
               <option value="Taille: 144 Cm">144 cm</option>
               <option value="Taille: 145 Cm">145 cm</option>
               <option value="Taille: 146 Cm">146 cm</option>
               <option value="Taille: 147 Cm">147 cm</option>
               <option value="Taille: 148 Cm">148 cm</option>
               <option value="Taille: 149 Cm">149 cm</option>
               <option value="Taille: 150 Cm">150 cm</option>
               <option value="Taille: 151 Cm">151 cm</option>
               <option value="Taille: 152 Cm">152 cm</option>
               <option value="Taille: 153 Cm">153 cm</option>
               <option value="Taille: 154 Cm">154 cm</option>
               <option value="Taille: 155 Cm">155 cm</option>
               <option value="Taille: 156 Cm">156 cm</option>
               <option value="Taille: 157 Cm">157 cm</option>
               <option value="Taille: 158 Cm">158 cm</option>
               <option value="Taille: 159 Cm">159 cm</option>
               <option value="Taille: 160 Cm">160 cm</option>
               <option value="Taille: 161 Cm">161 cm</option>
               <option value="Taille: 162 Cm">162 cm</option>
               <option value="Taille: 163 Cm">163 cm</option>
               <option value="Taille: 164 Cm">164 cm</option>
               <option value="Taille: 165 Cm">165 cm</option>
               <option value="Taille: 166 Cm">166 cm</option>
               <option value="Taille: 167 Cm">167 cm</option>
               <option value="Taille: 168 Cm">168 cm</option>
               <option value="Taille: 169 Cm">169 cm</option>
               <option value="Taille: 170 Cm">170 cm</option>
               <option value="Taille: 171 Cm">171 cm</option>
               <option value="Taille: 172 Cm">172 cm</option>
               <option value="Taille: 173 Cm">173 cm</option>
               <option value="Taille: 174 Cm">174 cm</option>
               <option value="Taille: 175 Cm">175 cm</option>
               <option value="Taille: 176 Cm">176 cm</option>
               <option value="Taille: 177 Cm">177 cm</option>
               <option value="Taille: 178 Cm">178 cm</option>
               <option value="Taille: 179 Cm">179 cm</option>
               <option value="Taille: 180 Cm">180 cm</option>
               <option value="Taille: 181 Cm">181 cm</option>
               <option value="Taille: 182 Cm">182 cm</option>
               <option value="Taille: 183 Cm">183 cm</option>
               <option value="Taille: 184 Cm">184 cm</option>
               <option value="Taille: 185 Cm">185 cm</option>
               <option value="Taille: 186 Cm">186 cm</option>
               <option value="Taille: 187 Cm">187 cm</option>
               <option value="Taille: 188 Cm">188 cm</option>
               <option value="Taille: 189 Cm">189 cm</option>
               <option value="Taille: 190 Cm">190 cm</option>
               <option value="Taille: 191 Cm">191 cm</option>
               <option value="Taille: 192 Cm">192 cm</option>
               <option value="Taille: 193 Cm">193 cm</option>
               <option value="Taille: 194 Cm">194 cm</option>
               <option value="Taille: 195 Cm">195 cm</option>
               <option value="Taille: 196 Cm">196 cm</option>
               <option value="Taille: 197 Cm">197 cm</option>
               <option value="Taille: 198 Cm">198 cm</option>
               <option value="Taille: 199 Cm">199 cm</option>
               <option value="Taille: 200 Cm">200 cm</option>
               <option value="Taille: 201 Cm">201 cm</option>
               <option value="Taille: 202 Cm">202 cm</option>
               <option value="Taille: 203 Cm">203 cm</option>
               <option value="Taille: 204 Cm">204 cm</option>
               <option value="Taille: 205 Cm">205 cm</option>
               <option value="Taille: Geant">Geant</option>
           

               </select>     <br> <br>
               
               
               <label>Poids</label> <br>

               <select name="poids">
               <option value="<?php echo $user['poids']; ?>"selected>
               <?php echo $user['poids'] ;  ?> </option>


               <option value=" Poids: 45 kg">45</option>
               <option value=" Poids: 46 Kg">46 kg</option>
               <option value=" Poids: 47 Kg">47 kg</option>
               <option value=" Poids: 48 Kg">48 kg</option>
               <option value=" Poids: 49 Kg">49 kg</option>
               <option value=" Poids: 50 Kg">50 kg</option>
               <option value=" Poids: 51 Kg">51 kg</option>
               <option value=" Poids: 52 Kg">52 kg</option>
               <option value=" Poids: 53 Kg">53 kg</option>
               <option value=" Poids: 54 Kg">54 kg</option>
               <option value=" Poids: 55 Kg">55 kg</option>
               <option value=" Poids: 56 Kg">56 kg</option>
               <option value=" Poids: 57 Kg">57 kg</option>
               <option value=" Poids: 58 Kg">58 kg</option>
               <option value=" Poids: 59 Kg">59 kg</option>
               <option value=" Poids: 60 Kg">60 kg</option>
               <option value=" Poids: 61 Kg">61 kg</option>
               <option value=" Poids: 62 Kg">62 kg</option>
               <option value=" Poids: 63 Kg">63 kg</option>
               <option value=" Poids: 64 Kg">64 kg</option>
               <option value=" Poids: 65 Kg">65 kg</option>
               <option value=" Poids: 66 Kg">66 kg</option>
               <option value=" Poids: 67 Kg">67 kg</option>
               <option value=" Poids: 68 Kg">68 kg</option>
               <option value=" Poids: 69 Kg">69 kg</option>
               <option value=" Poids: 70 Kg">70 kg</option>
               <option value=" Poids: 71 Kg">71 kg</option>
               <option value=" Poids: 72 Kg">72 kg</option>
               <option value=" Poids: 73 Kg">73 kg</option>
               <option value=" Poids: 74 Kg">74 kg</option>
               <option value=" Poids: 75 Kg">75 kg</option>
               <option value=" Poids: 76 Kg">76 kg</option>
               <option value=" Poids: 77 Kg">77 kg</option>
               <option value=" Poids: 78 Kg">78 kg</option>
               <option value=" Poids: 79 Kg">79 kg</option>
               <option value=" Poids: 80 Kg">80 kg</option>
               <option value=" Poids: 81 Kg">81 kg</option>
               <option value=" Poids: 82 Kg">82 kg</option>
               <option value=" Poids: 83 Kg">83 kg</option>
               <option value=" Poids: 84 Kg">84 kg</option>
               <option value=" Poids: 85 Kg">85 kg</option>
               <option value=" Poids: 86 Kg">86 kg</option>
               <option value=" Poids: 87 Kg">87 kg</option>
               <option value=" Poids: 88 Kg">88 kg</option>
               <option value=" Poids: 89 Kg">89 kg</option>
               <option value=" Poids: 90 Kg">90 kg</option>
               <option value=" Poids: 91 Kg">91 kg</option>
               <option value=" Poids: 92 Kg">92 kg</option>
               <option value=" Poids: 93 Kg">93 kg</option>
               <option value=" Poids: 94 Kg">94 kg</option>
               <option value=" Poids: 95 Kg">95 kg</option>
               <option value=" Poids: 96 Kg">96 kg</option>
               <option value=" Poids: 97 Kg">97 kg</option>
               <option value=" Poids: 98 Kg">98 kg</option>
               <option value=" Poids: 99 Kg">99 kg</option>
               <option value=" Poids: 100 Kg">100 kg</option>
               <option value=" Poids: 101 Kg">101 kg</option>
               <option value=" Poids: 102 Kg">102 kg</option>
               <option value=" Poids: 103 Kg">103 kg</option>
               <option value=" Poids: 104 Kg">104 kg</option>
               <option value=" Poids: 105 Kg">105 kg</option>
               <option value=" Poids: 106 Kg">106 kg</option>
               <option value=" Poids: 107 Kg">107 kg</option>
               <option value=" Poids: 108 Kg">108 kg</option>
               <option value=" Poids: 109 Kg">109 kg</option>
               <option value=" Poids: 110 Kg">110 kg</option>
               <option value=" Poids: 111 Kg">111 kg</option>
               <option value=" Poids: 112 Kg">112 kg</option>
               <option value=" Poids: 113 Kg">113 kg</option>
               <option value=" Poids: 114 Kg">114 kg</option>
               <option value=" Poids: 115">115 kg</option>
               <option value=" Poids: 116">116 kg</option>
               <option value=" Poids: 117">117 kg</option>
               <option value=" Poids: 118">118 kg</option>
               <option value=" Poids: 119">119 kg</option>
               <option value=" Poids: 120">120 kg</option>
               <option value=" Poids: 121">121 kg</option>
               <option value=" Poids: 122 Kg">122 kg</option>
               <option value=" Poids: 123 Kg">123 kg</option>
               <option value=" Poids: 124 Kg">124 kg</option>
               <option value=" Poids: 125 Kg">125 kg</option>
               <option value=" Poids: 126 Kg">126 kg</option>
               <option value=" Poids: 127 Kg">127 kg</option>
               <option value=" Poids: 128 Kg">128 kg</option>
               <option value=" Poids: 129 Kg">129 kg</option>
               <option value=" Poids: 130 Kg">130 kg</option>

               

               </select> <br> <br>

               <label>Cheveux</label> <br>
              <select name="cheveux_color">
               <option  value="<?php echo $user['cheveux_color']; ?>"selected>
               <?php echo $user['cheveux_color'] ;  ?> </option>>

               <option value="Cheveux: Blond">Blond</option>
               <option value="Cheveux: Chatain clair">Châtain clair</option>
               <option value="Cheveux: Chatain fonce">Châtain foncé</option>
               <option value="Cheveux: Crun">Brun</option>
               <option value="Cheveux: Roux">Roux</option>
               <option value="Cheveux: Raser">Raser</option>
                </select> <br> <br>

            <label>Situation </label> <br>
            <select name="situation">
            <option value="<?php echo $user['situation']; ?>"selected>
            <?php echo $user['situation'] ;  ?> </option>
            <option value="Situation: Couple">En couple</option>
            <option value="Situation: Célibataire">Celibataire</option>
            <option value="Situation: Compliqué">C'est compliqué</option>

            </select> <br> <br>





               <label>Ma description</label> <br> <br>
               <textarea class="textarea_edit_profil" name="description_profil" 
               cols="30" rows="5" minlength="10" maxlength="150"><?php echo $user['description_profil'];?></textarea> <br> <br>


               <button class="safe" 
                type="submit" value="Enregistrer">Enregistrer</button>
                <br>
               
               <button class="return"
                type="button" value="Retour"onclick="history.go(-1);">
               Retour
               </button>
             

          


             


   

             </form>



             <?php if(isset($msg)) { echo $msg; } ?>








    </section>






<script>let $selects = document.querySelectorAll('.linked-select')
$selects.forEach(function ($select) {
  new LinkedSelect($select)
})</script>


<footer>

</footer>


</body>



</html>