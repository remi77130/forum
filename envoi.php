<?php
include __DIR__ . '/includes/init.php';

////// FEUILLE ENVOI DU MESSAGE *********->RECEPTION.PHP

session_start(); //pour recup dans la bdd

require 'require/database.php';

if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {
    if (isset($_POST['envoi_message'])) {

        $error = false;

        // On récupère l'id du destinataire avec son pseudo
        if (isset($_POST['destinataire']) && !empty($_POST['destinataire'])) {

            $req_selectDestinataire = $bdd->prepare('SELECT id, pseudo FROM membres WHERE pseudo = :pseudo');
            $req_selectDestinataire->execute(
                [
                    'pseudo' => $_POST['destinataire']
                ]
            );

            if ($req_selectDestinataire->rowCount() == 1) {
                $id_destinataire = $req_selectDestinataire->fetch()['id'];

                // On peut utiliser la méthode permettant d'envoyer un message à un utilisateur
                $error = send_message($id_destinataire, $_POST, $_FILES);
            } else {
                $error = "Le destinataire n'existe pas";
            }
        }
    }

    $destinataires = $bdd->query('SELECT pseudo FROM membres ORDER BY pseudo');
    if (isset($_GET['r']) and !empty($_GET['r'])) {
        $r = htmlspecialchars($_GET['r']);
    }
    if (isset($_GET['o']) and !empty($_GET['o'])) {
        $o = urldecode($_GET['o']);
        $o = htmlspecialchars($_GET['o']);

        if (substr($o, 0, 3) != 'RE:') {
            $o = "RE:" . $o;
        }
    }
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="envoie.css">
    <title>Envoie de message</title>
</head>


    <body>
    <form method="POST" enctype="multipart/form-data">
        <!--<select name="destinataire">
            <?php while ($d = $destinataires->fetch()) { ?>
            <option><?= $d['pseudo'] ?></option>
            <?php } ?>!-->
        </select>
        <label>Destinataire:</label>
        <input type="text" name="destinataire" <?php if (isset($r)) {
            echo 'value="' . $r . '"';
        } ?> />
        <br/><br/>
        <label>Objet:</label>
        <input type="text" name="objet" <?php if (isset($o)) {
            echo 'value="' . $o . '"';
        } ?> />
        <br/><br/>

        <input type="file" name="img_msg"> <br><br> <!--  envoi image message -->

        <textarea placeholder="Votre message" name="message"></textarea><br>
        <br/><br/>
        <input type="submit" value="Envoyer" name="envoi_message"/>
        <br/><br/>
        <?php if (isset($error)) {
            echo '<span style="color:red">' . $error . '</span>';
        } ?>
    </form>
    <br/>
    <a href="reception.php">Boîte de réception</a>
    <br/>
    </body>
    </html>
    <?php
}
?>

<?php // AFFICHAGE DE LA PHOTO
if (empty(['img_msg'])) {
    ?>
    <img src="membres\img_message/" alt="photo_profil" width="150">   <!-- dossier stock image message (img_message) -->
    <?php

}
?> 