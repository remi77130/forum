<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=Forum;charset=utf8;', 'root', '');
}
catch(Exception $e){

    die('Une erreur à été trouvée : ' . $e->getMessage());
}
