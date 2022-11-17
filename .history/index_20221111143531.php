<?php
require 'signupAction.php';
?>

<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="assets/index.css">
<link rel="stylesheet" href="assets/FormSignup.css">

<head>
<!-- Google tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-240853356-1"></script>
<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-240853356-1');</script>

<TITLE>Rencontre gratuite</TITLE>

<META NAME="DESCRIPTION" CONTENT="10.738 femmes en ligne actuellement, venez chatter avec gratuitement. 
chanderland le premier chate en ligne. tchater et voir des profils gratuitement."/>

    <!-- Icon -->
<link rel="apple-touch-icon" sizes="180x180" href="icones/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="icones/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="icones/favicon/favicon-16x16.png">
<link rel="manifest" href="icones/favicon/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#444444">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">
    <!-- Icon -->

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>
<style>@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8Q7JX5"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->


<header class="title_section_signup">


<h1>Chanderland, rencontre gratuite</h1>

    
<div style="margin: auto;" class="img_index">

<img src="icones/Chanderland_logo.svg" style="width: 100%;"  alt="logo_chanderland.com" srcset="">
</div>
<h3></h3>


</header>
  

<div style="text-align: center;" class="cont_beta">
<img class="img_beta" src="icones/Version_beta.svg"  alt="image_chanderland" srcset="">

</div>

<section class="section_signup">
    




        <div class="box">

            <form style="text-align: center;" method="POST" enctype="multipart/form-data">

                    <input type="text" name="pseudo" maxlength="10" minlength="3" placeholder="Pseudo"
                           value="<?php if (isset($pseudo)) {
                               echo $pseudo;
                           } ?>"/>

                    <input type="number" name="age" placeholder="Age" maxlength="2"> <br> <br>


                    <label>Vous êtes</label> <br>
                    <select name="sexe" class="form-control">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>

            <div id="departement">
                    <select id="select_departement" name="departement" required>
                        <option value="">Département</option>
                        <?php
                        // On récupère tous les départements triés par ordre alphabétique
                        $req_selectDepartements = $bdd->query('SELECT departement_code, departement_nom FROM departement ORDER BY departement_nom ASC');

                        // On boucle sur les départements
                       foreach ($req_selectDepartements->fetchAll() as $departement) {
                          echo '<option value="' . $departement['departement_code'] . '">' . $departement['departement_nom'] . '</option>';
                        }
                   ?>
                    </select>
                </div>

               
                <div id="ville" style="display: none;">
                    <select id="select_ville" name="ville_id" required></select>
                </div> 
                

                    <input type="email" name="mail" placeholder="Mail" value="<?php if (isset($mail)) {
                        echo $mail;
                    } ?>">
                

                    <input type="password" minlength="5" name="password" placeholder="Mot de passe">


                    <input type="password" minlength="5" name="password2" placeholder="Confirmation passe">

                <button type="submit" class="button_form" name="validate" value="Senregistrer">S'inscrire</button>

                <div class="lien_compte_user">
                <a class="login_signup" href="connexion.php"><p>J'ai déjà un compte, <strong>je me connecte</strong> </a> <br>
                </div>

            </form>



            <div style="text-align: center ;">
<?php

if (!empty($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET OU ERREUR 
{
    echo '<font color="red">' . $erreur . "</font>";

}
?>

        </div>
        </div>
        





<article>


<div class="index_container">


    <img class="img_femme_chanderland" src="icones/chanderland_femme.svg" alt="photo_femme_chanderland">


<div>
<h2>Comment faire des rencontres rapides ? <h2>

    <p>
    Rejoignez chanderland et profitez gratuitement d'une messagerie pour <strong> faire des rencontres rapides.</strong><br>
    Découvrez les profils autour de chez vous et envoyé des messages gratuitement. <br> 
    Chanderland est un site de rencontres ultra simples à prendre en main.
    </p>
</div>
</div>


    <div class="index_container">

    <img class="search_chanderland" src="icones/chanderland_search02.svg" alt="chanderland_profil">

    
    <div>
    <h2>Utilisez les filtres de recherche puissant</h2>
 
  <p>

  Sur chanderland, nous vous proposons gratuitement un filtre de recherche puissant <br> 
  pour maximiser vos chances de <strong>rencontrer la bonne personne.</strong> </p>

    </div>
    </div>


<div class="index_container">

    <img class="img_femme_chanderland" src="icones/chanderland_membres.svg" alt="photo_femme_chanderland">

<div>

<h2>Et découvrez des milliers de profils<h2>

    <p>

    Inscrivez-vous gratuitement et découvrez des milliers de profils proches de chez vous pour discuter et faire des <strong>rencontres coquines.</strong> 
    
    </p>

</div>

</div>


<div class="index_container">
<h2>Puis tchater gratuitement</h2>

<p> 
 Rencontrez des gens de votre choix,
 partagez des photos et envoyez des messages. <br>
 Le tout, <strong>gratuitement</strong> ! <br>
 C'est sans doute le meilleur moyen d'agrandir son cercle d'amis <br>
 et <strong>rencontrer de nouvelles personnes</strong> 
 sympathiques. <br>
De quoi faciliter les rencontres !
</div>


</article>










<?php include 'includes/footer.php'  ?>









<!-- animation letter-->
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script src="js/app_letter.js"></script>
    

</body>

</html>

<!-- ON RAJOUTE JQUERY A LA FIN DU FICHIER -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
</script>

<script src="js/index.js"></script>