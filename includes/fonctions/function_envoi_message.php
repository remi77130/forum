<?php

/*
* Ici, on créé une fonction qu'on pourra appeler sur d'autres pages, on mentionne les paramètres de notre fonction
* Les paramètres attendus sont l'id du destinataire, le post et le file
*/
function send_message($id_destinataire, $post, $file)
{
    // Global permet de récupérer des variables qu'on a besoin dans notre fonction
    global $bdd, $_SESSION;

    // On récupère l'id de l'expediteur
    $id_expediteur = $_SESSION['id'];

    // On récupère l'identifiant de la personne à qui envoyer le message
    $req_selectDestinataire = $bdd->prepare('SELECT id, pseudo FROM membres WHERE id = :id');
    $req_selectDestinataire->execute(
        [
            'id' => $id_destinataire
        ]
    );

    // On regarde si le destinataire existe bien
    if ($req_selectDestinataire->rowCount() == 1) {

        // On récupère les informations du destinataire
        $selectDestinataire = $req_selectDestinataire->fetch();
        $id_destinataire = $selectDestinataire['id'];

        // On regarde si les autres champs sont envoyés
        if (isset($_POST['message'], $_POST['objet']) && !empty($_POST['message']) && !empty($_POST['objet']) && !empty($_FILES['img_msg'])) {

            // On regarde si la photo est bien envoyée
            $message = htmlspecialchars($_POST['message']);
            $objet = htmlspecialchars($_POST['objet']);

            $file_path = false; // On mets à false par défaut si jamais l'image n'a pas été envoyée

            // Si on a bien reçu une image
            if (isset($_FILES) && !empty($_FILES['img_msg']) && !empty($file["name"])) {
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
                        $image_path = $_SERVER['DOCUMENT_ROOT'] . '/images/messages_images/' . $image_filename;

                        if (move_uploaded_file($file["tmp_name"], $image_path)) {
                            $file_path = $image_filename;
                        }
                    }
                }
            }

            // On prépare l'enregistrement dans les messages (dans tous les cas on enregistre quand même la valeur de file_path, même si elle est à false)
            $req_insertMessage = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,lu,objet,img_msg,file_name,datafile,image_filename) VALUES (?,?,?,?,?,?,?,?,?)');
            $req_insertMessage->execute([
                $id_expediteur,
                $id_destinataire,
                $message,
                0,
                $objet,
                "",
                "",
                "",
                $file_path
            ]);

            $error = "Votre message a bien été envoyé à {$selectDestinataire['pseudo'] }.";
        } else {
            $error = "Veuillez compléter tous les champs...";
        }
    } else {
        $error = "Le destinataire n'existe pas.";
    }

    // On renvoi le message
    return $error;
}
?>