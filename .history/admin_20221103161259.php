
<!--  COMFIRME MEMBRE SUPP MEMBRE -->

<?php
require 'require/database.php';

//if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1){
  //  exit(); }

?>

<?php
if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
   if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
      $confirme = (int) $_GET['confirme'];
      $req = $bdd->prepare('UPDATE membres SET confirme = 1 WHERE id = ?');
      $req->execute(array($confirme));
   }
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
      $req->execute(array($supprime));
   }
} 
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
      $req->execute(array($supprime));
   }

$membres = $bdd->query('SELECT * FROM membres ORDER BY id DESC LIMIT 0,5');
$commentaires = $bdd->query('SELECT * FROM commentaires ORDER BY id DESC LIMIT 0,5');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace admin</title>
</head>
<body>

<p>
  On peut supprmier les commentaires, supprimer les membres, confirmer les membres. 
</p>


<ul>
<?php while($m = $membres->fetch()) { ?>
      <li><?= $m['id'] ?> : <?= $m['pseudo'] ?><?php if($m['confirme'] == 0) { ?> - 
        <a href="admin.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a href="admin.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>
      <?php } ?>
</ul> <br><br><br>


<!-- supp les commentaire -->

<ul>
      <?php while($c = $commentaires->fetch()) { ?>
      <li> Id commentaire : <?= $c['id'] ?> :  id membre : <?= $c['idMembre'] ?> <br><?= $c['commentaire'] ?>
      
      <a href="admin.php?type=commentaire&supprime=<?= $c['id'] ?>">Supprimer</a></li>
      <?php } ?>
   </ul>



    
</body>
</html>