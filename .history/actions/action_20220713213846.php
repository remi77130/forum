<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');


if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){ 

    $check = $bdd->prepare('SELECT * FROM membres')


}