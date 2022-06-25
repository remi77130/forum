<?php

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo'])  AND !empty($_POST['mail'])  AND !empty($_POST['mail2']) 
    AND !empty($_POST['password']) AND !empty($_POST['password2']));
        
    {
        echo "ok";
    }
    

}