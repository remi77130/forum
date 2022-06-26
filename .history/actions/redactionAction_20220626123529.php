<?php

include('redaction.php');


if(isset($_POST['article_titre'], $_POST['article_contenu'])){

    if(!empty($_POST['article']) AND !empty($_POST['article_contenu'])){ // SI PAS REMPLIS


    }else {

        $erreru = "Veuillez remplir tous les champs ! ";
    }
}