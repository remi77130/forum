
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>slider</title>
    <link rel="stylesheet" href="assets/slider.css">
</head>
<body>

<div class="slider">

<h3>Nos derniers abonnés</h3>

<img src="icones/damien.jpg" name="slide">


</div>

<script>
    var i = 0;
    var images = ['icones/gilles75.jpg', 'icones/edwardo.jpg', 'icones/melanie_27.jpg', 'icones/rencontre-gratuite.jpg', 'icones/fred_028.jpg', 'icones/jessica_77.jpg', 'icones/marie_akal.jpg'];
    var time = 10000;

         function changeImg(){
            document.slide.src = images[i];

            if (i < images.length - 1){
                i++;
            }else{
                i = 0;
            }
            setTimeout("changeImg()", time);
         }
         window.onload = changeImg;
</script>
</body>
</html>
