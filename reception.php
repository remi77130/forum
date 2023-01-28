<?php ////// FEUILLE RECEPTION DU MESSAGE *********->LECTURE.PHP
require 'require/database.php';
include './includes/init.php';
include 'verif.php'; // BDD AND SESSION

if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {
    //On récupère les fils de discussion. Pour ça on se base sur l'id destinataire ou expediteur (il faut pouvoir voir les fils ou on a été le premier initiateur du message)
    $msg = $bdd->prepare('SELECT * FROM messages WHERE id IN (SELECT max(id) FROM messages WHERE id_destinataire = ? OR id_expediteur = ? GROUP BY id_expediteur, id_destinataire) ORDER BY id DESC');
    $msg->execute(array($_SESSION['id'], $_SESSION['id']));
    $msg_nbr = $msg->rowCount();
    $messages = $msg->fetchAll();
    $fils = array();
    // On fait un petit filtre, parce que la si on a un fil ou on a envoyé le dernier message, et un ou l'autre utilisateur l'a envoyé, on aura deux fils avec le même utilisateur
    foreach ($messages as $message) {
        $user_id = ($message['id_expediteur'] == $_SESSION['id']) ? $message['id_destinataire'] : $message['id_expediteur'];
        if (!isset($fils[$user_id])) {
            $fils[$user_id] = $message;
        }
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/navbar.css">
        <link rel="stylesheet" href="assets/recepetion.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Boîte de reception chanderland</title>
    </head>

    <body>

        <?php include 'includes/header.php' ?>
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
        foreach ($fils as $m) {
            $user_id = ($m['id_expediteur'] == $_SESSION['id']) ? $m['id_destinataire'] : $m['id_expediteur'];

            $p_exp = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
            $p_exp->execute(array($user_id));
            $p_exp = $p_exp->fetch();
            $p_exp = $p_exp['pseudo'];
        ?>
            <a href="lecture.php?id_expediteur=<?= $user_id ?>" <?php if ($m['lu'] == 1) { ?><span style="color:grey"><?php } ?>


            <div class="container_msg"> <br>
                <div class="msg">

                    <h4>Fil de discussion avec <?= $p_exp ?> </h4>

                    <p class="message"><?= $m['objet'] ?> <br>
                        <?= substr(nl2br($m['message']), 0, 900) . "..." ?></p>

                </div>
            </div>

            <?php if ($m['lu'] == 1) { ?></span>
            <?php } ?>
            </a><br />
            <br />

        <?php } ?>


        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

    </html>
<?php } ?>