<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=forum;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
?>
<!DOCTYPE html>
<html>
<head>
   <title>Accueil</title>
   <meta charset="utf-8">
</head>
<body>
   <ul>
      <?php while($a = $articles->fetch()) { ?>
      <li>
         <a href="article.php?id=<?= $a['id'] ?>">
            <img src="miniatures/<?= $a['id'] ?>.jpg" width="100" /><br />
            <?= $a['titre'] ?>
         </a>
          | <a href="redaction.php?edit=<?= $a['id'] ?>">Modifier</a> | <a href="supprimer.php?id=<?= $a['id'] ?>">Supprimer</a>
      </li>
      <?php } ?>
   <ul>
</body>
</html>