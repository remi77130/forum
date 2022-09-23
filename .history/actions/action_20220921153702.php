<!-- page like -->

<?php
require 'require/database.php';


?>

<?php

if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
        $getid = (int) $_GET['id'];
        $gett = (int) $_GET['t'];

        $check = $bdd->prepare('SELECT ID FROM membres where id = ?');
        $check->execute(array($getid));

        if($check->rowcount() == 1){

        }

}