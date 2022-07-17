

<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
include 'includes/head.php';

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
      
   }




?>
<html>
   </head>
   <body>
      <section>            <!-- Profil visible-->

   <div> 
      <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
   </div>

   <div>      
   <?php echo $userinfo['description_profil']; ?>

   </div>

   <div>
     <img src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil" width="150"><br>

   </div>
       <!--  <a href="ajouter-photo.php">Ajouter une photo à mon album</a> <br>  -->





<!---- AJOUT PHOTO ALBUM --->


<?php
$id1=$_GET['id'];
if(isset($_POST['valider'])){
   //$req = $bdd->prepare("INSERT INTO images(nom,taille,type,bin) VALUES (?, ?, ?, ?)");
   $req = $bdd->prepare("INSERT INTO images(id,nom,taille,type,bin) VALUES (?, ?, ?, ?, ?)");
   $req->execute(array($id1,$_FILES["image"]["name"],$_FILES["image"]["size"], 
   $_FILES["image"]["type"],file_get_contents($_FILES["image"]["tmp_name"])));
 }
 ?>
<!------------------------AFFICHAGE ALBUM PHOTO-------->
<?php 
$req = $bdd->prepare("SELECT bin, type from images INNER JOIN membres on membres.id=images.id WHERE membres.id=?");
 // REQUETE DE SELECTIONDANS LA BDD JOINTURE DE TABLES
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute(array($_GET["id"]));
$tab=$req->fetchAll();
?>
<form method="post" enctype="multipart/form-data">

<input type="file" name="image" accept="image/png, image/jpeg"><br>

<input type="submit" name="valider" value="charger">
</form>

<div class="container_album_profil"> <p>Mon album</p> <br>
<?php 
for ($i=0;$i<count($tab);$i++)
{
    if (($tab[$i]["type"]=="jpg")||($tab[$i]["type"]=="JPG")){
        echo '<img src="data:image/jpeg;base64,' . base64_encode($tab[$i]["bin"]) . '" height="" width="150" alt="photo album" title="image"/>';
    }
    else if (($tab[$i]["type"]=="png")||($tab[$i]["type"]=="PNG")){
        echo '<img src="data:image/png;base64,' . base64_encode($tab[$i]["bin"]) . '" height="" width="150" alt="photo album" title="image"/>';
    }
    else{
        //autre cas de extension d'image
        echo '<img src="data:image/jpeg;base64,' . base64_encode($tab[$i]["bin"]) . '" height="" width="150" alt="photo album" title="image"/>';
    }
    
}
?>
</div>


<!--<img style="width: 200px;" src="export.php=" alt="">-->


 <!--                    LIKE DISLIKE EN COURS DE DEV

<div>
<a href="actions/action.php?t=1&id=<?= $id ?>">J'aime</a> (15) <br> <br>  t pour le type d'action <br>
<a href="actions/action.php?t=2&id=<?= $id ?>">Je n'aime pas </a>(5) <br>
</div>
-->



<!-- MESSAGERIE  -->

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


      </section>   
   </body>
</html>
<?php   
} 
?>
