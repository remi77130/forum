<?php
require 'signupAction.php';
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/index.css">
<link rel="stylesheet" href="assets/FormSignup.css">

<head>
<!-- Google tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-240853356-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-240853356-1');
</script>

    <TITLE>Chanderland, rencontre gratuite</TITLE>

    <META NAME="SUBJECT"
          CONTENT="chanderland pour discuter en live , rencontres et discussion avec chanderland le meilleur tchat de france"/>
    <META NAME="ABSTRACT" CONTENT="Chat gratuit chanderland">
    <META NAME="KEYWORDS"
          CONTENT="chanderland, chat, chat gratuit,coco chat, tchat, chanderland chat, tchat gratuit, 
          chanderland, rencontre discrete, rencontre rapide femme, paris, rencontre rapide, coco rencontre."/>
    <META NAME="DESCRIPTION" CONTENT="Sur chanderland venez tchater et découvrir des profils proches de chez vous et faites des rencontres coquines. 
    Inscription rapide pour discuter avec des milliers de connectés.  "/>

    <META NAME="REVISIT-AFTER" CONTENT="2 DAYS"/>
    <meta http-equiv="cache-Control" content="no-cache, must-revalidate">

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


<h1>
Rencontre gratuite
</h1>

    
<div style="margin: auto;" class="img_index">

<img src="icones/Chanderland_logo.png" style="width: 100%;"  alt="logo_chanderland.com" srcset="">
</div>
<h3></h3>


</header>
  

<div class="cont_beta">
<img class="img_beta" src="icones/Beta_version.png" alt="" srcset="">

</div>

<section class="section_signup">
    




        <div class="box">

            <form style="text-align: center;" method="POST" enctype="multipart/form-data">

                    <input type="text" name="pseudo" maxlength="10" minlength="3" placeholder="Pseudo"
                           value="<?php if (isset($pseudo)) {
                               echo $pseudo;
                           } ?>"/>

                    <input type="number" name="age" placeholder="Age">

                    <select name="sexe" class="form-control">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>

           <!-- <div id="departement">
                    <select id="select_departement" name="departement" required>
                        <option value="">Département</option>
                        <?php
                        // On récupère tous les départements triés par ordre alphabétique
                   //     $req_selectDepartements = $bdd->query('SELECT departement_code, departement_nom FROM departement ORDER BY departement_nom ASC');

                        // On boucle sur les départements
                      // foreach ($req_selectDepartements->fetchAll() as $departement) {
                          //  echo '<option value="' . $departement['departement_code'] . '">' . $departement['departement_nom'] . '</option>';
                      //  }
                   // ?>
                    </select>
                </div>-->

               
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
                    <a class="login_signup" href="connexion.php"><p>J'ai déjà un compte, <span
                                    class="span_login_signup"> je me connecte</span></p></a> <br>
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


    <img class="img_femme_chanderland" src="icones/profil_chanderland.png" alt="photo_femme_chanderland">


<div>
<h2>Comment faire des rencontres rapides ? <h2>

    <p>
    Rejoignez chanderland et profitez gratuitement d'une messagerie pour faire des rencontres rapides.<br>
    Découvrez les profils autour de chez vous et envoyé des messages gratuitement. <br> 
    Chanderland est un site de rencontres ultra simples à prendre en main.
    </p>
</div>
</div>



    <div class="index_container">

    <img class="search_chanderland" src="icones/filtre_chanderland.png" alt="chanderland_profil">

    
    <div>
    <h2>Utilisez les filtres de recherche</h2>
 
  <p>

  Sur chanderland, nous vous proposons gratuitement un filtre de recherche <br> 
  pour maximiser vos chances de rencontrer la bonne personne.</p>

    </div>
    </div>






<div class="index_container">

    <img class="img_femme_chanderland" src="icones/membre_chanderland.png" alt="photo_femme_chanderland">

<div>

<h2>Découvrez des milliers de profils<h2>

    <p>

    Inscrivez-vous gratuitement et découvrez des milliers de profils proches de chez vous pour discuter et faire des rencontres coquines.
    
    </p>

</div>

</div>


<div class="index_container">

<img class="icon_chanderland" src="icones/subscription_icone/fire02.svg" alt="photo_femme_chanderland">
<img class="icon_chanderland" src="icones/subscription_icone/text_subscription.svg" alt="photo_femme_chanderland">

<div>

<h2>Placer une icône près de votre pseudo pour vous démarquez <h2>

    <p>
    Souscrivez a un abonnement à 9,90€/mois pour vous dermarquez des autres membres. <br> 
    Vous ne passerez plus inaperçu.
    </p>

</div>

</div>











</article>



<!--
<footer>

<div class="container_footer">


<div class="lien">
    <a href="aide.php">Aide</a>

</div>

</div>

</footer>


-->


</section>










<!-- animation letter-->
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script src="app_letter.js"></script>
    

</body>

</html>

<!-- ON RAJOUTE JQUERY A LA FIN DU FICHIER -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
</script>

<script type="text/javascript">

    // Le .ready est obligatoire pour pouvoir faire un script jQuery
    $(document).ready(function () {

        // Si une modification est faite sur le département
        $('#select_departement').on('change', function () {

            departement_code = $(this).val()

            // S'il y a une donnée dans le département
            if (departement_code != "" && departement_code != undefined) {

                // On récupère le département sélectionnée et on fait une requête Ajax 
                // pour récupérer les villes qui correspondent

                // On utilise getJSON (qui est un équivalent d'Ajax 
                // mais correspond mieux pour cette requête)
                
                $.getJSON('./get_villes_from_departement.php', {departement_code: departement_code}, function (villes) {

                    options = ['<option value="">Sélectionner la ville...</option>']

                    // On parcourt les villes reçues
                    $.each(villes, function( index, ville ) {

                        // On rajoute l'option
                        options.push('<option value="' + ville.ville_id + '">' + ville.ville_nom_reel + '</option>');
                    });

                    // On affiche les options dans le formulaire
                    $("#select_ville").html(options.join()) // La méthode permet de rendre notre tableau en string

                    // On affiche le champ
                    $("#ville").show();
                });
            }
        })
    });
</script>