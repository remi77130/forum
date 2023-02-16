
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

<?php
require_once("model/repository/user.repository.php");
$user = UserRepository::findById($_SESSION["id"]);
?>
<header>
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="profil.php?id=<?= $_SESSION['id'] ?>">
        <img class="avatar_navbar" src="membres/avatars/<?= $user->getAvatar() ?>" alt="">
      </a>
      <a href="profil_membre.php" class="nav-link nav-link-brand"><img class="logo_navbar" src="icones/logo_navbar.svg" alt="logo-chanderland"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="profil_membre.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="profil.php">Mon profil</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="editProfil.php">Editer mon profil</a>
          </li>


          <li class="nav-item">
          <a class="nav-link" href="reception.php">Mes messages
            <?php
            if ($nb_message_non_lus > 0) {
                ?>
                <span class="notification"><?= $nb_message_non_lus ?></span>
                <?php
            }
            ?>
        </a>
          </li>
        </ul>



        <div class="d-flex">
          <a class="nav-logout" aria-current="page" href="deconnexion.php">Déconnexion</a>
        </div>
      </div>
    </div>
  </nav>
</header>