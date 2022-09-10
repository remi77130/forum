<?php
require 'signupAction.php';
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/index.css">
<link rel="stylesheet" href="assets/FormSignup.css">

<head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W8Q7JX5');</script>
    <!-- End Google Tag Manager -->


    <TITLE>Chanderland, chat gratuit</TITLE>

    <META NAME="SUBJECT"
          CONTENT="chanderland pour discuter en live , rencontres et discussion avec chanderland le meilleur tchat de france"/>
    <META NAME="ABSTRACT" CONTENT="Chat gratuit chanderland">
    <META NAME="KEYWORDS"
          CONTENT="chanderland, chat, chat gratuit, tchat, chanderland chat, tchat gratuit, chanderland"/>
    <META NAME="DESCRIPTION" CONTENT="chanderland est le premier chat gratuit de France : tchater et voir des profils.
le chat avec inscription rapide pour discuter avec des milliers de connectés "/>

    <META NAME="REVISIT-AFTER" CONTENT="2 DAYS"/>
    <meta http-equiv="cache-Control" content="no-cache, must-revalidate">
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


<div class="title_section_signup">
    <h2>Faite de nouvel <span> connaissance</span> <br></h2>
</div>

<div style="text-align: center; padding-top:20px;">
    
    <p style="font-size:12px; margin-bottom:20px;">Site en cours de développement</p>
</div>

<section class="section_signup">

    <div class="parent_form_signup">

        <div class="box">

            <form style="text-align: center;" method="POST" enctype="multipart/form-data">

                <div>
                    <input type="text" name="pseudo" maxlength="10" minlength="3" placeholder="Pseudo"
                           value="<?php if (isset($pseudo)) {
                               echo $pseudo;
                           } ?>"/>
                </div>

                <div>
                    <input type="number" name="age" placeholder="Age">
                </div>

                <div>
                    <select name="sexe" class="form-control">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </div>

                
                <div>
                    <input type="email" name="mail" placeholder="Mail" value="<?php if (isset($mail)) {
                        echo $mail;
                    } ?>">
                </div>
                

                <div>
                    <input type="password" minlength="5" name="password" placeholder="Mot de passe">
                </div>


                <div>
                    <input type="password" minlength="5" name="password2" placeholder="Confirmation passe">
                </div>

                <button type="submit" class="btn btn-primary" name="validate" value="S\'enregistrer">S'inscrire</button>


                <div class="lien_compte_user">
                    <a class="login_signup" href="connexion.php"><p>J'ai déjà un compte, <span
                                    class="span_login_signup"> je me connecte</span></p></a> <br>
                </div>

            </form>

        </div>

    </div> <!--form_signup -->


    <?php
    if (isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
    {
        echo '<font color="red">' . $erreur . "</font>";

    }
    ?>

</section>


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