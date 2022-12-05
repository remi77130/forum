
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



<h3>Nos derniers abonnés</h3>

<div class="slider">

<div class="description_1">
<h5>
<img class="icone_description" src="icones/chat_index.svg" alt="chat-gratuit">
Un chat totalement gratuit
</h5> <br>
<p class="text_descr">
Un lieu de rencontre pour un échange convivial sans interruption
et sans prise de tête 24h/24 7j/7. 
C'est rapide, simple et sans inscription.</p>
</div>


<img src="icones/1.svg" name="slide">

<div class="description_2">
<h5>
<img class="icone_description" src="icones/locked_index.svg" alt="chat-gratuit">
    Messagerie crypté
</h5> <br>
<p class="text_descr">Nous protégeons vos données sensibles telles que les messages par la prévention des fuites et le chiffrement des données.<br>
vos messages s'affichent chiffrés dans notre base de données.</p>
</div>

</div>

<script>
    var i = 0;
    var images = ['icones/1.svg','icones/3.svg', 'icones/4.svg', 'icones/5.svg', 'icones/6.svg', 'icones/8.svg'];
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
