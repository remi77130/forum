<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');


if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);
    $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $article->execute(array($get_id));
    if($article->rowCount() == 1) {
       $article = $article->fetch();
       $id = $article['id'];
       $titre = $article['titre'];
       $contenu = $article['contenu'];
       $likes = $bdd->prepare('SELECT id FROM likes WHERE id_article = ?');
       $likes->execute(array($id));
       $likes = $likes->rowCount();
       $dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ?');
       $dislikes->execute(array($id));
       $dislikes = $dislikes->rowCount();
    } else {
       die('Cet article n\'existe pas !');
    }
 } else {
    die('Erreur');
 }
 ?>