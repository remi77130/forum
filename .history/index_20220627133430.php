<!-- Page affichage des membres -->


<?php 
session_start(); //pour recup dans la bdd   


if(isset($_SESSION['id'])){

    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    echo $user['age'];

}

