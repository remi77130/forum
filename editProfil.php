
<?php 
session_start(); //pour recup dans la bdd

//include_once 'cookieconnect.php';
require 'require/database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/FormEditProfil.css">
    <title>Edition du profil</title>
</head>
<body>
<?php include 'includes/edition_profil.php' ?>
    
    </body>
</html>