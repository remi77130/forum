<?php 
session_start();
require('database.php');

$msg = $bdd->prepare('SELECT * FROM messages WHERE id_destintaire = ?');
$msg->execute(array($_SESSION['id']));

?>

<!DOCTYPE html>
<html lang="en">
    <title>Boite de reception</title>

<body>



    
</body>
</html>