<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/test_slider.css">
    
    <title>Document</title>
</head>
<body>
    <ul class="caroussel">
        <li><img src="icones/3.jpg"></li>
        <li><img src="icones/2.jpg"></li>
        <li><img src="icones/back.jpg"></li>

        <li><img src="icones/3.jpg"></li>
        <li><img src="icones/2.jpg"></li>
        <li><img src="icones/back.jpg"></li>

    </ul>
</body>

<script>
    if ( ! 'ontouchstart' in window ||
 !window.navigator.MaxTouchPoints ||
  ! window.navigator.msMaxTouchPoints )
  {
    // pas d'écran tactile, placer des boutons précédent/
    //suivant pour le bureau
  }
</script>
</html>