<div class="modal-content">
    <!-- Formulaire de recherche (ne pas oublier htmlspecialchars pour secur sql) -->
    <div class="form_search">

        <form action="" method="POST">
            <div>
                <p>Je recherche des </p>
                <label>Homme
                    <input type="checkbox" name="homme" value="1" id="checkMen" <?php echo (!empty($homme) && $homme == 1) ? "checked" : ""; ?> /><br>
                </label>
                <br />
                <label>Femme
                    <input type="checkbox" name="femme" value="1" id="checkWomen" <?php echo (!empty($femme) && $femme == 1) ? "checked" : ""; ?> /> <br>
                </label>
            </div>

            <!-- On vient récupérer le département ( meme id et name que sur index.php) -->
            <div>
                <p>Qui habite</p>
                <label>Département</label>
                <br />
                <select id="select_departement" name="departement" required="">
            </div>

            <div>
                <option value="<?php echo (!empty($departement_code) && $departement_code != -1) ? $dpcode : -1; ?>">
                    <?php echo (!empty($departement_code) && $departement_code != -1) ? $dpnom : 'Choisir un département'; ?>
                </option>
                <option value="01">Ain</option>
                <option value="02">Aisne</option>
                <option value="03">Allier</option>
                <option value="04">Alpes-de-Haute-Provence</option>
                <option value="06">Alpes-Maritimes</option>
                <option value="07">Ardèche</option>
                <option value="08">Ardennes</option>
                <option value="09">Ariège</option>
                <option value="10">Aube</option>
                <option value="11">Aude</option>
                <option value="12">Aveyron</option>
                <option value="67">Bas-Rhin</option>
                <option value="13">Bouches-du-Rhône</option>
                <option value="14">Calvados</option>
                <option value="15">Cantal</option>
                <option value="16">Charente</option>
                <option value="17">Charente-Maritime</option>
                <option value="18">Cher</option>
                <option value="19">Corrèze</option>
                <option value="2a">Corse-du-sud</option>
                <option value="21">Côte-d'or</option>
                <option value="22">Côtes-d'armor</option>
                <option value="23">Creuse</option>
                <option value="79">Deux-Sèvres</option>
                <option value="24">Dordogne</option>
                <option value="25">Doubs</option>
                <option value="26">Drôme</option>
                <option value="91">Essonne</option>
                <option value="27">Eure</option>
                <option value="28">Eure-et-Loir</option>
                <option value="29">Finistère</option>
                <option value="30">Gard</option>
                <option value="32">Gers</option>
                <option value="33">Gironde</option>
                <option value="971">Guadeloupe</option>
                <option value="973">Guyane</option>
                <option value="68">Haut-Rhin</option>
                <option value="2b">Haute-corse</option>
                <option value="31">Haute-Garonne</option>
                <option value="43">Haute-Loire</option>
                <option value="52">Haute-Marne</option>
                <option value="70">Haute-Saône</option>
                <option value="74">Haute-Savoie</option>
                <option value="87">Haute-Vienne</option>
                <option value="05">Hautes-Alpes</option>
                <option value="65">Hautes-Pyrénées</option>
                <option value="92">Hauts-de-Seine</option>
                <option value="34">Hérault</option>
                <option value="35">Ile-et-Vilaine</option>
                <option value="36">Indre</option>
                <option value="37">Indre-et-Loire</option>
                <option value="38">Isère</option>
                <option value="39">Jura</option>
                <option value="40">Landes</option>
                <option value="41">Loir-et-Cher</option>
                <option value="42">Loire</option>
                <option value="44">Loire-Atlantique</option>
                <option value="45">Loiret</option>
                <option value="46">Lot</option>
                <option value="47">Lot-et-Garonne</option>
                <option value="48">Lozère</option>
                <option value="49">Maine-et-Loire</option>
                <option value="50">Manche</option>
                <option value="51">Marne</option>
                <option value="972">Martinique</option>
                <option value="53">Mayenne</option>
                <option value="976">Mayotte</option>
                <option value="54">Meurthe-et-Moselle</option>
                <option value="55">Meuse</option>
                <option value="56">Morbihan</option>
                <option value="57">Moselle</option>
                <option value="58">Nièvre</option>
                <option value="59">Nord</option>
                <option value="60">Oise</option>
                <option value="61">Orne</option>
                <option value="75">Paris</option>
                <option value="62">Pas-de-Calais</option>
                <option value="63">Puy-de-Dôme</option>
                <option value="64">Pyrénées-Atlantiques</option>
                <option value="66">Pyrénées-Orientales</option>
                <option value="974">Réunion</option>
                <option value="69">Rhône</option>
                <option value="71">Saône-et-Loire</option>
                <option value="72">Sarthe</option>
                <option value="73">Savoie</option>
                <option value="77">Seine-et-Marne</option>
                <option value="76">Seine-Maritime</option>
                <option value="93">Seine-Saint-Denis</option>
                <option value="80">Somme</option>
                <option value="81">Tarn</option>
                <option value="82">Tarn-et-Garonne</option>
                <option value="90">Territoire de Belfort</option>
                <option value="95">Val-d'oise</option>
                <option value="94">Val-de-Marne</option>
                <option value="83">Var</option>
                <option value="84">Vaucluse</option>
                <option value="85">Vendée</option>
                <option value="86">Vienne</option>
                <option value="88">Vosges</option>
                <option value="89">Yonne</option>
                <option value="78">Yvelines</option>
                </select>
            </div>

            <!-- RECHERCHE SUR LA SITUATION ///

            // RECHERCHE SUR ICI POUR // -->
            <div>
                <p>Qui à</p>
                <label>Age minimum</label>
                <br />
                <input class="age_search" type="number" name="age_min" id="age_min" value="<?php echo !empty($ageMin) ? $ageMin : ""; ?>" /><br>

                <label>Age maximum</label>
                <br />
                <input class="age_search" type="number" name="age_max" id="age_max" value="<?php echo (!empty($ageMax) && $ageMax != 99) ? $ageMax : ""; ?>" />
            </div>

            <div>
                <p>Taille</p>
                <label>Taille minimum</label>
                <input type="number" name="taille_min" id="taille_min" value="<?php echo !empty($taille_min) ? $taille_min : ""; ?>" />

                <label>Taille maximum</label>
                <input type="number" name="taille_max" id="taille_max" value="<?php echo (!empty($taille_max) && $taille_max != 150) ? $poids_max : ""; ?>" />
            </div>

            <div>
                <?php
                $poids_min = isset($_POST['poids_min']) ? $_POST['poids_min'] : "";
                $poids_max = isset($_POST['poids_max']) ? $_POST['poids_max'] : "";
                ?>
                <p>Poids</p>
                <br />
                <select name="poids_min" id="poids_min">
                    <option value="">min</option>
                    <option value=""></option>
                    <?php
                    for ($i = 40; $i <= 150; $i++) {
                    ?>
                        <option value="<?= $i; ?>" <?php echo ($poids_min == $i) ? "selected" : "" ?>><?= $i; ?> kilos</option>
                    <?php
                    }
                    ?>
                </select>
                et
                <select name="poids_max" id="poids_max">
                    <option value="">max</option>
                    <option value=""></option>
                    <?php
                    for ($i = 50; $i <= 150; $i++) {
                    ?>
                        <option value="<?= $i; ?>" <?php echo ($poids_max == $i) ? "selected" : "" ?>><?= $i; ?> kilos</option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div>
                <?php
                $cheveux_color = isset($cheveux_color) ? $cheveux_color : "";
                ?>
                <p>Cheveux</p>
                <br />
                <select name="cheveux_color" id="cheveux_color">
                    <option value=""></option>
                    <option value="blond" <?php echo ($cheveux_color == "blond") ? "selected" : "" ?>>Blond</option>
                    <option value="chatain_clair" <?php echo ($cheveux_color == "chatain_clair") ? "selected" : "" ?>>Châtain clair</option>
                    <option value="chatain_fonce" <?php echo ($cheveux_color == "chatain_fonce") ? "selected" : "" ?>>Châtain foncé</option>
                    <option value="brun" <?php echo ($cheveux_color == "brun") ? "selected" : "" ?>>Brun</option>
                    <option value="roux" <?php echo ($cheveux_color == "roux") ? "selected" : "" ?>>Roux</option>
                    <option value="raser" <?php echo ($cheveux_color == "raser") ? "selected" : "" ?>>Raser</option>
                </select>
            </div>

            <div>
                <?php
                $situation = isset($situation) ? $situation : "";
                ?>
                <p>Situation</p>
                <br />
                <select name="situation" id="situation" value="<?php echo !empty($situation) ? $situation : "" ?>">
                    <option value=""></option>
                    <option value="En couple" <?php echo ($situation == "En couple") ? "selected" : "" ?>>En couple</option>
                    <option value="Celibataire" <?php echo ($situation == "Celibataire") ? "selected" : "" ?>>Celibataire</option>
                    <option value="C'est compliqué" <?php echo ($situation == "C'est compliqué") ? "selected" : "" ?>>C'est compliqué</option>
                </select>
            </div>

            <div>
                <label>Pseudo</label>
                <br />
                <input class="pseudo_search" name="pseudo" type="text" value="<?php echo !empty($pseudo) ? $pseudo : ""; ?>">
            </div>
            <input class="button" type="submit" name="search" value="search" />
            <input class="button" type="submit" name="reset" value="reset" />
        </form>
    </div>
</div> <!-- Fin modal content-->