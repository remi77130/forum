<!-- Page affichage des membres -->
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./assets/profil_membre.css">
<link rel="stylesheet" href="assets/modal.css">


<?php include 'includes/head.php';?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<body>


<?php

require 'require/database.php';
include 'profil.php';

?>




<?php

$requser = "SELECT * FROM membres ORDER BY id";
$requete = $bdd->query($requser);
$articles = $requete->fetchAll(); 

?>



<!-- a placer pour aller sur profil <li class="items"><a title="profil_membre" href="profil.php?id=<?= $_SESSION['id'] ?>">Mon Profil</a> 

-->

<nav class="navbar">

<a class="logo_nav" href="#">Chanderland</a>
<div class="nav-links">
    <ul>

    <li>
    <a  id="myBtn" href="#">Filtre</a> <img src="icones/chanderland_search.svg" alt="chanderland">
    </li>
    
    <li><a title="profil_membre" href="profil.php?id=<?= $_SESSION['id'] ?>">Mon Profil</a></li> <br>


</div>

<img class="menu_humb_nav" src="icones/chanderland_menu.svg" alt="chanderland_menu">



<div id="myModal" class="modal">

<div class="modal-content">
<span class="close">&times;</span>
    

    <!-- Formulaire de recherche (ne pas oublier htmlspecialchars pour secur sql) -->

    <form action="">

    <label>Homme</label>
    <input type="checkbox" name="H"> <br> 
    
    <label>Femme</label>
    <input type="checkbox" name="F"> <br>

    <!-- On vient récupérer le département ( meme id et name que sur index.php) -->
    <label>Département</label> <br>
    <select id="select_departement" name="departement" required="">

    <option value="">Département</option>
    <option value="01">Ain</option><option value="02">Aisne</option><option value="03">Allier</option><option value="04">Alpes-de-Haute-Provence</option><option value="06">Alpes-Maritimes</option><option value="07">Ardèche</option><option value="08">Ardennes</option><option value="09">Ariège</option><option value="10">Aube</option><option value="11">Aude</option><option value="12">Aveyron</option><option value="67">Bas-Rhin</option><option value="13">Bouches-du-Rhône</option><option value="14">Calvados</option><option value="15">Cantal</option><option value="16">Charente</option><option value="17">Charente-Maritime</option><option value="18">Cher</option><option value="19">Corrèze</option><option value="2a">Corse-du-sud</option><option value="21">Côte-d'or</option><option value="22">Côtes-d'armor</option><option value="23">Creuse</option><option value="79">Deux-Sèvres</option><option value="24">Dordogne</option><option value="25">Doubs</option><option value="26">Drôme</option><option value="91">Essonne</option><option value="27">Eure</option><option value="28">Eure-et-Loir</option><option value="29">Finistère</option><option value="30">Gard</option><option value="32">Gers</option><option value="33">Gironde</option><option value="971">Guadeloupe</option><option value="973">Guyane</option><option value="68">Haut-Rhin</option><option value="2b">Haute-corse</option><option value="31">Haute-Garonne</option><option value="43">Haute-Loire</option><option value="52">Haute-Marne</option><option value="70">Haute-Saône</option><option value="74">Haute-Savoie</option><option value="87">Haute-Vienne</option><option value="05">Hautes-Alpes</option><option value="65">Hautes-Pyrénées</option><option value="92">Hauts-de-Seine</option><option value="34">Hérault</option><option value="35">Ile-et-Vilaine</option><option value="36">Indre</option><option value="37">Indre-et-Loire</option><option value="38">Isère</option><option value="39">Jura</option><option value="40">Landes</option><option value="41">Loir-et-Cher</option><option value="42">Loire</option><option value="44">Loire-Atlantique</option><option value="45">Loiret</option><option value="46">Lot</option><option value="47">Lot-et-Garonne</option><option value="48">Lozère</option><option value="49">Maine-et-Loire</option><option value="50">Manche</option><option value="51">Marne</option><option value="972">Martinique</option><option value="53">Mayenne</option><option value="976">Mayotte</option><option value="54">Meurthe-et-Moselle</option><option value="55">Meuse</option><option value="56">Morbihan</option><option value="57">Moselle</option><option value="58">Nièvre</option><option value="59">Nord</option><option value="60">Oise</option><option value="61">Orne</option><option value="75">Paris</option><option value="62">Pas-de-Calais</option><option value="63">Puy-de-Dôme</option><option value="64">Pyrénées-Atlantiques</option><option value="66">Pyrénées-Orientales</option><option value="974">Réunion</option><option value="69">Rhône</option><option value="71">Saône-et-Loire</option><option value="72">Sarthe</option><option value="73">Savoie</option><option value="77">Seine-et-Marne</option><option value="76">Seine-Maritime</option><option value="93">Seine-Saint-Denis</option><option value="80">Somme</option><option value="81">Tarn</option><option value="82">Tarn-et-Garonne</option><option value="90">Territoire de Belfort</option><option value="95">Val-d'oise</option><option value="94">Val-de-Marne</option><option value="83">Var</option><option value="84">Vaucluse</option><option value="85">Vendée</option><option value="86">Vienne</option><option value="88">Vosges</option><option value="89">Yonne</option><option value="78">Yvelines</option>                    </select>
    <br>

    <label>Age minimum</label> <br>

    <input class="age_min_search" type="number" name="age_min"> <br>

    <label>Age maximum</label> <br>

    <input class="age_max_search" type="number" name="age_min"> <br>


<label>Pseudo</label> <br>

<input class="pseudo_search" type="text"> <br> <br>

<button class="btn_submit">Enregistrer</button>



    </form>

</div>

</div>
    


</nav>


<header>


</header>


<?php include 'includes/search.php'; ?> <!-- Bar de recherche -->

<div class="container" js-filter>
    <div class="row">
        <div class="col-md-3" js-filter-form>
            
        </div>
    </div>
</div>




<section class="hero_index">

    <?php foreach ($articles as $articles) : ?>

        <?php
        $reqdpt = $bdd->prepare("SELECT *
                         FROM departement
                         WHERE departement_code = ?");
        $reqdpt->execute([$articles['departement_nom']]);
// RECUPERE LES DONEES 
        $departement = $reqdpt->fetch();

        $reqville = $bdd->prepare("SELECT *
                         FROM villes_france
                         WHERE ville_id = ?");
        $reqville->execute([$articles['ville_id']]);
// RECUPERE LES DONEES 
        $ville = $reqville->fetch();
        ?>


        <div class="container_profil_membre">
            <a href="profil.php?id=<?= $articles['id'] ?>">


                <div class="container_profil_info">


                    <div class="container_profil_avatar">
                        <?php
                        if (str_contains($articles['avatar'], 'https')) { ?>
                            <img src="<?php echo $articles['avatar']; ?>" alt="photo_profil"><br>
                            <?php
                        } else {
                            ?>
                            <img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil"><br>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="container_profil_info_pseudo">
                        <h2><?php echo $articles['pseudo'] ?>
                            <span class="age_profil_membre"><?php echo $articles['age'] ?></span></h2>

                        <div></div>
                    </div>

                </div>

                <!-- info profil -->

                <div class="info_profil_pseudo&nom_dpt">

                    <div class="dpt_age">

                        <div class="container_profil_info_dtp">

                            <?php
                            if ($reqdpt->rowCount() > 0) {
                                echo $departement['departement_nom'] . '(' . $articles['departement_nom'] . ') - ';
                            }

                            if ($reqville->rowCount() > 0) {
                                echo $ville['ville_nom_reel'];
                                echo '</span>';
                            } else {
                                echo '</span>';
                            }

                            ?>
                        </div>


                    </div>


                    <div class="container_profil_info_descr">
                        <?php echo $articles['description_profil'] ?>
                    </div>

                </div>


            </a>
        </div>


    <?php endforeach; ?>


</section>


</body>

    <script>

const menuHamburger = document.querySelector(".menu_humb_nav")
        const navLinks = document.querySelector(".nav-links")
 
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('mobile-menu')
        })
        
    </script>
<script src="js/modal.js"> </script>


</html>