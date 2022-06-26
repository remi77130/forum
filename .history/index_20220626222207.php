<!-- Page affichage des membres -->


<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=forum', 'root', '');

?>
<h1>
    Affichage des membres
</h1>



<a href="profil.php?id=<?= $_SESSION['id'] ?>">Profil</a>


