<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/profil.css">
</head>
<body>

<?php
if (!empty($_SESSION)) {
    $id_destinataire = $_SESSION['id'];

    // On récupère les messages non-lus
    $req_selectMessagesNonLus = $bdd->prepare('SELECT * FROM messages WHERE id_destinataire = :id_destinataire AND lu <> 1');
    $req_selectMessagesNonLus->execute(
        [
            'id_destinataire' => $id_destinataire
        ]
    );
} else {
    exit;
}
?>

<div class="option_profil_user_connect">
    <div>
        <a href="editProfil.php">
            Editer mon profil
        </a>
    </div>
    <div>
        <a href="reception.php">Mes messages
            <span class="notification"><?= $req_selectMessagesNonLus->rowCount(); ?></span>
        </a>
    </div>
    <div>
        <a href="deconnexion.php">Se déconnecter</a>
    </div>
    <div>
        <a href="profil_membre.php">Acceuil</a>
    </div>
</div>
</body>
</html>