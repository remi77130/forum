
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
               <option value="Ici pour plan cul">Plan cul</option>
               <option value="t'es de la police ?">T'es de la police ?</option>
               </select>




            <label>Taille</label>
               <select name="taille">
               <option value="<?php echo $user['taille'];?>" selected><?php echo $user['taille']; ?></option>

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
           

               </select>     
               
               
               <label>Poids</label>

               <select name="poids">
               <option value="<?php echo $user['poids'];?>" selected><?php echo $user['poids']; ?></option>


               <option value="pour 45">45 kg</option>
               <option value="pour 46">46 kg</option>
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
               <option value="81">81 kg</option>
               <option value="82">82 kg</option>
               <option value="83">83 kg</option>
               <option value="84">84 kg</option>
               <option value="85">85 kg</option>
               <option value="86">86 kg</option>
               <option value="87">87 kg</option>
               <option value="88">88 kg</option>
               <option value="89">89 kg</option>
               <option value="90">90 kg</option>
               <option value="91">91 kg</option>
               <option value="92">92 kg</option>
               <option value="93">93 kg</option>
               <option value="94">94 kg</option>
               <option value="95">95 kg</option>
               <option value="96">96 kg</option>
               <option value="97">97 kg</option>
               <option value="98">98 kg</option>
               <option value="99">99 kg</option>
               <option value="100">100 kg</option>
               <option value="101">101 kg</option>
               <option value="102">102 kg</option>
               <option value="103">103 kg</option>
               <option value="104">104 kg</option>
               <option value="105">105 kg</option>
               <option value="106">106 kg</option>
               <option value="107">107 kg</option>
               <option value="108">108 kg</option>
               <option value="109">109 kg</option>
               <option value="110">110 kg</option>
               <option value="111">111 kg</option>
               <option value="112">112 kg</option>
               <option value="113">113 kg</option>
               <option value="114">114 kg</option>
               <option value="115">115 kg</option>
               <option value="116">116 kg</option>
               <option value="117">117 kg</option>
               <option value="118">118 kg</option>
               <option value="119">119 kg</option>
               <option value="120">120 kg</option>
               <option value="121">121 kg</option>
               <option value="122">122 kg</option>
               <option value="123">123 kg</option>
               <option value="124">124 kg</option>
               <option value="125">125 kg</option>
               <option value="126">126 kg</option>
               <option value="127">127 kg</option>
               <option value="128">128 kg</option>
               <option value="129">129 kg</option>
               <option value="130">130 kg</option>

               

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