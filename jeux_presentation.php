
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous"> 
    
    <link rel="stylesheet" href="assets/modal.css">
    <link rel="stylesheet" href="assets/jeux.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    
    <title>Presentation</title>
</head>
<body>
<header>
	
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="jeux_presentation.php">Jeux de la grille</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profil_membre.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profil.php">Mon profil</a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>

</header>

<div class="cont">
<div class="container_2">
Les jeux de la grille consistent simplement à tirer 6 numéros puis à lancer
la partie. Si vos 6 numéros sortent, vous remportez 10 fois la somme
que vous avez joué.
La somme gagnée est ensuite transférée sur votre compte
<img style="width: 50px;" src="Icones/coins.svg" alt="" srcset="">
</div>

<div class="container_3"> <p>Pourquoi vous ne gagnez jamais au jeux d'argent ? <br>
 car les probabilité de gains sont infiniment maigre. 
 PLus les gains sont important moins vous avez de chance de gagner quoi que se soit. 
 Chez nous, on préfére offrir de plus petite sommme plus mais de plus grande chance de gagné. </p> 
 
   <img style="width:50px;" src="icones/card_bank_2.svg" alt="" srcset=""></div>

</div>
</div> <!-- cont --->


<div class="container">

  <a href="grille.php" class="button">
    <div class="button__line"></div>
    <div class="button__line"></div>
    <span class="button__text">Jouer</span>
    <div class="button__drow1"></div>
    <div class="button__drow2"></div>
  </a>

</div>



<div id="popup1" class="popup">
<div class="st"><h5 class="title_popup">
	<img src="icones/position_popup.svg" class="svg_popup" > Jean de Sens</h5>
</div>
  <p class="p_popup">viens de gagné 100 €</p>
</div>


<div id="popup2" class="popup">
<div class="st"><h5 class="title_popup">
	<img src="icones/position_popup.svg"  class="svg_popup" > Rémi de Auxerre</h5>
</div>
  <p class="p_popup">viens de gagné 100 €</p>
</div>

<script src="js/jeux_presentation.js"></script>
</body>
</html>