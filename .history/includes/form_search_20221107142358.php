<div class="modal-content">


    <!-- Formulaire de recherche (ne pas oublier htmlspecialchars pour secur sql) -->

    <div class="form_search">

    <form action="" method="POST">

    <div>

    <p>Je recherche des </p>
        <label>Homme
        <input type="checkbox" name="homme" value="1" id="checkMen" <?php if(!empty($homme) && $homme==1){echo "checked";} ?>/><br>
        </label> <br>

        <label>Femme
        <input type="checkbox" name="femme" value="1" id="checkWomen" <?php if(!empty($femme) && $femme==1){echo "checked";} ?> /> <br>
        </label>

    </div>

    <!-- On vient récupérer le département ( meme id et name que sur index.php) -->

    <div>
   
    <p>Qui habite</p>
        <label>Département</label> <br>
        <select id="select_departement" name="departement" required="">

    </div>

    <div>
    <option value="<?php if(!empty($departement_code) && $departement_code!=-1){ echo $dpcode;}else{ echo -1;} ?>">
    <?php
    if(!empty($departement_code) && $departement_code!=-1){
        echo $dpnom;
    }else{
        echo 'Choisir un département';
    }
    ?>
    </option>
    
    
          

        
        <option value="01">Ain</option><option value="02">Aisne</option><option value="03">Allier</option><option value="04">Alpes-de-Haute-Provence</option><option value="06">Alpes-Maritimes</option><option value="07">Ardèche</option><option value="08">Ardennes</option><option value="09">Ariège</option><option value="10">Aube</option><option value="11">Aude</option><option value="12">Aveyron</option><option value="67">Bas-Rhin</option><option value="13">Bouches-du-Rhône</option><option value="14">Calvados</option><option value="15">Cantal</option><option value="16">Charente</option><option value="17">Charente-Maritime</option><option value="18">Cher</option><option value="19">Corrèze</option><option value="2a">Corse-du-sud</option><option value="21">Côte-d'or</option><option value="22">Côtes-d'armor</option><option value="23">Creuse</option><option value="79">Deux-Sèvres</option><option value="24">Dordogne</option><option value="25">Doubs</option><option value="26">Drôme</option><option value="91">Essonne</option><option value="27">Eure</option><option value="28">Eure-et-Loir</option><option value="29">Finistère</option><option value="30">Gard</option><option value="32">Gers</option><option value="33">Gironde</option><option value="971">Guadeloupe</option><option value="973">Guyane</option><option value="68">Haut-Rhin</option><option value="2b">Haute-corse</option><option value="31">Haute-Garonne</option><option value="43">Haute-Loire</option><option value="52">Haute-Marne</option><option value="70">Haute-Saône</option><option value="74">Haute-Savoie</option><option value="87">Haute-Vienne</option><option value="05">Hautes-Alpes</option><option value="65">Hautes-Pyrénées</option><option value="92">Hauts-de-Seine</option><option value="34">Hérault</option><option value="35">Ile-et-Vilaine</option><option value="36">Indre</option><option value="37">Indre-et-Loire</option><option value="38">Isère</option><option value="39">Jura</option><option value="40">Landes</option><option value="41">Loir-et-Cher</option><option value="42">Loire</option><option value="44">Loire-Atlantique</option><option value="45">Loiret</option><option value="46">Lot</option><option value="47">Lot-et-Garonne</option><option value="48">Lozère</option><option value="49">Maine-et-Loire</option><option value="50">Manche</option><option value="51">Marne</option><option value="972">Martinique</option><option value="53">Mayenne</option><option value="976">Mayotte</option><option value="54">Meurthe-et-Moselle</option><option value="55">Meuse</option><option value="56">Morbihan</option><option value="57">Moselle</option><option value="58">Nièvre</option><option value="59">Nord</option><option value="60">Oise</option><option value="61">Orne</option><option value="75">Paris</option><option value="62">Pas-de-Calais</option><option value="63">Puy-de-Dôme</option><option value="64">Pyrénées-Atlantiques</option><option value="66">Pyrénées-Orientales</option><option value="974">Réunion</option><option value="69">Rhône</option><option value="71">Saône-et-Loire</option><option value="72">Sarthe</option><option value="73">Savoie</option><option value="77">Seine-et-Marne</option><option value="76">Seine-Maritime</option><option value="93">Seine-Saint-Denis</option><option value="80">Somme</option><option value="81">Tarn</option><option value="82">Tarn-et-Garonne</option><option value="90">Territoire de Belfort</option><option value="95">Val-d'oise</option><option value="94">Val-de-Marne</option><option value="83">Var</option><option value="84">Vaucluse</option><option value="85">Vendée</option><option value="86">Vienne</option><option value="88">Vosges</option><option value="89">Yonne</option><option value="78">Yvelines</option>                    </select>
        

    </div>
 
    <div>

    <p>Qui à</p>

    <label>Age minimum</label> <br>
        <input class="age_search" type="number" name="age_min" id="age_min" 
        value="<?php if(!empty($ageMin)){echo $ageMin;} ?>" /><br>

     <label>Age maximum</label> <br>
        <input class="age_search" type="number" name="age_max" id="age_max" 
        value="<?php if(!empty($ageMax) && $ageMax!=99){echo $ageMax;} ?>" />

    </div>

    <div>
        <p>Taille</p>

        <label>Poids minimum</label>
        <input type="number" name="poids_min" id="poids_min" 
        value="<?php if(!empty($poids_min)){echo $poids_min;} ?>" />

        <label>Poids maximum</label>

        <input type="number" name="poids_max" id="poids_max" 
        value="<?php if(!empty($poids_max)){echo $poids_max;} ?>" />
    </div>


    <div>

        <label>Pseudo</label> <br>

        <input class="pseudo_search" name="pseudo" type="text" value="<?php if(!empty($pseudo)){echo $pseudo;} ?>">

    </div>
<input class="button" type="submit" name="search" value="search" />
<input class="button" type="submit" name="reset" value="reset" />
    </form>


    </div>


    
</div> <!-- Fin modal content-->
