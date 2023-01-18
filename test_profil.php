<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/test_profil.css">
    
    <title>test</title>
</head>
<body>
<p>
il y a actuellement 
<div id="number"></div>
</p>

<div class="action" onclick="actionToggle();">
  <span>+</span>
  <ul>
    <li><a class="noselect Red" data-desire_id="1" data-user_id="1483" href="">Facebook</a></li>
    
  </ul>
</div>

  












</body>
</html>


<script>function actionToggle() {
  const action = document.querySelector('.action');
  action.classList.toggle('active')
}</script>
<script src="js/test_profil.js"></script>