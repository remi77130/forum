<h1>
   Edition de mon profil
</h1>


<section class="container_editprofil">





   <form method="POST" action="" enctype="multipart/form-data">
      <label>Pseudo</label>
      <input type="text" name="newpseudo" placeholder="Pseudo" maxlength="10" value="<?php echo $user['pseudo']; ?>" /><br /><br />
      <label>Age</label>
      <input type="tel" pattern="[0-9]*" inputtype="numeric" name="newage" placeholder="age" minlength="1" maxlength="2" value="<?php echo $user['age']; ?>" /><br /><br />
      <!--<label>Mail :</label>
                <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
-->
      <label>Mot de passe :</label>
      <input type="password" name="newmdp1" placeholder="Mot de passe" /><br /><br />
      <label>Confirmation - mot de passe :</label>
      <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
      <br>
      <label>Avatar</label>
      <input type="file" name="avatar"> <br><br> <br>

      <label>Astrologie</label> <br>
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
         <option value="Poisson">Poissons </option>
         <option value="Dragon">Dragon </option>

      </select> <br> <br>

      <label>Ici pour</label> <br>

      <select name="choix">
         <option value="<?php echo $user['choix']; ?>" selected><?php echo $user['choix']; ?></option>
         <option value="Ici pour: Relation sérieuse">Relation sérieuse</option>
         <option value="Ici pour: On verra bien">On verra bien</option>
         <option value="Ici pour: Non sérieux">Non sérieux</option>
      </select> <br> <br>


      <!-- Sexuality -->

      <label>Ma sexualite</label> <br>

      <select name="sexualite">
         <option value="<?php echo $user['sexualite']; ?>" selected><?php echo $user['sexualite']; ?></option>
         <option value="Hétéro">Hétéro</option>
         <option value="Gay">Gay</option>
         <option value="Lesbienne">Lesbienne</option>
         <option value="Bisexuelle">Bisexuelle</option>
         <option value="Trans">Trans</option>
         <option value="Queers">Queers</option>
         <option value="Extratereste">J'aime tout le monde</option>
      </select> <br> <br>



      <!-- Nationnalité -->

      <label>Nationalité</label> <br>
      <select name="nationality">

         <option value="<?php echo $user['nationality']; ?>" selected><?php echo $user['nationality']; ?></option>
         <option value="Albanian">Albanian</option>
         <option value="American">American</option>
         <option value="Argentinian">Argentinian</option>
         <option value="Armenian">Armenian</option>
         <option value="Australian">Australian</option>
         <option value="Austrian">Austrian</option>
         <option value="Belarussian">Belarussian</option>
         <option value="Belgian">Belgian</option>
         <option value="Brazilian">Brazilian</option>
         <option value="British">British</option>
         <option value="Bulgarian">Bulgarian</option>
         <option value="Canadian">Canadian</option>
         <option value="Chinese">Chinese</option>
         <option value="Colombian">Colombian</option>
         <option value="Croatian">Croatian</option>
         <option value="Cuban">Cuban</option>
         <option value="Czech">Czech</option>
         <option value="Danish">Danish</option>
         <option value="Dutch">Dutch</option>
         <option value="Estonian">Estonian</option>
         <option value="Filipino">Filipino</option>
         <option value="Finnish">Finnish</option>
         <option value="French">French</option>
         <option value="German">German</option>
         <option value="Greek">Greek</option>
         <option value="Hungarian">Hungarian</option>
         <option value="Indian">Indian</option>
         <option value="Irish">Irish</option>
         <option value="Israeli">Israeli</option>
         <option value="Italian">Italian</option>
         <option value="Jamaican">Jamaican</option>
         <option value="Japanese">Japanese</option>
         <option value="Korean">Korean</option>
         <option value="Latvian">Latvian</option>
         <option value="Lithuanian">Lithuanian</option>
         <option value="Malaysian">Malaysian</option>
         <option value="Mexican">Mexican</option>
         <option value="Moldovian">Moldovian</option>
         <option value="Montenegrian">Montenegrian</option>
         <option value="Norwegian">Norwegian</option>
         <option value="Polish">Polish</option>
         <option value="Portuguese">Portuguese</option>
         <option value="Puerto Rican">Puerto Rican</option>
         <option value="Romanian">Romanian</option>
         <option value="Russian">Russian</option>
         <option value="Serbian">Serbian</option>
         <option value="Singaporean">Singaporean</option>
         <option value="Slovak">Slovak</option>
         <option value="Slovenian">Slovenian</option>
         <option value="Spanish">Spanish</option>
         <option value="Swedish">Swedish</option>
         <option value="Swiss">Swiss</option>
         <option value="Thai">Thai</option>
         <option value="Ukrainian">Ukrainian</option>
         <option value="Venezuelan">Venezuelan</option>
         <option value="Vietnamese">Vietnamese</option>
      </select> <br> <br>






      <label>Taille</label> <br>
      <select name="taille">
         <option value="<?php echo $user['taille']; ?>" selected>
            <?php echo $user['taille']; ?></option>

         <option value="Nain">Nain</option>
         <option value="136 Cm">136 cm</option>
         <option value="137 Cm">137 cm</option>
         <option value="138 Cm">138 cm</option>
         <option value="139 Cm">139 cm</option>
         <option value="140 Cm">140 cm</option>
         <option value="141 Cm">141 cm</option>
         <option value="142 Cm">142 cm</option>
         <option value="143 Cm">143 cm</option>
         <option value="144 Cm">144 cm</option>
         <option value="145 Cm">145 cm</option>
         <option value="146 Cm">146 cm</option>
         <option value="147 Cm">147 cm</option>
         <option value="148 Cm">148 cm</option>
         <option value="149 Cm">149 cm</option>
         <option value="150 Cm">150 cm</option>
         <option value="151 Cm">151 cm</option>
         <option value="152 Cm">152 cm</option>
         <option value="153 Cm">153 cm</option>
         <option value="154 Cm">154 cm</option>
         <option value="155 Cm">155 cm</option>
         <option value="156 Cm">156 cm</option>
         <option value="157 Cm">157 cm</option>
         <option value="158 Cm">158 cm</option>
         <option value="159 Cm">159 cm</option>
         <option value="160 Cm">160 cm</option>
         <option value="161 Cm">161 cm</option>
         <option value="162 Cm">162 cm</option>
         <option value="163 Cm">163 cm</option>
         <option value="164 Cm">164 cm</option>
         <option value="165 Cm">165 cm</option>
         <option value="166 Cm">166 cm</option>
         <option value="167 Cm">167 cm</option>
         <option value="168 Cm">168 cm</option>
         <option value="169 Cm">169 cm</option>
         <option value="170 Cm">170 cm</option>
         <option value="171 Cm">171 cm</option>
         <option value="172 Cm">172 cm</option>
         <option value="173 Cm">173 cm</option>
         <option value="174 Cm">174 cm</option>
         <option value="175 Cm">175 cm</option>
         <option value="176 Cm">176 cm</option>
         <option value="177 Cm">177 cm</option>
         <option value="178 Cm">178 cm</option>
         <option value="179 Cm">179 cm</option>
         <option value="180 Cm">180 cm</option>
         <option value="181 Cm">181 cm</option>
         <option value="182 Cm">182 cm</option>
         <option value="183 Cm">183 cm</option>
         <option value="184 Cm">184 cm</option>
         <option value="185 Cm">185 cm</option>
         <option value="186 Cm">186 cm</option>
         <option value="187 Cm">187 cm</option>
         <option value="188 Cm">188 cm</option>
         <option value="189 Cm">189 cm</option>
         <option value="190 Cm">190 cm</option>
         <option value="191 Cm">191 cm</option>
         <option value="192 Cm">192 cm</option>
         <option value="193 Cm">193 cm</option>
         <option value="194 Cm">194 cm</option>
         <option value="195 Cm">195 cm</option>
         <option value="196 Cm">196 cm</option>
         <option value="197 Cm">197 cm</option>
         <option value="198 Cm">198 cm</option>
         <option value="199 Cm">199 cm</option>
         <option value="200 Cm">200 cm</option>
         <option value="201 Cm">201 cm</option>
         <option value="202 Cm">202 cm</option>
         <option value="203 Cm">203 cm</option>
         <option value="204 Cm">204 cm</option>
         <option value="205 Cm">205 cm</option>
         <option value="Geant">Geant</option>


      </select> <br> <br>


      <label>Poids</label> <br>

      <select name="poids">
         <option value="<?php echo $user['poids']; ?>" selected>
            <?php echo $user['poids'];  ?> </option>


         <option value="45 kg">45</option>
         <option value="46 Kg">46 kg</option>
         <option value="47 Kg">47 kg</option>
         <option value="48 Kg">48 kg</option>
         <option value="49 Kg">49 kg</option>
         <option value="50 Kg">50 kg</option>
         <option value="51 Kg">51 kg</option>
         <option value="52 Kg">52 kg</option>
         <option value="53 Kg">53 kg</option>
         <option value="54 Kg">54 kg</option>
         <option value="55 Kg">55 kg</option>
         <option value="56 Kg">56 kg</option>
         <option value="57 Kg">57 kg</option>
         <option value="58 Kg">58 kg</option>
         <option value="59 Kg">59 kg</option>
         <option value="60 Kg">60 kg</option>
         <option value="61 Kg">61 kg</option>
         <option value="62 Kg">62 kg</option>
         <option value="63 Kg">63 kg</option>
         <option value="64 Kg">64 kg</option>
         <option value="65 Kg">65 kg</option>
         <option value="66 Kg">66 kg</option>
         <option value="67 Kg">67 kg</option>
         <option value="68 Kg">68 kg</option>
         <option value="69 Kg">69 kg</option>
         <option value="70 Kg">70 kg</option>
         <option value="71 Kg">71 kg</option>
         <option value="72 Kg">72 kg</option>
         <option value="73 Kg">73 kg</option>
         <option value="74 Kg">74 kg</option>
         <option value="75 Kg">75 kg</option>
         <option value="76 Kg">76 kg</option>
         <option value="77 Kg">77 kg</option>
         <option value="78 Kg">78 kg</option>
         <option value="79 Kg">79 kg</option>
         <option value="80 Kg">80 kg</option>
         <option value="81 Kg">81 kg</option>
         <option value="82 Kg">82 kg</option>
         <option value="83 Kg">83 kg</option>
         <option value="84 Kg">84 kg</option>
         <option value="85 Kg">85 kg</option>
         <option value="86 Kg">86 kg</option>
         <option value="87 Kg">87 kg</option>
         <option value="88 Kg">88 kg</option>
         <option value="89 Kg">89 kg</option>
         <option value="90 Kg">90 kg</option>
         <option value="91 Kg">91 kg</option>
         <option value="92 Kg">92 kg</option>
         <option value="93 Kg">93 kg</option>
         <option value="94 Kg">94 kg</option>
         <option value="95 Kg">95 kg</option>
         <option value="96 Kg">96 kg</option>
         <option value="97 Kg">97 kg</option>
         <option value="98 Kg">98 kg</option>
         <option value="99 Kg">99 kg</option>
         <option value="100 Kg">100 kg</option>
         <option value="101 Kg">101 kg</option>
         <option value="102 Kg">102 kg</option>
         <option value="103 Kg">103 kg</option>
         <option value="104 Kg">104 kg</option>
         <option value="105 Kg">105 kg</option>
         <option value="106 Kg">106 kg</option>
         <option value="107 Kg">107 kg</option>
         <option value="108 Kg">108 kg</option>
         <option value="109 Kg">109 kg</option>
         <option value="110 Kg">110 kg</option>
         <option value="111 Kg">111 kg</option>
         <option value="112 Kg">112 kg</option>
         <option value="113 Kg">113 kg</option>
         <option value="114 Kg">114 kg</option>
         <option value="115">115 kg</option>
         <option value="116">116 kg</option>
         <option value="117">117 kg</option>
         <option value="118">118 kg</option>
         <option value="119">119 kg</option>
         <option value="120">120 kg</option>
         <option value="121">121 kg</option>
         <option value="122 Kg">122 kg</option>
         <option value="123 Kg">123 kg</option>
         <option value="124 Kg">124 kg</option>
         <option value="125 Kg">125 kg</option>
         <option value="126 Kg">126 kg</option>
         <option value="127 Kg">127 kg</option>
         <option value="128 Kg">128 kg</option>
         <option value="129 Kg">129 kg</option>
         <option value="130 Kg">130 kg</option>



      </select> <br> <br>

      <label>Cheveux</label> <br>
      <select name="cheveux_color">
         <option value="<?php echo $user['cheveux_color']; ?>" selected>
            <?php echo $user['cheveux_color'];  ?> </option>>

         <option value="Blond">Blond</option>
         <option value="Chatain clair">Châtain clair</option>
         <option value="Chatain fonce">Châtain foncé</option>
         <option value="Crun">Brun</option>
         <option value="Roux">Roux</option>
         <option value="Raser">Raser</option>
      </select> <br> <br>

      <label>Situation </label> <br>
      <select name="situation">
         <option value="<?php echo $user['situation']; ?>" selected>
            <?php echo $user['situation'];  ?> </option>
         <option value="Couple">En couple</option>
         <option value="Célibataire">Celibataire</option>
         <option value="Compliqué">C'est compliqué</option>

      </select> <br> <br>

      <select name="" id="">
         <button></button><button></button><button></button><button></button><button></button>

      </select>





      <label>Ma description</label> <br> <br>
      <textarea class="textarea_edit_profil" name="description_profil" cols="30" rows="5" minlength="10" maxlength="150"><?php echo $user['description_profil']; ?></textarea> <br> <br>


      <button class="safe" type="submit" value="Enregistrer">Enregistrer</button>
      <br>

      <button class="return" type="button" value="Retour" onclick="history.go(-1);">
         Retour
      </button>










   </form>



   <?php if (isset($msg)) {
      echo $msg;
   } ?>








</section>






<script>
   let $selects = document.querySelectorAll('.linked-select')
   $selects.forEach(function($select) {
      new LinkedSelect($select)
   })
</script>


<footer>

</footer>