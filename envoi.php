<?php
include __DIR__ . '/includes/init.php';

////// FEUILLE ENVOI DU MESSAGE *********->RECEPTION.PHP

session_start(); //pour recup dans la bdd
require 'require/database.php';

if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {
    if (isset($_POST['envoi_message'])) {
        if (isset($_POST['destinataire'], $_POST['message'], $_POST['objet'])
            and !empty($_POST['destinataire']) and !empty($_POST['message'])
            and !empty($_POST['objet'])) {

            $destinataire = htmlspecialchars($_POST['destinataire']);
            $message = htmlspecialchars($_POST['message']);
            $objet = htmlspecialchars($_POST['objet']);

            $file_path = false; // On mets à false par défaut si jamais l'image n'a pas été envoyée

            // Si on a bien reçu une image
            if (isset($_FILES) && !empty($_FILES['img_msg'])) {

                $file = $_FILES['img_msg'];

                // On regarde si on peut récupérer la taille de l'image
                if (getimagesize($file["tmp_name"]) !== false) {

                    // On récupère l'extension du fichier
                    $imageFileType = strtolower(pathinfo(basename($file["name"]), PATHINFO_EXTENSION));

                    // On regarde si on valide l'extension du fichier
                    $extensions_arr = array("jpg", "jpeg", "png", "gif");

                    if (in_array($imageFileType, $extensions_arr)) {

                        // On génère le nom de l'image (clef aléatoire + le temps)
                        $image_filename = sha1(rand() . '' . microtime()) . '.' . $imageFileType;

                        // On détermine le répertoire où sera envoyée l'image
                        $image_path = __DIR__ . '/images/messages_images/' . $image_filename;

                        if (move_uploaded_file($file["tmp_name"], $image_path)) {
                            $file_path = $image_filename;
                        }
                    }
                }
            }

            $req_selectDestinataire = $bdd->prepare('SELECT id, pseudo FROM membres WHERE pseudo = ?');
            $req_selectDestinataire->execute(array($destinataire));

            $dest_exist = $req_selectDestinataire->rowCount();
            if ($dest_exist == 1) {
                $destinataire = $req_selectDestinataire->fetch();
                $id_destinataire = $destinataire['id'];

                // On prépare l'enregistrement dans les messages (dans tous les cas on enregistre quand même la valeur de file_path, même si elle est à false)
                $req_insertMessage = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,objet,image_filename) VALUES (?,?,?,?,?)');
                $req_insertMessage->execute([
                    $_SESSION['id'],
                    $id_destinataire,
                    $message,
                    $objet,
                    $file_path
                ]);

                $error = "Votre message a bien été envoyé à {$destinataire['pseudo'] }.";
            } else {
                $error = "Cet utilisateur n'existe pas...";
            }
        } else {
            $error = "Veuillez compléter tous les champs";
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
    <html>
    <head>
        <title>Envoi de message</title>
        <meta charset="utf-8"/>
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

<<<<<<< HEAD
         <input type="file" name="img_msg" accept="image/*"> <br><br> <!--  envoi image message -->


         <textarea placeholder="Votre message" name="message"></textarea><br>
         <br /><br />
         <input type="submit" value="Envoyer" name="envoi_message" />
         <br /><br />
         <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
      </form>
      <br />
      <a href="reception.php">Boîte de réception</a>
      <br />
   </body>
   </html>
	<?php
=======
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
>>>>>>> 0d549e44066a95dde1ad3a675795c06dfa96d47e
}
?>

<?php // AFFICHAGE DE LA PHOTO
if (empty(['img_msg'])) {
    ?>
    <img src="membres\img_message/" alt="photo_profil" width="150">   <!-- dossier stock image message (img_message) -->
    <?php

}
?> 