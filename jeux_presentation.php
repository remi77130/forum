<?php
include 'verif.php'; // BDD AND SESSION
?>
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

    
    <title>Presentation</title>
</head>
<body>
    
<?php include 'includes/header.php' ?>
<h1>Presentation du jeux de la grille</h1>


<div class="container_1">
<div class="container_2">
Les jeux de la grille consistent simplement à tirer 6 numéros puis à lancer
la partie. Si vos 6 numéros sortent, vous remportez 10 fois la somme
que vous avez joué.
La somme gagnée est ensuite transférée sur votre compte
<img style="width: 50px;" src="Icones/coins.svg" alt="" srcset="">
</div>

<div class="container_3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br>
 Tempore dolorum cupiditate in aut iusto, perferendis sequi veniam doloremque non, <br>
  magnam, perspiciatis nobis adipisci voluptate repellat quibusdam corporis voluptatibus? <br>
   Pariatur, quaerat. <br>
   <img style="width:50px;" src="icones/card_bank_2.svg" alt="" srcset=""></div>

</div>


<div class="container">

  <a href="grille.php" class="button">
    <div class="button__line"></div>
    <div class="button__line"></div>
    <span class="button__text">Jouer</span>
    <div class="button__drow1"></div>
    <div class="button__drow2"></div>
  </a>

</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script>
    let button = document.querySelector(".button");
let buttonText = document.querySelector(".button p");
let thankText = document.querySelector(".button p:last-child");

let timeLine = new TimelineMax({
	paused: false
});

button.addEventListener("click", () => {
	timeLine
		.to(buttonText, 0.6, {
			opacity: 0
		})
		.to(button, 0.8, {
			height: 0.2,
			opacity: 0.5,
			boxShadow: "0px 0px 35px 7px #cd28fa",
			delay: 0.25
		})
		.to(button, 0.1, {
			opacity: 0.5,
			background: "#26ff92"
		})
		.to(button, 0, {
			width: 1,
			delay: 0.2
		})
		.to(button, 0.1, {
			boxShadow: "0px 0px 100px 55px #fa2856",
			y: 90,
			height: 100,
			delay: 0.23
		})
		.to(button, 0.3, {
			height: 1000,
			y: -1500,
			boxShadow: "0px 0px 85px 17px #fa2856",
			delay: 0.2
		})
		.to(".thank", 1, {
			opacity: 1,
			delay: 0.3
		});
});

</script>

</body>
</html>