
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
<img src="icones/1.jpg" name="slide">


</div>
<script>
    var i = 0;
    var images = ['icones/1.jpg', '2.jpg', 'icones/3.jpg', 'icones/4.jpg, icones/back.jpg', 'icones/chat_chanderland.png];
    var time = 2000;

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
