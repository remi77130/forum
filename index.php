<?php
require 'signupAction.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>

<link rel="stylesheet" href="assets/index.css">
<link rel="stylesheet" href="assets/compteur.css">


<!-- Google Tag Manager (noscript) -->
<noscript>
<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8Q7JX5"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Google tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-240853356-1"></script>
<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-240853356-1');</script>
<TITLE>Rencontre gratuite</TITLE>

<META NAME="DESCRIPTION" CONTENT="Chat sans inscription. Sans email. Venez chater sans inscrire votre email. "/>
<meta name="robots" content="index, follow, all">
<meta name="keywords" content="rencontre gratuite, chate en ligne, tchatche france, rencontre gratuite, tchat france">


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

    <!--Partage -->
    <meta property="og:image" content="icones/1.svg" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="Chat sans inscription gratuit" />
    <meta property="og:local" content="fr_FR" />
    <meta property="og:TITLE" content="Chanderland rencontre" />


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="chanderland.com" />
    <meta name="twitter:creator" content="@chanderland" />
    <meta name="twitter:title" content="Chanderland un nouveau site de chat sans inscription" />
    <meta name="twitter:description" content="Venez chater avec un simple pseudo" />
    <meta name="twitter:image" content="icones/1.svg" />

    <style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
    </style>
    <style>@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
    </style>
    
</head>

<body>






<header id="form" class="title_section_signup">



<h1> Rencontre gratuite </h1>

  
<h3></h3>




<div style="text-align: center;" class="cont_beta">
<img class="img_beta" src="icones/Version_beta.svg"  alt="image_chanderland" srcset="">

</div>






<div class="login-page">

<div class="form">
    
<div class="nbr_user_connect_index">

<p><img class="svg_nmb" src="icones/connect_svg_green.svg">
<span class="nbr" id="number"> <br>
</span> membres connectés actuellement</p>

</div>

    

<form class="register-form"method="POST" action="">
    <input class="u" type="text" name="pseudo" maxlength="10" minlength="3" placeholder="Pseudo"
            value="<?php if (isset($pseudo)) {
            echo $pseudo;} ?>" />


    <input class="u" type="tel" pattern="[0-9]*" inputtype="numeric" name="age" placeholder="Age" 
           maxLength="2" minlength="1" />

    <label>Vous êtes</label> <br>

    <select class="h_f_select" name="sexe" >
    <option value="Homme">Homme</option>
    <option value="Femme">Femme</option>
    </select>

<div id="departement">

    <select id="select_departement" name="departement" required>
    <option value="">Département </option>
        <?php
            // On récupère tous les départements triés par ordre alphabétique
            $req_selectDepartements = $bdd->query('SELECT departement_code, departement_nom FROM departement ORDER BY departement_nom ASC');

            // On boucle sur les départements
            foreach ($req_selectDepartements->fetchAll() as $departement) {
            echo '<option value="' . $departement['departement_code'] . '">' . $departement['departement_nom'] . '</option>';
            }?>

    </select>

                </div>

               
<div id="ville" style="display: none;">
    <select id="select_ville" name="ville_id" required>
    </select>
</div> 
                

 <input class="u" type="email" name="mail" placeholder="Mail" value="<?php if (isset($mail)) {
   $mail;
    } ?>">
                  

    <input class="u" type="password" minlength="5" name="password" placeholder="Mot de passe">
    <input class="u" type="password" minlength="5" name="password2" placeholder="Confirmation passe">


    <button class="submit_form" type="submit" name="validate" value="Senregistrer">S'inscrire</button>

       
    <p class="message"> J'ai déja un compte <a href="#">M'identifier</a></p>

<?php

if (!empty($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET OU ERREUR 
{
    echo '<font color="wheat">' . $erreur . "</font>";

}
?>



    </form>  <!-- Fin formulaire inscription -->

    <form class="login-form" method="POST" action="">
    <input class="u" autocomplete="username" id="login__username" 
            type="text" name="pseudoconnect" class="form__input" 
            placeholder="Pseudo" required>      
    <input class="u" id="login__password" type="password" name="mdpconnect" class="form__input" 
    placeholder="Mot de passe" required>

    <input class="submit_form" type="submit" name="formconnexion" value="Connexion">
    <p class="message">Pas de compte ? <a href="#">Créer un compte</a></p>

</div>


    </form>

</div>
</div>



            <div style="text-align: center ;"> 
<?php

if (!empty($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET OU ERREUR 
{
    echo '<span>' . $erreur . "</span>";

}
?>

        </div>
        
        </div>


        
        <div class="advantage_1">

           <h3>30 minutes pour trouver un partenaire</h3>

           <div class="btn_container">
           <div><button class="btn_choix_index">Boire un verre</button></div>
            <div><button class="btn_choix_index">Faire une rencontre</button></div>
            <div><button class="btn_choix_index">Allez courir</button></div>
            <div><button class="btn_choix_index">Voir un film</button></div>
            </div>

           <p>Toutes les 30 minutes, vous pouvez activer des options gratuites pour dire ce que vous souhaitez faire <br>
            comme allez courir, faire une rencontre ou encore allez boire un verre.<br>

            En bref, quand vous proposez une activité, votre profil apparaît en tête du site afin d'être visible <br>
            par tous les membres.</p>
 
        </div>

</header>
        <article>
     


<div class="index_container">


    <img class="img_femme_chanderland" src="icones/chanderland_femme.svg" alt="photo_femme_chanderland">


<div>
<h2>Comment faire des rencontres rapides ? <h2>

    <p>
    Rejoignez chanderland et profitez gratuitement d'une messagerie pour <strong> faire des rencontres rapides.</strong><br>
    Découvrez les profils autour de chez vous et <strong> envoyé des messages gratuitement</strong>.<br> 
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

    <img class="img_femme_chanderland" src="icones/chat-gratuit_2.svg" alt="photo_femme_chanderland">

<div>

<h2>Des milliers de profils<h2>

    <p>

    Inscrivez-vous gratuitement et découvrez des milliers de profils proches de chez vous pour discuter et faire des <strong>rencontres coquines.</strong> 
    
    </p>

</div>

</div>


<div class="index_container">

<img class="img_femme_chanderland" src="icones/chat-gratuit.svg" alt="photo_femme_chanderland">

<h2>Tchater gratuitement</h2>

<p> 
 Rencontrez des gens de votre choix,
 partagez des photos et envoyez des messages. <br>
 Le tout, <strong>gratuitement</strong> ! <br>
 C'est sans doute le meilleur moyen d'agrandir <br> 
 son cercle d'amis et <br> 
 <strong>rencontrer de nouvelles personnes</strong> 
 sympathiques. <br>
 De quoi faciliter les <strong>rencontres.</strong>
</div>


</article>

        

   <div>
          <h3>Un site plus spontané</h3>

          <p>Sur la plupart des <strong>sites de rencontre</strong>, on ne sait pas vraiment par où commencer <br> 
          pour lancer la discussion.<br>
          Aujourd'hui, il est insensé voir même banal de commencer une phrase <br>
          par " Salut, ça va ? " <br> <br>

          Il faut sortir de l'ordinaire en étant original et spontané.<br>
          Car plusieurs personnes peuvent potentiellement être aussi en train de <strong>discuter</strong><br>
          avec la même personne ciblée que vous.<br>
          Être rapide et sortir de l'ordinaire est difficile de nos jours <br>
          surtout s'il vous faut payer pour envoyer un message...<br> <br>

          C'est pour cela qu'on a mis en place un système de (Bouton d'envie) qui vous permet de vous démarquer <br> 
          des autres membres en partageant à l'instant présent ce que vous avez envie de faire. <br>
          Ainsi, votre envie du moment peut également être l’envie de la personne d’en face. <br>
          Donc, <strong>la spontanéité</strong>, est ce qu'il vous faut ! <br>
          Avec ce système, vous n'avez plus à réfléchir à comment <strong>démarrer une discussion</strong> <br>
          car votre envie est déjà exprimée avec notre option. <br> <br>

          Pour votre futur <strong>partenaire</strong>, cela est un avantage, car il sait d’avance <br> 
          ce dont vous avez envie tout de suite.<br>
          Vous n'avez plus cas attendre les <strong>propositions</strong> des autres membres qui souhaitent <br>
          partager cet envie également. <br> <br>

          En revanche, vos propositions d’envies ne durent que <b>30minutes</b> <br> 
          donc veillez à rester connecté pour ainsi ne pas louper les nouvelles envies <br>
          publiées dans votre <strong>secteur</strong>. <br>
          Qui sait, peut-être, qu'une personne près de vous aura envie de <strong>boire un verre</strong> <br>
          ou d‘aller <strong>voir un filù</strong><br> 
          alors dans ce cas pourquoi ne pas y aller ensemble ? </p> <br>


    </div>

<div class="b01"> 


<div class="adv"> 
    <h3>Que voulez vous faire aujourdhui ?</h3> <br>


<p class="p_advantage">
    <img src="icones/alcool.svg" alt="icone alcool">Boire un verre ?<br>
    <img src="icones/film.svg"  alt="icones film"> Allez voir ce dernier film à la mode ? <br> 
    <img src="icones/heart.svg" alt="icone heart"> Ou bien une rencontre toride ? <br>
</p> <br>
<h4>Proposez-le simplement puis attendez les propositions.</h4> <br>



<h3>Les rencontres spontanées</h3>

<p>Sont celles qui se produisent sans qu'on ne s’y attendent à l'avance. <br>
Cela correspond à des <strong>rencontres</strong> fortuites, c'est-à-dire des <strong>rencontres</strong> <br> 
qui se produisent par hasard ou alors des <strong>rencontres</strong> qui résultent <br> 
d'une décision prise sur un coup de tête. <br>
Ces <strong>rencontres</strong> spontanées peuvent être très gratifiantes <br> 
parce qu'elles nous permettent de sortir <br>
de notre routine et de découvrir ainsi de nouvelles personnes et de nouvelles expériences <br>
mais elles peuvent également, nous ouvrir à de nouvelles perspectives <br> 
et ainsi nous permettre de prendre des risques. <br> <br>

Cependant, il est important d'être vigilant et de prendre certaines précautions<br>
en particulier quand vous rencontrez spontanément quelqu'un <br> 
que vous ne connaissez pas. <br>
Il est conseillé de se renseigner sur la personne que l’on va rencontrer afin <br> 
de s'assurer d’être en sécurité avant de partir à l'aventure. <br> <br>

C'est pour cela, que nous avons mis en place des <strong>fiches profils</strong> avec un minimum <br>
d'information, comme votre <strong>photo de profil</strong>, <strong>taille</strong>, <strong>âge</strong> ainsi <br>
qu’un système de commentaire sur chaque profil. <br> 
Cela permettra d'être averti si un profil est un <strong>profil fake</strong>ou non. <br>
En fin de compte, la spontanéité peut être une qualité très positive, mais il est également <br>
important de trouver un équilibre et de savoir à quel moment <br>
Il est approprié de la mettre en pratique. <br> </p> <br>



<div class="cont_not">
        <h3 class="text-3xl font-bold">Aucun profil fake</h3>
                <img src="icones/chat-gratuit-notificationsvg.svg" style="width: 50px;" alt="chat-en-ligne" class="w-8">

        <p>Profitez d'une <strong>conversation discrète</strong> pour <strong>des rencontres</strong> sans stress.<br><br>
        Nous avons désactivé le système de notification pour que vous puissiez faire <strong>des rencontres</strong> sans être dérangé par des notifications quand vous recevez un message. <br>
        Même si votre portable est en mode sonnerie.</p> <br>

      <span style="text-decoration: underline;"><a class="lien_inscription" href="#form">M'inscrire gratuitement</a></span>
</div> <!-- cont_not 


<div>
    <h3>Si vous êtes different montrer le</h3>
    <img src="icones/chat-gratuit-notificationsvg.svg" style="width: 50px;" alt="chat-en-ligne" class="w-8">

    <p>Que recherche une femme ? vous devez vous demarquez, vous deevez montrer que vous avez une situation stable. </p>
</div>


    
</div>





<!-- carrousel -->

<div class="pic-ctn">
    <img src="icones/1.svg" alt="" class="pic">
    <img src="icones/3.svg" alt="" class="pic">
    <img src="icones/4.svg" alt="" class="pic">
    <img src="icones/5.svg" alt="" class="pic">
    <img src="icones/6.svg" alt="" class="pic">
    <img src="icones/8.svg" alt="" class="pic">
  </div>













<?//php// include 'slider.php'; ?>



<?php include 'includes/footer.php'  ?>





</body>

</html>


<!-- animation letter-->
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script src="js/app_letter.js"></script>
    

<!-- ON RAJOUTE JQUERY A LA FIN DU FICHIER -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
</script>
<script src="compteur.js" ></script>


<script>
                        
var inputAge = document.querySelector('#age');

inputAge.onkeyup = function(e) {
    var max = 2; // The maxlength you want
  
    if(inputAge.value.length > max) {
      inputAge.value = inputAge.value.substring(0, max);
    }
  
};
</script>

<script src="js/index.js"></script>
<script>
    // afficher nmbr user connect 
function displayRandomNumber() {
    var randomNumber = Math.floor(Math.random() *25) + 534;
    document.getElementById("number").innerHTML = randomNumber;
  }
  displayRandomNumber();
</script>

<script src="https://www.google.com/recaptcha/enterprise.js?render=6LfCwOQjAAAAAMtmfY5Bo9IOXG7ftYbd5_5C-qjb"></script>
<!-- Recaptcha 
<script src="https://www.google.com/recaptcha/enterprise.js?render=6LeC8eMjAAAAABdU5QaRe3xMJJBaPPVzqIRV-B4o"></script>
<script src="js/index.js"></script>-->