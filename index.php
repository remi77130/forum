<?php
require 'signupAction.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>

<link rel="stylesheet" href="assets/index.css">
<link rel="stylesheet" href="assets/compteur.css">



<!-- Google tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-240853356-1"></script>
<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-240853356-1');</script>
<TITLE>Rencontre gratuite</TITLE>

<META NAME="DESCRIPTION" CONTENT="Chat sans inscription. Sans email. Venez chater sans inscrire votre email. "/>
<meta name="robots" content="index, follow, all">
<meta name="keywords" content="chate en ligne">


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

  
<h3></h3>


</header>
  

<div style="text-align: center;" class="cont_beta">
<img class="img_beta" src="icones/Version_beta.svg"  alt="image_chanderland" srcset="">

</div>


<div class="login-page">
<div class="form">

<form class="register-form"method="POST" action="">
    <input type="text" name="pseudo" maxlength="10" minlength="3" placeholder="Pseudo"
            value="<?php if (isset($pseudo)) {
            echo $pseudo;} ?>" />


    <input type="tel" pattern="[0-9]*" inputtype="numeric" name="age" placeholder="Age" 
           maxLength="2" minlength="1" />

    <label>Vous êtes</label> <br>

    <select name="sexe" >
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
                

                  <!--  <input type="email" name="mail" placeholder="Mail" value="<//?//php// if (isset($mail)) {
                       // echo $mail;
                  //  } ?>"--> 
                  

    <input type="password" minlength="5" name="password" placeholder="Mot de passe">
    <input type="password" minlength="5" name="password2" placeholder="Confirmation passe">


    <button type="submit" name="validate" value="Senregistrer">S'inscrire</button>

       
    <p class="message">M'enregistrer <a href="#">Sign In</a></p>

    <?php

if (!empty($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET OU ERREUR 
{
    echo '<font color="red">' . $erreur . "</font>";

}
?>

    </form>  <!-- Fin formulaire inscription -->

    <form class="login-form" method="POST" action="">
    <input autocomplete="username" id="login__username" 
            type="text" name="pseudoconnect" class="form__input" 
            placeholder="Pseudo" required>      
    <input id="login__password" type="password" name="mdpconnect" class="form__input" 
    placeholder="Password" required>

    <input type="submit" name="formconnexion" value="Connexion">
    <p class="message">Non enregistré ? <a href="#">Creer un compte</a></p>

</div>


    </form>

</div>
</div>



            <div style="text-align: center ;"> 
<?php

if (!empty($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET OU ERREUR 
{
    echo '<font color="red">' . $erreur . "</font>";

}
?>

        </div>
        </div>
        

   <div>
        <h3>On a voulu faire autrement</h3>

        <p>Sur la pluspart des site de rencontre on ne sait pas vraiment par quoi commencé pour lancé la discution. <br>
        Aujourd'hui il est incenssé de commencé une phrase ' par un salut ça va ? ' il faut sortir de l'ordinaire et être rapide car plusieur personne sont potentielement aussi en train de discuter avec la même personne. <br>
        Etre rapide et sortir de l'ordinaire est difficile surtout si il faut payer pour envoyer un message.
        c'est pour cela qu'on a mis en place un systéme de 'Boutton d'envie' qui vous permet de vous démarquer en partagant ce que vous avez envie de faire à l'instant present <br>
        Avec ce systéme vous n'avez plus a refléchir comment lancé la discution car c'est vous qui avez déja proposer quelques chose que vous aimeriez faire <br>
        Pour votre futur partenaire cela l'arrange beaucoup car il sait de quoi vous avez envie. <br>Vous n'avez plus cas attendre les messages des autre membres qui souhaite partager cet evenement avec vous. <br>
        Mais atention les evenement ne dure que 30 minute donc reste connecter pour voir les nouvelle envie dans votre secteur. <br>
        Qui sait peut etre qu'une personne prés de chez vous auras envie de boire un verre ou voir un film pourquoi allez le voir ensemble..


     </div>

<div class="b01"> 


<div class="adv"> <h3>Que voulez vous faire aujourdhui ?</h3>
    <img src="icones/chat-gratuit-notificationsvg.svg" alt="" srcset=""> 
<p>Boire un verre ? Allez courir ? une rencontre rapide ? <br>
     Dite le simplement puis attendez les propositions.</p>
<div class="cont_not">
        <h3 class="text-3xl font-bold">Chat discret</h3>
                <img src="icones/chat-gratuit-notificationsvg.svg" style="width: 50px;" alt="chat-en-ligne" class="w-8">

        <p>Profitez d'une conversation très discrète pour des rencontres sans stress.<br><br>
        Nous avons désactivé le système de notification pour que vous puissiez faire des rencontres sans être dérangé par des notifications quand vous recevez un message. <br>
        <span style="text-decoration: underline;">Même si votre portable est en mode sonnerie.</span></p>

        <a class="lien_inscription" href="#form">M'inscrire gratuitement</a>
    </div> <!-- cont_not -->


    
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

<img class="img_femme_chanderland" src="icones/chat-gratuit.svg" alt="photo_femme_chanderland">

<h2>Puis tchater gratuitement</h2>

<p> 
 Rencontrez des gens de votre choix,
 partagez des photos et envoyez des messages. <br>
 Le tout, <strong>gratuitement</strong> ! <br>
 C'est sans doute le meilleur moyen d'agrandir <br> 
 son cercle d'amis et <br> 
 <strong>rencontrer de nouvelles personnes</strong> 
 sympathiques. <br>
 De quoi faciliter les <strong>rencontre.</strong>
</div>


</article>




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




<!-- animation letter-->
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script src="js/app_letter.js"></script>
    

</body>

</html>

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