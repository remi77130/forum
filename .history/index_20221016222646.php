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
    <META NAME="DESCRIPTION" CONTENT="chanderland est le premier chat gratuit de France : tchater et voir des profils.
le chat avec inscription rapide pour discuter avec des milliers de connectés.  "/>

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
    
<div style="margin: auto;" class="img_index">

<img src="icones/Chanderland_logo.png" style="width: 100%;"  alt="logo_chanderland.com" srcset="">
</div>
</h1>
<h3></h3>


</header>
  

<section class="section_signup">
    
<div class="cont_beta">
<img class="img_beta" src="icones/Beta_version.png" alt="" srcset="">

</div>



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
                    <a class="login_signup" href="connexion.php"><p>J'ai déjà un compte, <span
                                    class="span_login_signup"> je me connecte</span></p></a> <br>
                </div>

            </form>

        </div>





<article>


<div class="index_container">


    <img class="img_femme_chanderland" src="icones/profil_chanderland.png" alt="photo_femme_chanderland">


<div>
<h2>Comment faire des rencontres rapides ? <h2>

    <p>
    Rejoignez chanderland et profitez gratuitement d'une messagerie pour faire des rencontres rapides.<br>
    Découvrez les profils autour de vous et envoyé des messages gratuitement. <br> 
    Chanderland est un site de rencontres ultra simples à prendre en main.
    </p>
</div>
</div>



    <div class="index_container">

    <img class="search_chanderland" src="icones/filtre_chanderland.png" alt="chanderland_profil">

    
    <div>
    <h2>Porquoi faire ?</h2>
 
    <p>
        hviuzviz eczkjbié kvbzj vkeébvj vkj"é
    </p>

    </div>
   
    </div>






    <div class="index_container">


    <img class="img_femme_chanderland" src="icones/membre_chanderland.png" alt="photo_femme_chanderland">


<div>
<h2>Comment faire des rencontres rapides ? <h2>

    <p>
    Rejoignez chanderland et profitez gratuitement d'une messagerie pour faire des rencontres rapides.<br>
    Découvrez les profils autour de vous et envoyé des messages gratuitement. <br> 
    Chanderland est un site de rencontres ultra simples à prendre en main.
    </p>
</div>
</div>







</article>




<footer>

<div class="container_footer">
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur commodi officia, et voluptate soluta omnis totam ea provident velit iusto veritatis ducimus facere placeat reiciendis, nobis quo, hic beatae nulla.
    Nemo temporibus harum quisquam soluta labore, consequuntur recusandae itaque sed, dignissimos molestiae exercitationem, reiciendis corrupti. Eius quibusdam tempora consequatur fuga! Commodi quos rerum dolores, eum iure ipsum totam quasi suscipit?
    Ipsa accusamus nostrum fugit cumque nemo. Porro voluptatem sed quisquam, sint maxime odit culpa, molestiae ipsa quia quam saepe atque corporis sit, dolorum eaque incidunt et consequuntur non vel provident.
    Aspernatur asperiores doloribus culpa commodi sequi modi odit numquam vero delectus obcaecati omnis, provident molestias vel blanditiis quia porro accusamus vitae. Impedit, dignissimos? Voluptates inventore facere iusto vero dolor. Aspernatur.
    Omnis minima maiores consequuntur eum, alias est aliquam aliquid beatae a. Nostrum voluptas dolorem, explicabo eligendi iusto doloribus itaque incidunt cupiditate. Aspernatur quidem voluptatum excepturi molestias eum, a qui atque?
    Odit ab culpa rerum minima, quas quis similique fuga corrupti! Ipsa, est! Debitis suscipit quis perspiciatis obcaecati, eaque ad ea illo fugit commodi natus beatae iusto harum vero aspernatur id!
    Optio quod et, numquam ad voluptates quaerat placeat dolor beatae alias eveniet dicta atque repellendus tempore sequi. Asperiores repellat tenetur qui, inventore dolorem sint modi sit rerum? Dolores, consequatur est?
    Ab ipsum, harum quod et nisi eum provident mollitia, perspiciatis repudiandae odit laudantium natus sit dignissimos. Accusamus obcaecati error excepturi praesentium saepe sed ea, rem quam ipsam perferendis voluptatibus omnis!
    Dolores vitae cum eligendi quae tempora? Quam harum aliquid ipsum cum, nesciunt velit perferendis expedita cumque voluptas? Mollitia corrupti eaque aut quod alias, accusamus recusandae atque quibusdam fuga odio itaque.
    Quia quas aut laudantium, labore sint veritatis. Sapiente tempora porro nam assumenda cumque doloribus veritatis illum, quis voluptatem eaque quos laboriosam magni dolore voluptate iure labore deleniti quidem! Veritatis, quas.
    Nihil aut autem rem magnam vero commodi enim. Qui similique officia veritatis facere nihil voluptatem culpa veniam! Iusto dignissimos aliquam nesciunt, distinctio nam, harum consequuntur voluptatum, ut ad illum ratione!
    Eligendi est magnam voluptate iste possimus, ullam accusantium numquam blanditiis aliquam non. Nesciunt quam ab illo officiis. Sunt, maiores blanditiis et ullam distinctio aperiam eaque? Placeat cum alias modi harum!
    Quidem molestias aliquam pariatur, consectetur cum nam numquam quae doloribus commodi fugit quisquam quod. Minima inventore autem amet nam, dolores itaque quaerat neque. Culpa nemo totam, temporibus reiciendis perspiciatis ducimus.
    Mollitia eligendi quasi perferendis saepe! Unde illo magni architecto quos placeat labore in explicabo atque quisquam laboriosam pariatur, quaerat quibusdam nisi dolorem illum laborum aut distinctio ipsum. Aliquid, deserunt suscipit.
    Obcaecati sit dolorum architecto explicabo atque repudiandae eos, nobis optio perferendis vel dolor officia libero repellat, maxime, harum incidunt? Sint numquam dolore repellat voluptatibus mollitia, dignissimos unde exercitationem delectus excepturi.
    Quis, quaerat rerum velit qui non quam dolorem itaque dolorum dolores reprehenderit saepe numquam ex natus ipsa soluta cupiditate minima hic? Repudiandae eaque nemo atque rem voluptas voluptate soluta! Earum.
    Eaque itaque dicta perferendis consequatur sapiente architecto rem esse numquam labore reprehenderit ab ipsam, ea laudantium nihil, saepe officiis maiores quas cupiditate? Dignissimos vel obcaecati maxime, iste fuga impedit veritatis!
    Unde architecto asperiores tenetur, totam molestiae nostrum repudiandae! Natus eligendi est deleniti? Cupiditate itaque odio beatae laborum, corporis tempore amet obcaecati repudiandae, quas quaerat aut explicabo doloribus quos, dicta aliquid!
    Quibusdam voluptate nam corrupti possimus, iste ipsam rem debitis reiciendis consequuntur repellendus veritatis nihil, similique commodi? Impedit maxime obcaecati aspernatur, quaerat omnis nemo quasi, molestiae reiciendis tempore facere eos accusamus.
    Officiis voluptate ad itaque dolores eius quae accusamus neque velit nemo quasi et veritatis, nulla quia hic optio animi magni tempora nihil corporis omnis recusandae. Recusandae reiciendis sint accusamus porro?
    Ullam, modi necessitatibus quas labore non voluptatem dolorem molestiae quidem cumque laboriosam, ad reiciendis quaerat, quos ea enim deserunt cum atque ratione fugiat exercitationem nesciunt accusantium magnam! Est, maxime consectetur?
    Earum, dolore incidunt ea culpa, perspiciatis neque ut ducimus doloremque corrupti sequi quo suscipit, aliquam reiciendis adipisci distinctio. Doloribus nostrum delectus mollitia non. Sapiente amet minima recusandae quibusdam tenetur animi.
    Neque illo odit eligendi, facilis at voluptatum repudiandae non error ea. Culpa, nulla! Voluptatibus ipsum natus est minus possimus, molestiae ad eaque, ut labore iusto neque ducimus. Rem, veritatis dolor.
    Ipsam sequi dolor cupiditate corrupti molestiae soluta minima, dolore, ut, est harum vitae illum consequuntur ea. Error praesentium perferendis quaerat, nulla vero nobis laudantium dolorum, cum quis numquam nam in.
    Molestias harum dolorem dicta distinctio eius, voluptatem maxime minima adipisci fugiat aut odit quidem aspernatur quia similique id? Provident et dolore ipsa quidem. Quae illo, laudantium asperiores ea in reprehenderit.
    Suscipit placeat eos et facilis. Maiores molestiae, provident voluptatem harum voluptatum ipsa temporibus hic quisquam! Ullam placeat quaerat esse consequuntur libero. Earum aspernatur beatae fugiat iusto eos laborum suscipit? Ratione!
    At cupiditate perspiciatis, incidunt consequuntur ratione ducimus voluptas esse quibusdam rem rerum exercitationem, officia in, quae hic. Cupiditate numquam ipsa nihil alias ad, praesentium perspiciatis, recusandae sequi veniam officiis reiciendis.
    Repudiandae, nemo exercitationem quisquam tempora dolorum facere nobis laudantium qui perferendis in consectetur labore dolores et, laboriosam animi. Voluptatem amet id dolor repellendus reiciendis quasi voluptas praesentium pariatur perspiciatis nesciunt?
    Ipsam repellendus quam tenetur velit minima facilis saepe architecto ratione sit ea soluta illo magni suscipit, reiciendis ducimus consectetur sequi. Magnam voluptates ducimus earum odio, culpa quam laudantium ipsam sint!
    Alias excepturi quam mollitia, explicabo quasi obcaecati cum debitis molestiae inventore minus sapiente omnis exercitationem ipsa, numquam veritatis tempora earum ipsum harum odio quas fuga at quis sequi. Reprehenderit, nihil!
    Impedit illo eum eos magni nihil vitae dolores sint dolor, autem ipsum, modi cum facere! Laborum atque ullam cumque vitae, veritatis perspiciatis qui labore beatae ducimus iusto ipsum nisi nihil.
    Aut cupiditate perferendis, ipsam sunt repellat sapiente et iusto amet corrupti modi rem, nulla saepe est explicabo debitis impedit voluptate dolorum asperiores rerum. Voluptatem temporibus earum hic tempora ab reiciendis!
    Quasi, neque corporis quia facere adipisci unde, debitis deserunt, vero consequatur architecto aliquam accusamus tempora dolorum numquam? Sit obcaecati culpa aperiam, odit, fugit commodi laboriosam consectetur harum laborum magnam enim.
    Necessitatibus quae ut quasi praesentium et nisi eveniet exercitationem facere obcaecati cupiditate ullam ex adipisci mollitia, accusantium vel odit iusto provident nostrum corrupti cum similique fugit. Amet ut esse debitis.
    Suscipit cumque impedit nam voluptates iste qui, reiciendis totam ea, laboriosam illo quis facilis alias veritatis odio nulla temporibus quidem a debitis nemo? Quaerat possimus fugit a libero. Quis, pariatur?
    Quia similique ullam tenetur aliquid dolorum sapiente labore animi neque quidem a. Quos rerum quo debitis, ipsam eveniet numquam beatae autem quisquam blanditiis quae veniam ullam quibusdam ea, corporis doloremque!
    Sint, nulla non atque eos harum necessitatibus voluptatum commodi corporis, nisi adipisci sunt dolorum cumque pariatur molestias qui dolor quidem, ut ea nihil ullam! Esse accusamus fugit sit eum ad?
    Asperiores, veritatis dolorem perspiciatis ut sapiente facilis provident ullam in dolore recusandae, officiis pariatur numquam nihil laboriosam repellat tenetur nam impedit nobis ducimus esse vitae saepe incidunt. Qui, dolores voluptate?
    Corporis dicta eius quis perspiciatis error esse amet quibusdam magni animi dolorem odio inventore voluptatibus mollitia eaque dolores soluta consequuntur numquam, adipisci tempora cupiditate quos possimus. Commodi illo fuga amet.
    Necessitatibus officiis ipsa officia quia assumenda aspernatur. Fugit error ipsam optio numquam, voluptatibus vitae repudiandae inventore repellat tempora asperiores harum voluptas voluptate, adipisci, doloribus ex quas! Obcaecati, quisquam! Quos, iure!
    Architecto perferendis commodi pariatur modi ut nam placeat blanditiis quod voluptas, quia a eaque facere vero quo laboriosam. Velit dicta voluptas corporis hic labore enim quasi, praesentium animi voluptate pariatur!
    Mollitia, autem dolorem? Voluptates repellendus dicta provident quaerat excepturi deserunt amet atque animi cupiditate laborum minima veniam, sequi optio consectetur esse quidem eum quod aliquam vel numquam vitae. Neque, laudantium.
    Deserunt saepe quas possimus fugiat officia a rerum mollitia error. Minima maiores veniam necessitatibus rem facere corporis eveniet facilis autem cumque explicabo illo sunt, culpa atque aliquid repellendus consequatur odio.
    Perspiciatis culpa molestias aperiam dolorum nulla repudiandae vel dignissimos maxime iste cupiditate excepturi, quae expedita ex neque voluptate earum unde aliquid, hic dolores praesentium nam voluptatibus sapiente. Ullam, ipsa inventore.
    Pariatur possimus, quis ipsum sapiente molestiae ab quia rerum saepe debitis earum ea mollitia libero corrupti dolorum aliquam vitae velit modi nostrum? Vero, nihil. At consequatur officia quo minima. Autem?
    Voluptatibus, vitae accusantium porro minus tempora incidunt dolorum eos rerum ipsa laudantium autem quidem corrupti officiis explicabo laboriosam impedit vel eaque reiciendis fuga, temporibus ab quo. Pariatur impedit soluta harum?
    Magni aperiam quae ipsum facere, commodi quidem hic magnam nihil suscipit odit mollitia consequuntur natus quod nobis? Ipsum voluptas non corrupti rem autem? Nesciunt quod, dignissimos commodi tempora voluptate ut?
    Quam architecto veritatis dolores consectetur iste similique tenetur eius quod amet voluptatem provident deleniti vero veniam illum natus at facilis soluta, sed rem repudiandae nesciunt voluptatibus? Accusamus facere explicabo hic!
    Odit illo, incidunt modi libero laudantium sint dignissimos perferendis neque dolore ipsam saepe fugit ullam quidem omnis deleniti voluptatibus distinctio perspiciatis eos autem vitae ex magni totam blanditiis eligendi! Corrupti.
    Obcaecati quidem ipsum, velit beatae minima debitis sapiente distinctio eaque pariatur. Iste officia aspernatur alias, magni, possimus minima vel temporibus accusantium illum eius aut autem tempora qui inventore ullam ex?
    Vel aspernatur labore aliquam, autem inventore beatae ducimus necessitatibus explicabo quis ex quisquam facere quas cupiditate, laudantium repellendus commodi. Minus nemo beatae recusandae hic labore. Magnam nobis culpa modi adipisci!
    A ducimus repellendus quaerat fugit assumenda iure commodi quasi culpa non rem dolores porro recusandae cupiditate similique hic, magnam molestiae nam dignissimos aut libero vel consequuntur eligendi dicta. Dolor, rem!
    Non a possimus voluptates? Architecto possimus ipsam at facere explicabo assumenda officiis recusandae voluptates, asperiores corrupti repellat amet excepturi numquam saepe eius ipsum, cum delectus est qui cupiditate aspernatur repellendus!
    Iusto assumenda unde voluptatem repudiandae temporibus ea eaque labore nesciunt amet quibusdam distinctio incidunt, enim itaque harum, inventore atque debitis minus esse nobis numquam laborum at voluptatibus. Suscipit, sunt illum.
    Dolorum debitis recusandae et assumenda odit soluta, rerum fuga culpa voluptates nulla voluptatem illo perferendis quam deleniti atque omnis eveniet natus! Officia, natus quo? Sapiente, magnam! Totam veniam corporis unde!
    Totam rerum, quas optio animi deleniti ratione eaque aliquid architecto quae atque quos, necessitatibus assumenda, debitis ipsa velit quod accusamus eius dolores ex molestiae distinctio! Magni odit voluptate vel ipsam.
    Dolore, tenetur voluptate consequuntur sit praesentium eos numquam delectus, ea, recusandae reprehenderit ab nobis cum veniam nesciunt. Nobis deleniti doloribus dolore maxime ex repellat et eveniet sapiente delectus, at repudiandae?
    Aut fugit eum consequatur ab modi numquam, ipsum alias voluptas eius maiores magnam omnis quos at sequi delectus dolorem, ipsam praesentium ratione tempora perspiciatis iure accusamus. Natus quod voluptates voluptatem.
    Sed, quibusdam blanditiis ipsum hic assumenda dignissimos consectetur quae mollitia molestiae dolores in minus, autem reiciendis, eum quidem asperiores? Veniam consequatur dolores nulla alias molestias expedita sint quos eaque! Odit?
    Officia aut adipisci quis quos minima facilis, exercitationem reiciendis nobis placeat. A, repellat odio. Autem accusamus qui excepturi molestias cum, sint commodi similique totam corrupti distinctio voluptate placeat, laudantium fugiat.
    Amet consectetur architecto doloribus minima, maiores, dolor molestiae sint, quam perferendis nobis iste modi perspiciatis neque saepe hic assumenda provident. Perspiciatis explicabo amet quidem at nostrum. Dolore ullam reprehenderit consequatur.
    Quod voluptates, pariatur voluptas necessitatibus at sunt, voluptatem porro eius illo error quis incidunt id labore distinctio? Libero, quo? Cupiditate soluta ad eos placeat! Dolores voluptates sunt laboriosam asperiores id?
    Odit commodi rem minima reprehenderit, fuga totam aliquid in voluptates, quisquam debitis nesciunt obcaecati magnam soluta cupiditate vitae dolore error quos tenetur molestiae sed vel autem eum? Hic, ea nobis?
    Expedita obcaecati quis mollitia repellat perferendis labore magnam illo numquam repudiandae quaerat! Dolorem magni modi fugiat a voluptas necessitatibus quibusdam odit provident odio, delectus nulla accusantium esse impedit, veniam unde.
    Eaque, maiores vero nostrum reiciendis pariatur quia repellendus, labore eius, ea impedit veniam eos animi sapiente et nam voluptas laboriosam aliquam iure fugiat deserunt! Optio cumque sequi doloribus tenetur ipsum.
    Explicabo non sequi nostrum, mollitia maxime harum tempora iste voluptatum voluptatibus ipsum sint quasi fugit dignissimos dicta perspiciatis debitis alias? Temporibus odit amet consequuntur quis, iusto repellendus culpa! Consequuntur, cumque.
    Pariatur odit exercitationem iusto praesentium similique vel ut excepturi tenetur aperiam temporibus magni natus nostrum vitae ea autem dolores inventore illum laudantium repellat tempore dicta, quibusdam non quidem! Illum, ab!
    Distinctio, natus, voluptate deleniti, minima soluta fugiat sequi maxime eaque ipsa nemo sit aperiam cumque qui quibusdam. Reiciendis id accusantium hic sint sunt voluptas fugit cum dolore! Officiis, corporis aperiam.
    Doloremque asperiores facilis quas nam, esse, eveniet non ipsam dolor ex natus veritatis! Laborum, fugit repudiandae cupiditate commodi sunt minima. Culpa id dolores ipsam eveniet, nostrum non deleniti quidem consequuntur.
    Quis hic neque voluptas iure assumenda sit nobis praesentium laboriosam excepturi necessitatibus minima, dolore atque dolorum quasi porro quae omnis sapiente vero rerum dignissimos similique. Unde vel alias a voluptatem!
    Illo temporibus mollitia, illum eveniet nobis ut nesciunt reprehenderit animi laboriosam dolorum est asperiores cumque consectetur officiis molestiae dignissimos? Asperiores possimus in laudantium vitae consectetur vero impedit magnam culpa porro.
    Ipsum, minima explicabo at, ipsam quod sint, et veritatis natus minus quis soluta repellat saepe provident excepturi. Facere perferendis illo ipsum? Odio perferendis id ratione beatae delectus sint dolorum cum.
    Reprehenderit at cum iste aliquid! Eligendi aut possimus architecto adipisci quas, commodi quam, alias ea dolores totam officiis itaque quibusdam cumque porro. Quia nemo architecto odio, vero obcaecati necessitatibus vitae?
    Sunt labore, doloremque repellendus consequuntur deleniti reprehenderit? Corporis vero quasi praesentium qui vitae autem dolores temporibus possimus illo ratione totam iusto eos, et odit iste porro suscipit tempore perferendis sapiente.
    Corporis mollitia maiores cum recusandae ipsam error numquam qui minima amet debitis in quibusdam veniam dicta quis repudiandae laudantium repellat et nisi vel delectus, officiis eius suscipit neque? Consequuntur, enim.
    Quaerat nobis ipsam ullam quod officia ad quas, et ab rem assumenda voluptatibus in asperiores, natus, explicabo fugit nisi deleniti quos iusto quam cupiditate necessitatibus distinctio nihil atque? Ab, nam?
    Sunt suscipit, necessitatibus est voluptate, fuga tempora recusandae voluptates temporibus vero nostrum totam pariatur odit culpa facere. Consequatur ducimus at doloribus temporibus, maxime placeat deserunt modi, unde accusamus vero magnam!
    Nemo, veritatis corporis repellat sunt provident, distinctio recusandae architecto similique quo sit nesciunt omnis expedita. Aut, placeat at non, ullam amet optio mollitia quo odio delectus maxime dignissimos explicabo molestias!
    Enim ipsa non porro culpa iure id atque, debitis laborum suscipit laboriosam saepe ut possimus veniam esse, doloremque itaque sint veritatis quasi rem. Quam voluptatum quasi consequuntur ut assumenda architecto!
    Iste, consequuntur eos nemo sunt consequatur amet aperiam illum. Quo ea pariatur, aperiam libero, accusamus quod a, modi facilis corrupti corporis saepe ipsum ad esse doloribus vel eius. Dicta, adipisci.
    Optio quos vitae voluptates dolorum eaque, nostrum assumenda, suscipit fugiat explicabo, odit veritatis quo eum ipsam quod officia. Repudiandae voluptates, tenetur aperiam consequatur a porro ipsum quo quis quibusdam sapiente?
    Laboriosam asperiores nesciunt, fugiat nulla sunt ex architecto aliquam! Nesciunt, qui. Odio quas ullam culpa qui voluptas eum suscipit praesentium velit sequi, totam, alias excepturi nulla architecto quos fugit. At.
    Repudiandae quasi iusto incidunt, maxime beatae nisi. Ducimus molestiae veritatis repellendus quam magni, illo facilis adipisci quasi reprehenderit eius quibusdam expedita iusto itaque neque eaque fugiat vel quis exercitationem porro.
    Quo fuga temporibus minus aliquid laborum. Fuga fugit amet molestias! Quo alias numquam, aliquid magni, nisi eos est nam aperiam iste harum provident repellendus, nostrum accusamus quia? Perspiciatis, excepturi eum.
    Eius repellat dignissimos necessitatibus, atque voluptatibus mollitia nobis vitae quaerat saepe in ab recusandae numquam, laboriosam deserunt aut fugit accusamus error culpa harum. Odio sapiente commodi id accusamus deserunt voluptatum!
    Voluptatum rem nulla facere corrupti nostrum, voluptatibus officia dolore, eaque assumenda culpa ad. Hic optio itaque, ut ducimus explicabo illum repudiandae? Nam accusantium quibusdam alias error omnis accusamus vitae unde.
    Inventore iste nihil delectus illum alias obcaecati earum similique et hic. Ut pariatur deleniti possimus alias optio consectetur amet eveniet sequi nisi. Ipsam sint hic commodi amet et, quidem obcaecati?
    Possimus officia, ipsum unde eveniet magnam vero inventore soluta quis at ducimus quod excepturi expedita hic sed dolorem ea! Culpa consequatur repellendus sed accusantium nobis temporibus doloremque quod ab incidunt.
    Reiciendis repellendus eos optio minus sapiente corrupti cum ad alias odit. At, odit rerum. Dolore odit facilis recusandae, fugiat iure voluptatibus fuga pariatur, laboriosam nobis aliquam, quia neque veniam officiis.
    Explicabo hic in, eaque dolor reprehenderit dicta magnam molestiae molestias incidunt omnis consequuntur culpa aliquid numquam. Soluta blanditiis repellat cupiditate quas autem deserunt quae distinctio? Unde provident culpa voluptate itaque!
    Animi commodi quidem sapiente ducimus illo quasi non nulla minima iste, vero eveniet repellat, architecto fugiat nostrum eligendi mollitia ab. At velit libero sit, fuga sequi pariatur a? Necessitatibus, natus.
    Deleniti architecto enim iste voluptates nobis. Possimus quod repudiandae facilis sint hic fuga, autem rem explicabo in beatae earum consequuntur. Aperiam vel ad inventore tempore possimus mollitia necessitatibus accusamus voluptate.
    Quo provident sapiente alias rem sed fugit hic natus commodi assumenda laborum culpa, recusandae aliquid odit quia facere ex doloribus! Officia quo nesciunt voluptates error nostrum alias tempora accusantium magni.
    Ex facere dicta minima aliquam rem cupiditate similique consectetur assumenda modi sed debitis optio saepe, quia facilis odio fuga vitae. Reprehenderit veniam sunt accusamus asperiores. Libero vitae facere optio labore!
    Perferendis ullam, mollitia nobis pariatur corrupti modi dolores, ducimus esse quo rerum alias, eligendi beatae corporis? Quas voluptatum dolorum, minima, assumenda sapiente, debitis id ullam quod voluptatem dicta ipsa in!
    Nemo quod, deserunt vel magni reprehenderit autem excepturi facere quibusdam voluptates ducimus perferendis qui officia soluta aut culpa iure eos amet numquam, inventore voluptatum minima praesentium placeat animi tempora. Similique.
    Quaerat sed soluta quis numquam. Voluptates voluptatum veniam iure similique, cum deserunt, rem eius voluptatem obcaecati porro fugiat voluptatibus, non ea necessitatibus quis tempora reprehenderit id ipsum? Veritatis, voluptates nostrum!
    Dolores nam ipsum assumenda omnis id corporis quisquam ut, reiciendis, laboriosam dolorem, explicabo quidem. Esse inventore itaque facere. Eligendi suscipit inventore nam asperiores autem cum nesciunt ea quas adipisci perspiciatis.
    Earum nostrum doloribus, dolore dignissimos magni quod velit recusandae animi ad error, modi ratione non. Unde quos delectus doloremque illo libero, inventore eum odio perspiciatis suscipit reprehenderit perferendis odit vel.
    Laboriosam laudantium odit nisi vitae nesciunt quisquam voluptatum, voluptatibus aliquid quo pariatur quaerat optio magni autem natus corrupti illo dolorum omnis vel perspiciatis sint eum ad, a commodi? Autem, dolores!</p>
</div>

</footer>



    <?php

    if (!empty($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
    {
        echo '<font color="red">' . $erreur . "</font>";

    }
    ?>
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