<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/test_profil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">

  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="icones/cercle.svg" alt="" style="width: 50px;"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" 
    aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>

        <li class="nav-item">
        <a title="profil_membre" href="profil.php?id=<?= $_SESSION['id'] ?>">Mon profil</a>
        </li>    

        <li class="nav-item">
          <a class="nav-link" href="#">Filtres</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Forum</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="deconnexion.php">Deconnexion</a>
        </li>

        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>

          <ul class="dropdown-menu">

            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>

          </ul>
        </li> <!--- nav-item dropdown -->
      </ul><!-- dropdown-menu -->

    </div><!-- container-fluid -->
  </div> <!-- collapse navbar-collapse -->


  
</nav>



</body>

</html>

