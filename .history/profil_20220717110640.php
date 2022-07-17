

<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');


 
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();

   if(isset($_POST['envoi_message'])) {
      if(isset($_POST['message'],$_POST['objet']) 
      AND !empty($_POST['message']) 
      AND !empty($_POST['objet'])) 
      {
         $destinataire = $userinfo['pseudo'];
         $message = htmlspecialchars($_POST['message']);
         $objet = htmlspecialchars($_POST['objet']);
         $img_msg = htmlspecialchars($_POST['img_msg']);
         $id_destinataire = $bdd->prepare('SELECT id FROM membres WHERE pseudo = ?');
         $id_destinataire->execute(array($destinataire));
         $dest_exist = $id_destinataire->rowCount();
         if($dest_exist == 1) {
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire['id'];
            

            try {
               $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,objet,img_msg) VALUES (?,?,?,?,?)');
               $ins->execute(array($_SESSION['id'],$id_destinataire,$message,$objet,$img_msg));
           }
           catch(Exception $e) {
               echo 'Exception -> ';
               var_dump($e->getMessage());
           }
           //mettrev ici la requete select

            $error = "Votre message a bien été envoyé !";
         } else {
            $error = "Cet utilisateur n'existe pas...";
         }
      } else {
         $error = "Veuillez compléter tous les champs";
      }
      //modifié
      $req = $bdd->prepare("SELECT bin from images INNER JOIN membres on membres.id=images.id WHERE membres.id=?");
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $req->execute(array($_GET["id"]));
      $tab=$req->fetchAll();
      echo $tab[0]["bin"];
   }




?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div > <!-- Profil visible-->
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         <?php echo $userinfo['pseudo']; ?><br><br>
         <br />
         <br />
        <?php echo $userinfo['mail']; ?> <br><br>
         <br />

         <?php echo $userinfo['description_profil']; ?>
  
   <img src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil" width="150"><br>

<br>

<a href="ajouter-photo.php">Ajouter une photo à mon album</a> <br> 

<form method="post" enctype="multipart/form-data">

<input type="file" name="image"><br>

<input type="submit" name="envoyer" value="charger">
</form>




<!---- AJOUT PHOTO ALBUM EN COURS DE DEV --->


<?php
if(isset($_POST['valider'])){
   $req = $bdd->prepare("INSERT INTO images(nom,taille,type,bin) VALUES (?, ?, ?, ?)");
   $req = $bdd->prepare("INSERT INTO images(id,nom,taille,type,bin) VALUES (?, ?, ?, ?)");
   $req->execute(array($_FILES["image"]["name"],$_FILES["image"]["size"], 
   $_FILES["image"]["type"],file_get_contents($_FILES["image"]["tmp_name"])));
 }
 ?>-->
               

<img style="width: 200px;" src="export.php=" alt="">-->















<br>
<!--<div>    SYSTEME DE LIKE EN COURS DE DEV  ******************

<a href="actions/action.php?t=1&id=<?= $id ?>">J'aime</a> (15) <br> <br>  t pour le type d'action  <br>
<a href="actions/action.php?t=2&id=<?= $id ?>">Je n'aime pas </a>(5) <br> <br>
</div>
-->

      <?php
         if($_SESSION['id'] != $userinfo['id']){
      ?>         
        <form method="POST">
        <label style="display:block">Objet:</label>

         <input type="text" name="objet" <?php if(isset($o)) { echo 'value="'.$o.'"'; } ?> /> </br>
         <label style="display:block">  Pièce jointe : </label><br>
         <input type="file" name="img_msg"> <br><br>

         <label style="display:block">  Ecrire un message : </label><br>
         <textarea placeholder="Votre message" name="message"></textarea><br>

         <input type="submit" value="Envoyer" name="envoi_message" />
         <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
        </form>
        <?php
         }
      ?> 





         <?php  // FICHE PROFIL USERS CONNECT
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editProfil.php">Editer mon profil</a>
         <a href="reception.php">Mes messages</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <a href="redaction.php">Album</a>
         <a href="index.php">Acceuil</a> <br>

<br>











         <?php
         }
         ?>


      </div>
   </body>
</html>
<?php   
} 
?>


