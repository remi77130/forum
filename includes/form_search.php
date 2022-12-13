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
    <?php if(!empty($departement_code) && $departement_code!=-1){
        echo $dpnom;
    }else{
        echo 'Choisir un département';
    }
    ?>
    </option>
        <option value="01">Ain</option><option value="02">Aisne</option><option value="03">Allier</option><option value="04">Alpes-de-Haute-Provence</option><option value="06">Alpes-Maritimes</option><option value="07">Ardèche</option><option value="08">Ardennes</option><option value="09">Ariège</option><option value="10">Aube</option><option value="11">Aude</option><option value="12">Aveyron</option><option value="67">Bas-Rhin</option><option value="13">Bouches-du-Rhône</option><option value="14">Calvados</option><option value="15">Cantal</option><option value="16">Charente</option><option value="17">Charente-Maritime</option><option value="18">Cher</option><option value="19">Corrèze</option><option value="2a">Corse-du-sud</option><option value="21">Côte-d'or</option><option value="22">Côtes-d'armor</option><option value="23">Creuse</option><option value="79">Deux-Sèvres</option><option value="24">Dordogne</option><option value="25">Doubs</option><option value="26">Drôme</option><option value="91">Essonne</option><option value="27">Eure</option><option value="28">Eure-et-Loir</option><option value="29">Finistère</option><option value="30">Gard</option><option value="32">Gers</option><option value="33">Gironde</option><option value="971">Guadeloupe</option><option value="973">Guyane</option><option value="68">Haut-Rhin</option><option value="2b">Haute-corse</option><option value="31">Haute-Garonne</option><option value="43">Haute-Loire</option><option value="52">Haute-Marne</option><option value="70">Haute-Saône</option><option value="74">Haute-Savoie</option><option value="87">Haute-Vienne</option><option value="05">Hautes-Alpes</option><option value="65">Hautes-Pyrénées</option><option value="92">Hauts-de-Seine</option><option value="34">Hérault</option><option value="35">Ile-et-Vilaine</option><option value="36">Indre</option><option value="37">Indre-et-Loire</option><option value="38">Isère</option><option value="39">Jura</option><option value="40">Landes</option><option value="41">Loir-et-Cher</option><option value="42">Loire</option><option value="44">Loire-Atlantique</option><option value="45">Loiret</option><option value="46">Lot</option><option value="47">Lot-et-Garonne</option><option value="48">Lozère</option><option value="49">Maine-et-Loire</option><option value="50">Manche</option><option value="51">Marne</option><option value="972">Martinique</option><option value="53">Mayenne</option><option value="976">Mayotte</option><option value="54">Meurthe-et-Moselle</option><option value="55">Meuse</option><option value="56">Morbihan</option><option value="57">Moselle</option><option value="58">Nièvre</option><option value="59">Nord</option><option value="60">Oise</option><option value="61">Orne</option><option value="75">Paris</option><option value="62">Pas-de-Calais</option><option value="63">Puy-de-Dôme</option><option value="64">Pyrénées-Atlantiques</option><option value="66">Pyrénées-Orientales</option><option value="974">Réunion</option><option value="69">Rhône</option><option value="71">Saône-et-Loire</option><option value="72">Sarthe</option><option value="73">Savoie</option><option value="77">Seine-et-Marne</option><option value="76">Seine-Maritime</option><option value="93">Seine-Saint-Denis</option><option value="80">Somme</option><option value="81">Tarn</option><option value="82">Tarn-et-Garonne</option><option value="90">Territoire de Belfort</option><option value="95">Val-d'oise</option><option value="94">Val-de-Marne</option><option value="83">Var</option><option value="84">Vaucluse</option><option value="85">Vendée</option><option value="86">Vienne</option><option value="88">Vosges</option><option value="89">Yonne</option><option value="78">Yvelines</option>
    </select>
    </div>







<!-- RECHERCHE SUR LA SITUATION ///

// RECHERCHE SUR ICI POUR // -->



    
 
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

        <label>Taille minimum</label>
        <input type="number" name="taille_min" id="taille_min" 
        value="<?php if(!empty($taille_min)){echo $taille_min;} ?>" />

        <label>Taille maximum</label>

        <input type="number" name="taille_max" id="taille_max" 
        value="<?php if(!empty($taille_max) && $taille_max!=150){echo $poids_max;} ?>" />
    </div>

    <div>
        <p>Poids</p> <br>
        
        <select name="poids_min" id="poids_min" alue="<?php if(!empty($poids_min)){echo $poids_min;} ?>" >
            
        <option value="">min</option>
				<option value=""></option>
				<option value="40">40 kilos</option><option value="41">41 kilos</option><option value="42">42 kilos</option><option value="43">43 kilos</option><option value="44">44 kilos</option><option value="45">45 kilos</option><option value="46">46 kilos</option><option value="47">47 kilos</option><option value="48">48 kilos</option><option value="49">49 kilos</option><option value="50">50 kilos</option><option value="51">51 kilos</option><option value="52">52 kilos</option><option value="53">53 kilos</option><option value="54">54 kilos</option><option value="55">55 kilos</option><option value="56">56 kilos</option><option value="57">57 kilos</option><option value="58">58 kilos</option><option value="59">59 kilos</option><option value="60">60 kilos</option><option value="61">61 kilos</option><option value="62">62 kilos</option><option value="63">63 kilos</option><option value="64">64 kilos</option><option value="65">65 kilos</option><option value="66">66 kilos</option><option value="67">67 kilos</option><option value="68">68 kilos</option><option value="69">69 kilos</option><option value="70">70 kilos</option><option value="71">71 kilos</option><option value="72">72 kilos</option><option value="73">73 kilos</option><option value="74">74 kilos</option><option value="75">75 kilos</option><option value="76">76 kilos</option><option value="77">77 kilos</option><option value="78">78 kilos</option><option value="79">79 kilos</option><option value="80">80 kilos</option><option value="81">81 kilos</option><option value="82">82 kilos</option><option value="83">83 kilos</option><option value="84">84 kilos</option><option value="85">85 kilos</option><option value="86">86 kilos</option><option value="87">87 kilos</option><option value="88">88 kilos</option><option value="89">89 kilos</option><option value="90">90 kilos</option><option value="91">91 kilos</option><option value="92">92 kilos</option><option value="93">93 kilos</option><option value="94">94 kilos</option><option value="95">95 kilos</option><option value="96">96 kilos</option><option value="97">97 kilos</option><option value="98">98 kilos</option><option value="99">99 kilos</option><option value="100">100 kilos</option><option value="101">101 kilos</option><option value="102">102 kilos</option><option value="103">103 kilos</option><option value="104">104 kilos</option><option value="105">105 kilos</option><option value="106">106 kilos</option><option value="107">107 kilos</option><option value="108">108 kilos</option><option value="109">109 kilos</option><option value="110">110 kilos</option><option value="111">111 kilos</option><option value="112">112 kilos</option><option value="113">113 kilos</option><option value="114">114 kilos</option><option value="115">115 kilos</option><option value="116">116 kilos</option><option value="117">117 kilos</option><option value="118">118 kilos</option><option value="119">119 kilos</option><option value="120">120 kilos</option><option value="121">121 kilos</option><option value="122">122 kilos</option><option value="123">123 kilos</option><option value="124">124 kilos</option><option value="125">125 kilos</option><option value="126">126 kilos</option><option value="127">127 kilos</option><option value="128">128 kilos</option><option value="129">129 kilos</option><option value="130">130 kilos</option><option value="131">131 kilos</option><option value="132">132 kilos</option><option value="133">133 kilos</option><option value="134">134 kilos</option><option value="135">135 kilos</option><option value="136">136 kilos</option><option value="137">137 kilos</option><option value="138">138 kilos</option><option value="139">139 kilos</option><option value="140">140 kilos</option><option value="141">141 kilos</option><option value="142">142 kilos</option><option value="143">143 kilos</option><option value="144">144 kilos</option><option value="145">145 kilos</option><option value="146">146 kilos</option><option value="147">147 kilos</option><option value="148">148 kilos</option><option value="149">149 kilos</option><option value="150">150 kilos</option></select> 
                et
                <select name="poids_max" id="poids_max">
				<option value="">max</option>
				<option value=""></option>
				<option value="50">50 kilos</option><option value="51">51 kilos</option><option value="52">52 kilos</option><option value="53">53 kilos</option><option value="54">54 kilos</option><option value="55">55 kilos</option><option value="56">56 kilos</option><option value="57">57 kilos</option><option value="58">58 kilos</option><option value="59">59 kilos</option><option value="60">60 kilos</option><option value="61">61 kilos</option><option value="62">62 kilos</option><option value="63">63 kilos</option><option value="64">64 kilos</option><option value="65">65 kilos</option><option value="66">66 kilos</option><option value="67">67 kilos</option><option value="68">68 kilos</option><option value="69">69 kilos</option><option value="70">70 kilos</option><option value="71">71 kilos</option><option value="72">72 kilos</option><option value="73">73 kilos</option><option value="74">74 kilos</option><option value="75">75 kilos</option><option value="76">76 kilos</option><option value="77">77 kilos</option><option value="78">78 kilos</option><option value="79">79 kilos</option><option value="80">80 kilos</option><option value="81">81 kilos</option><option value="82">82 kilos</option><option value="83">83 kilos</option><option value="84">84 kilos</option><option value="85">85 kilos</option><option value="86">86 kilos</option><option value="87">87 kilos</option><option value="88">88 kilos</option><option value="89">89 kilos</option><option value="90">90 kilos</option><option value="91">91 kilos</option><option value="92">92 kilos</option><option value="93">93 kilos</option><option value="94">94 kilos</option><option value="95">95 kilos</option><option value="96">96 kilos</option><option value="97">97 kilos</option><option value="98">98 kilos</option><option value="99">99 kilos</option><option value="100">100 kilos</option><option value="101">101 kilos</option><option value="102">102 kilos</option><option value="103">103 kilos</option><option value="104">104 kilos</option><option value="105">105 kilos</option><option value="106">106 kilos</option><option value="107">107 kilos</option><option value="108">108 kilos</option><option value="109">109 kilos</option><option value="110">110 kilos</option><option value="111">111 kilos</option><option value="112">112 kilos</option><option value="113">113 kilos</option><option value="114">114 kilos</option><option value="115">115 kilos</option><option value="116">116 kilos</option><option value="117">117 kilos</option><option value="118">118 kilos</option><option value="119">119 kilos</option><option value="120">120 kilos</option><option value="121">121 kilos</option><option value="122">122 kilos</option><option value="123">123 kilos</option><option value="124">124 kilos</option><option value="125">125 kilos</option><option value="126">126 kilos</option><option value="127">127 kilos</option><option value="128">128 kilos</option><option value="129">129 kilos</option><option value="130">130 kilos</option><option value="131">131 kilos</option><option value="132">132 kilos</option><option value="133">133 kilos</option><option value="134">134 kilos</option><option value="135">135 kilos</option><option value="136">136 kilos</option><option value="137">137 kilos</option><option value="138">138 kilos</option><option value="139">139 kilos</option><option value="140">140 kilos</option><option value="141">141 kilos</option><option value="142">142 kilos</option><option value="143">143 kilos</option><option value="144">144 kilos</option><option value="145">145 kilos</option><option value="146">146 kilos</option><option value="147">147 kilos</option><option value="148">148 kilos</option><option value="149">149 kilos</option><option value="150">150 kilos</option>
                </select><br />
			



        </select>
   
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
