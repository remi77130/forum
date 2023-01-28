

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

    $nb_message_non_lus = $req_selectMessagesNonLus->rowCount();
} else {
    exit;
}
?>

<div id="content_Info" class="container_option">
<div class="option_profil_user_connect">
<!------------<div>
        <a href="paiement_paypal.php">
            Abonnement premium
        </a>
   ---------</div> -->
    <div>
        <a href="editProfil.php">
            Editer mon profil
        </a>
    </div>
    <div>
        <a href="reception.php">Mes messages
            <?php
            if ($nb_message_non_lus > 0) {
                ?>
                <span class="notification"><?= $nb_message_non_lus ?></span>
                <?php
            }
            ?>
        </a>
    </div>
    <div>
    <a href="profil_membre.php">Accueil</a>
    </div>
    <div>
        <a style="color: #ff4646;" href="deconnexion.php">Se déconnecter</a>

    </div>
</div>

</div>