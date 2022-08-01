<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
include 'includes/head.php';
?>


<?php
if(isset($_GET['id']) AND $_GET['id'] > 0) {
?>
<?php include 'includes/get_message.php';?>
