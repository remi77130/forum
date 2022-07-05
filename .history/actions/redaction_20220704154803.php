<?php

require'database.php';

if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
   if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
      
      $article_titre = htmlspecialchars($_POST['article_titre']);
      $article_contenu = htmlspecialchars($_POST['article_contenu']);
      $ins = $bdd->prepare('INSERT INTO articles (titre, contenu, date_time_publication) VALUES (?, ?, NOW())');
      $ins->execute(array($article_titre, $article_contenu));
      $message = 'Votre article a bien été posté';
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Rédaction</title>
   <meta charset="utf-8">
</head>
<body>
   <form method="POST">
      <input type="text" name="article_titre" placeholder="Titre" /><br />
      <textarea name="article_contenu" placeholder="Contenu de l'article"></textarea><br />
      <input type="submit" value="Envoyer l'article" />
   </form>
   <br />
   <?php if(isset($message)) { echo $message; } ?>
</body>
</html>