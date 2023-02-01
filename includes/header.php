<?php
require_once("model/repository/user.repository.php");
$user = UserRepository::findById($_SESSION["id"]);
?>
<header>

  <nav class="navbar">

    <div class="container-fluid">
      <a class="navbar-brand" href="profil.php?id=<?= $_SESSION['id'] ?>">
        <img class="avatar_navbar" src="membres/avatars/<?= $user->getAvatar() ?>" alt=""></a>

      <a href="profil_membre.php"><img class="logo_navbar" src="icones/logo_navbar.svg" 
      alt="logo-chanderland"></a>


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" 
      aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="profil_membre.php">Accueil</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="editProfil.php">Editer mon profil</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="reception.php">Messages</a>
          </li>

       
          <li class="nav-item">
            <a style="color: red;" class="nav-link" href="deconnexion.php">Deconnexion</a>
          </li>

      </div><!-- container-fluid -->
    </div> <!-- collapse navbar-collapse -->

  </nav>




</header>