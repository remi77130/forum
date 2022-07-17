<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');

?>
<?php 
if(isset($_GET["id"]) || !empty($_GET["id"])){

    // pas d'id
    echo "erreur";

}

// RECUP ID 
$id = $_GET["id"];

$bdd = "SELECT * FROM 'membres' WHERE id = :id";








