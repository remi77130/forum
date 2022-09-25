<?php ////// FEUILLE LECTURE DU MESSAGE *********
include __DIR__ . '/includes/init.php';
include 'verif.php';

if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {
    if (isset($_GET['id']) and !empty($_GET['id'])) {
        $id_message = intval($_GET['id']);

        // RECUP DONEES MSG
        $msg = $bdd->prepare('SELECT * FROM messages WHERE id = ? AND id_destinataire = ?');
        $msg->execute(array($_GET['id'], $_SESSION['id']));
        $msg_nbr = $msg->rowCount();
        $m = $msg->fetch();

        $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
        $p_exp->execute(array($m ['id_expediteur']));
        $p_exp = $p_exp->fetch();
        $p_exp = $p_exp['pseudo'];

        // Cette variable permettra d'afficher une image si elle existe
        $image = false; // Par défaut à false

        // On récupère les données de l'image sauvegardée
        $image_filename = $m['image_filename'];

        // S'il y a bien un filename qui est présent
        if ($image_filename !== false) {

            // On détermine le chemin de l'image
            $image_filepath = '/images/messages_images/' . $image_filename;

            // On regarde si le fichier existe bel et bien
            if (file_exists(__DIR__.$image_filepath)) {
                $image = $image_filepath;
            }
        }
        ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture message<?= $id_message ?></title></head>


<body>
    



        <a href="reception.php">Boîte de réception</a>
        <a href="envoi.php?r=<?= $p_exp ?>&o=<?= urlencode($m['objet']) ?>">Répondre</a>
        <a href="supprimer.php?id=<?= $m['id'] ?>">Supprimer</a><br/><br/><br/>
        <h3 align="center">Lecture du message <?= $p_exp ?></h3>
        <div align="center">
            <?php if ($msg_nbr == 0) {
                echo "Erreur";
            } else { ?>
                <b><?= $p_exp ?></b> vous a envoyé: <br/><br/>

                <b>Objet:</b> <?= $m['objet'] ?>

                <br/><br/>
                <?= nl2br($m['message']) ?><br/>

                <?php
                // Ceci est une condition en ternaire (en une ligne)
                if ($image !== false) {
                    ?>
                    <div>
                        <p>Pièce jointe : </p>
                        <img src="<?= $image; ?>">
                    </div>
                    <?php
                }
            } ?>
        </div>
        </body>
        </html>
        <?php
        $lu = $bdd->prepare('UPDATE messages SET lu = 1 WHERE id = ?');
        $lu->execute(array($m['id']));
    }
}
?>

