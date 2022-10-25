
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'includes/head.php' ?>

  <link rel="stylesheet" href="assets/pop_up_welcome.css">
    <title>pop up welcome</title>
</head>

<body>

if (isset($_GET['id']) and $_GET['id'] > 0) {

$getid = intval($_GET['id']);
$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
$requser->execute(array($getid));
$userinfo = $requser->fetch();




<div class="container_pop_up">


<div class="img_pop_up">
<img class="icone_welcome" src="icones/chanderland_welcome.png" alt="chanderland_icone_welcome" srcset="">
</div>

<div class="text_pop_up">
    <h2>Bienvenue  sur chanderland </h2>

    <p>
    Tu as la possibilité d'ajouter une photo de profil et <br>
     d'autre informations pour augmenter tes chances de recevoir des messages. <br>

    </p>
</div>


</div>



    
</body>
</html>