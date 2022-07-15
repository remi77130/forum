

<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');








if(isset($_POST['valider'])){
    $req = $bdd->prepare("INSERT INTO images(nom,taille,type,bin) VALUES (?, ?, ?, ?)");
    $req->execute(array($_FILES["image"]["name"],["images"]["size"], 
    $_FILES["image"]["type"],file_get_contents($_FILES["image"]["tmp_name"])));
 }
 
 ?>

 <form method="post" enctype="multipart/form-data">

 <input type="file" name="image"><br>
 <input type="submit" name="valider" value="charger">
 </form>
