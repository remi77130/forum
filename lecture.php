<?php ////// FEUILLE LECTURE DU MESSAGE *********
include __DIR__ . '/includes/init.php';
include 'verif.php';


if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {

    // Si un message est envoyé sur un profil
    if (!empty($_POST['envoi_message']) && !empty($_FILES)) {
        $error = send_message($_POST['destinataire_id'], $_POST, $_FILES['img_msg']);
        header("location:".$_SERVER['REQUEST_URI']);
    }
    if (isset($_GET['id_expediteur']) and !empty($_GET['id_expediteur'])) {
        $id_expediteur = intval($_GET['id_expediteur']);

        // On compte tous les messages du fil de discussion avec l'utilisateur (aussi bien ceux qu'on a reçu que ceux qu'on a envoyé)
        $msg = $bdd->prepare('SELECT * FROM messages WHERE (id_expediteur = ? AND id_destinataire = ?) OR (id_destinataire = ? AND id_expediteur = ?)');
        $msg->execute(array($_GET['id_expediteur'], $_SESSION['id'], $_GET['id_expediteur'], $_SESSION['id']));
        $msg_nbr = $msg->rowCount();

        // On récupère tous les messages du fil de discussion avec l'utilisateur (aussi bien ceux qu'on a reçu que ceux qu'on a envoyé), par ordre décroissant.
        $msg = $bdd->prepare('SELECT * FROM messages WHERE (id_expediteur = ? AND id_destinataire = ?) OR (id_destinataire = ? AND id_expediteur = ?) ORDER by ID DESC LIMIT '.NB_MESSAGES_INIT_LOAD);
        $msg->execute(array($_GET['id_expediteur'], $_SESSION['id'], $_GET['id_expediteur'], $_SESSION['id']));
        $messages = array_reverse($msg->fetchAll());

        $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
        $p_exp->execute(array($id_expediteur));
        $p_exp = $p_exp->fetch();
        $p_exp = $p_exp['pseudo'];
        ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/lecture.css">



    <title>Lecture message <?= $p_exp ?></title></head>


<body>
    
<section class="container_page">

<nav>
<a title="profil_membre" href="profil.php?id=<?= $_SESSION['id'] ?>">Mon profil</a>
<a href="reception.php">Boîte de réception</a>
<a href="supprimer.php?id_expediteur=<?= $id_expediteur ?>">Supprimer</a><br/>


<br/><br/>
</nav>


      <div class="container_info_message"> 

        <h3>Fil de discussion avec <?= $p_exp ?></h3>




            <?php if ($msg_nbr == 0) {
                echo "Erreur";
            } else {
                ?>
                <div class="button" id="btn_load_more">
                    <a href="#" data-limit-from="<?= NB_MESSAGES_INIT_LOAD ?>" data-limit-step="<?= NB_MESSAGES_AJAX_LOAD ?>">+</a>
                </div>
                <div id="messages_container">
                    <?php
                    foreach($messages as $m){
                        // Cette variable permettra d'afficher une image si elle existe
                        $image = false; // Par défaut à false

                        // On récupère les données de l'image sauvegardée
                        $image_filename = $m['image_filename'];

                        // S'il y a bien un filename qui est présent
                        if ($image_filename !== false && !empty($image_filename)) {

                            // On détermine le chemin de l'image
                            $image_filepath = '/images/messages_images/' . $image_filename;

                            // On regarde si le fichier existe bel et bien
                            if (file_exists(__DIR__.$image_filepath)) {
                                $image = $image_filepath;
                            }
                        }
                        ?>
                        
                        <div data-message-id="<?= $m['id'] ?>" class="message msg_<?= $m['id_expediteur']==$_SESSION['id']?"sent":"received" ?>">
                            <b><?= ($m['id_expediteur']==$_SESSION['id']?$_SESSION['pseudo']:$p_exp) ?></b> : <?= $m['objet'] ?>

                            <br/><br/>
                            <?= nl2br($m['message']) ?><br/> <br>

                            <?php
                            // Ceci est une condition en ternaire (en une ligne)
                            if ($image !== false) {
                                ?>
                                <div>
                                    <img class="img_message" src="<?= BASE_URL.$image; ?>">
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                ?>
                </div>
                <?php
            } ?>
        </div>
        <form method="POST" enctype="multipart/form-data" action="">
            <p>
                <input class="objet_message" type="text" name="objet" placeholder="objet" />
            </p>

            <p>
                <textarea class="text_message" placeholder="message" name="message"></textarea>
            </p>

            <p>
                <input class="file_message" type="file" name="img_msg" />
            </p>
            <p>
                <input type="hidden" name="destinataire_id" value="<?= $id_expediteur ?>" />
                <input type="submit" value="Envoyer" name="envoi_message"/>
            </p>
        </form>


</section>
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>

<script type="text/javascript">
    function nl2br (str) {
        if (typeof str === 'undefined' || str === null) {
            return '';
        }
        var breakTag = '<br />';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }
    $(document).ready(function(){
        //Formatte le message récupéré en contenu html
        format_message = function(message){
            // Cette variable permettra d'afficher une image si elle existe
            let image = false; // Par défaut à false

            // On récupère les données de l'image sauvegardée
            let image_filename = message.image_filename;

            // S'il y a bien un filename qui est présent
            if (image_filename) {

                // On détermine le chemin de l'image
                let image_filepath = '/images/messages_images/' + image_filename;
                image = $image_filepath;
            }

            let div = $("<div>");
            div.attr("data-message-id", message.id);
            div.addClass("message");
            div.addClass("msg_" + (message.id_expediteur == <?= $_SESSION['id'] ?>?"sent":"received"));
            let p_exp = message.id_expediteur==<?= $_SESSION['id'] ?> ? "<?= $_SESSION['pseudo'] ?>" : message.pseudo
            let object = $("<b>" + p_exp + "</b> - <b>Objet : </b> " + message.objet + "<br/><br/>");
            div.append(object);
            div.append(nl2br(message.message) + "<br/><br/>")
            if(image){
                let div_img = $("<div>");
                div_img.append('<img class="img_message" src="' + image + '">');
                div.append(div_img);
            }
            return div;
        }

        //Ajoute le message à la fin
        append_message = function(message){
            $("#messages_container").append(format_message(message));
        }

        //Ajoute le message au début
        prepend_message = function(message){
            $("#messages_container").prepend(format_message(message));
        }

        check_new_messages = function(){
            let div_last_message = $('#messages_container div.message').last();
            let last_message_id = div_last_message.attr("data-message-id");
            
            $.ajax({
                url: "api/messages.php",
                data: {"action":"getNew", "id_expediteur":<?= $id_expediteur ?>, "last_message_id":last_message_id},
                success: new_message_loaded,
                dataType: "json"
            });
        }

        new_message_loaded = function(data){
            let data_limit_from = parseInt($('#btn_load_more a').attr('data-limit-from'));
            for(message_id in data.messages){
                append_message(data.messages[message_id]);
                data_limit_from = data_limit_from + 1;
                $('#btn_load_more a').attr('data-limit-from', data_limit_from);
            }
        }

        window.setInterval(function(){
            check_new_messages();
        }, <?= REALTIME_REFRESH_TIME ?>);

        <?php
        //On n'affichera le bouton de chargement d'historique que s'il reste des messages à afficher
        if($msg_nbr > count($messages)){
        ?>
            var loading = false;//Permet de ne pas charger plusieurs fois le même message si on clique plein de fois sur le bouton de chargement d'historique
            //On affiche le bouton d'historique
            $('#btn_load_more').show();
            //On gère l'événement de clic sur ce bouton
            $('#btn_load_more a').click(function(event) {
                if(!loading){
                    //On indique qu'on est en train de charger du contenu au script
                    loading = true;
                    //On annule le comportement par défaut du bouton (la redirection du lien <a>)
                    event.preventDefault();
                    //On appelle la fonction de chargement des messages
                    load_messages();
                }
            });
            
            //Fait un appel Ajax vers la fonction de récupération des messages
            load_messages = function(){
                $.ajax({
                    url: "api/messages.php",
                    data: {"action":"get", "id_expediteur":<?= $id_expediteur ?>, "limit_from":$('#btn_load_more a').attr('data-limit-from'), "limit_step":$('#btn_load_more a').attr('data-limit-step')},
                    success: message_loaded,
                    dataType: "json"
                });
            };

            //Permet de traiter les messages récupérés
            message_loaded = function(data) {
                $('#btn_load_more a').attr('data-limit-from', data.limit_from);
                $('#btn_load_more a').attr('data-limit-step', data.limit_step);
                if(!data.more){
                    $('#btn_load_more').hide();
                }
                for(message_id in data.messages){
                    prepend_message(data.messages[message_id]);
                }
                loading = false;
            };
        <?php
        }
        ?>
    })
</script>

        </body>




        </html>





        <?php
        $lu = $bdd->prepare('UPDATE messages SET lu = 1 WHERE id_expediteur = ? AND id_destinataire = ?');
        $lu->execute(array($_GET['id_expediteur'], $_SESSION['id']));
    }
}
?>

