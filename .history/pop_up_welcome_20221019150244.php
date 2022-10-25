
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'includes/head.php' ?>

  <link rel="stylesheet" href="assets/pop_up_welcome.css">
    <title>pop up welcome</title>
</head>

<body>

<?php

if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {
    if (isset($_GET['id']) and !empty($_GET['id'])) {
        $id_message = intval($_GET['id']);

        // RECUP DONEES MSG
        $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
        $p_exp->execute(array($m ['id_expediteur']));
        $p_exp = $p_exp->fetch();
        $p_exp = $p_exp['pseudo'];


    }}

?>




<div class="container_pop_up">


<div class="img_pop_up">
<img class="icone_welcome" src="icones/chanderland_welcome.png" alt="chanderland_icone_welcome" srcset="">
</div>

<div class="text_pop_up">
    <h2>Bienvenue <?= $p_exp ?> sur chanderland </h2>

    <p>
    Tu as la possibilité d'ajouter une photo de profil et <br>
     d'autre informations pour augmenter tes chances de recevoir des messages. <br>

    </p>
</div>


</div>



    
</body>
</html>