
<?php
require('database.php');
include 'includes/head.php';

if (isset($_POST['formconnect']))
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


?>
