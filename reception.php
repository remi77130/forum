<?php ////// FEUILLE RECEPTION DU MESSAGE *********->LECTURE.PHP
session_start();
require 'require/database.php';

if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {
    //On récupère les fils de discussion. Pour ça on se base sur l'id destinataire ou expediteur (il faut pouvoir voir les fils ou on a été le premier initiateur du message)
    $msg = $bdd->prepare('SELECT * FROM messages WHERE id IN (SELECT max(id) FROM messages WHERE id_destinataire = ? OR id_expediteur = ? GROUP BY id_expediteur, id_destinataire) ORDER BY id DESC');
    $msg->execute(array($_SESSION['id'], $_SESSION['id']));
    $msg_nbr = $msg->rowCount();
    $messages = $msg->fetchAll();
    $fils = array();
    // On fait un petit filtre, parce que la si on a un fil ou on a envoyé le dernier message, et un ou l'autre utilisateur l'a envoyé, on aura deux fils avec le même utilisateur
    foreach($messages as $message){
        $user_id = ($message['id_expediteur'] == $_SESSION['id'])?$message['id_destinataire']:$message['id_expediteur'];
        if(!isset($fils[$user_id])){
            $fils[$user_id] = $message;
        }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <link rel="stylesheet" href="assets/recepetion.css">
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boîte de reception chanderland</title>

    <body> <br>
    <h3>Votre boîte de réception</h3>
    <div class="nav_menu_reception">
        <nav>
            <a href="profil.php?id=<?= $_SESSION['id'] ?>">Profil</a>
            <!--<a href="envoi.php">Nouveau message</a><br/><br/><br/> -->
        </nav>
    </div>
    <?php
    if ($msg_nbr == 0) {
        echo "Vous n'avez aucun message pour l'instant...";
    }
    //On parcours chaque fil de conversation pour les afficher
    foreach($fils as $m) {
        $user_id = ($m['id_expediteur'] == $_SESSION['id'])?$m['id_destinataire']:$m['id_expediteur'];

        $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
        $p_exp->execute(array($user_id));
        $p_exp = $p_exp->fetch();
        $p_exp = $p_exp['pseudo'];
        ?>
        <a href="lecture.php?id_expediteur=<?= $user_id ?>"<?php if ($m['lu'] == 1) { ?><span style="color:grey"><?php } ?>


        <div class="container_msg"> <br>

        Fil de discussion avec <b><?= $p_exp ?></b><br/><br>
        <b>Objet:</b> <?= $m['objet'] ?> <br>

        <?= substr(nl2br($m['message']),0,50)."..." ?><br/> <br>

        </div>

        <?php if ($m['lu'] == 1) { ?></span>
        <?php } ?></a><br/>
        <br/>

    <?php } ?>


    <div class="container_icone">

        <!--+ ne s'affiche pas <img class="icones_reception" src="icones/noun-letter-1091868.svg" alt="" srcset="">
        </div> -->
    </body>
    </html>
<?php } ?>