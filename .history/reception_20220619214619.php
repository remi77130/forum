<?php 
session_start();
require('database.php');

if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {

$msg = $bdd->prepare('SELECT * FROM messages WHERE id_destintaire = ?');
$msg->execute(array($_SESSION['id']));

?>

<!DOCTYPE html>
<html lang="en">
    <title>Boite de reception</title>

<body>

<?php ?>

    
</body>
</html>

<?php   } ?>