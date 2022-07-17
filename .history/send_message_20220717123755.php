<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');

?>
<?php
if(isset($_SESSION['id'])) //autorisation affichage page si compte existe
{
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    
}



echo $user['pseudo']