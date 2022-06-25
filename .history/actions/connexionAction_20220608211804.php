<?php
<?php require('actions/signupAction.php'); ?>
<?php require('actions/connexionAction.php'); ?>

if (isset($POST['formconnect']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $passwordconnect = sha1($_POST['passwordconnect']);
    if(!empty($mailconnect) AND !empty($passwordconnect))
    {

    }

    else
    {
$erreur = "tous les champs doivent être cmplétés!";
    }

}
