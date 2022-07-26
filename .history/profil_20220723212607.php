

<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
include 'includes/head.php';
include 'includes/get_message.php';
?>


<?php
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
   <?php echo $userinfo['createdAt']; ?>

   </div>

   <div>
     <img src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil" width="150"><br>

   </div>

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
         <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; 
         
} 
?>

        <?php

         }



      ?> 




<!------------------------ REQUETE AFFICHAGE ALBUM PHOTO -------->


<?php 
$req = $bdd->prepare("SELECT nom, type from images INNER JOIN membres on membres.id=images.id WHERE membres.id=?");
 // REQUETE DE SELECTION DANS LA BDD JOINTURE DE TABLES
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute(array($_GET["id"]));
$tab=$req->fetchAll();
?>

<!-- LOOP : AFFICHE DES IMAGES -->


<?php // AFFICHAGE IMAGES ALBUM
include 'Images_album.php';
include 'comment.php'
 
?>












                <!----LIKE DISLIKE EN COURS DE DEV


<a href="actions/action.php?t=1&id=<?= $id ?>">J'aime</a> (15) <br> <br>  t pour le type d'action <br>
<a href="actions/action.php?t=2&id=<?= $id ?>">Je n'aime pas </a>(5) <br> ---->









         <!--//////////////////// FICHE PROFIL PRIVEE USERS CONNECT    ///////////////////---->

   <div class="option_profil_user_connect">
         <?php 
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editProfil.php">Editer mon profil</a>
         <a href="reception.php">Mes messages</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <a href="redaction.php">Album</a>
         <a href="index.php">Acceuil</a> 

   </div>

<!---- AJOUT PHOTO ALBUM --->


<?php

$id1=$_GET['id']; // Id utilisateur

if(isset($_POST['valider'])){ // SI L'UTILISATEUR CHARGE UNE IMAGE

   // On enregistre les images dans le dossier
   if(!empty($_FILES)){
      // Preparation

      // Dossier source
      $path = "Images_album/";
      // On récupère le type
      $type = explode(".", $_FILES["image"]["name"]);;
      // On génère le nom et on ajoute le type
      $image_name = round(microtime(true)) . '.' . end($type);
      // On récupère l'image temporaire enregistré dans php
      $temp_name = $_FILES['image']['tmp_name'];
      
      if(move_uploaded_file($temp_name, $path.$image_name)){ // Si le fichier a été enregistrer 
         //die("ok");
      }else{
         //die("nok");
      }
   }
   //$req = $bdd->prepare("INSERT INTO images(nom,taille,type,bin) VALUES (?, ?, ?, ?)");
   $req = $bdd->prepare("INSERT INTO images(id,nom,taille,type) VALUES (?, ?, ?, ?)");
   $req->execute(array($id1,$image_name,$_FILES["image"]["size"], 
   $_FILES["image"]["type"]));
   
   header("Refresh:0");
}
 ?>



<!-- ON VERIFIE SI LUTILISATEUR N'A PAS DEPASSE LA LIMITE D'ENVOIE D'IMAGE-->

<?php

   // ON récupère la limitation d'ajout de l'image
   $reqparam = $bdd->prepare('SELECT * FROM param WHERE id = 1');
   $reqparam->execute();
   $param = $reqparam->fetch();
   if(count($tab)<$param['limit_image_album']){ // STARTIF OF LIMIT IMAGE : Si le compteur utilisateur est inférieur à la limitation d'ajout d'image aux albums
?>
 <!---   FORM ENVOIE PHOTO ALBUM -------->
 <div class="parent_form_album_photo">
   <form class="form_uploadImgAlbum_profil" method="post" enctype="multipart/form-data">

   <div>
      <input style="background-color: red;" type="file" name="image" accept="image/png, image/jpeg"><br>
   </div>

   <div>
      <input class="input_submit_form_profil" type="submit" name="valider" value="charger">
   </div>

   </form>
 </div>

 <?php
   }else{ // ELSE OF LIMIT ALBUM
 ?>
   
   <p style="color:red"> Vous avez atteint la limite d'ajout d'images. <p>
   <?php
      } // ENDIF OF LIMIT ALBUM 
   ?>



   <?php
      }
   ?>

<!-- ESPACE COMMENTAIRE ------->

   <!-- ENNVOIE COMMENTAIRE ------->

<?php
  if(isset($_POST['submit_commentaire'])) {
   if(isset($_POST['commentaire']) AND !empty($_SESSION['id']) 
   AND !empty($_POST['commentaire'])) {
      
      $idMembreSender = $_SESSION['id'];
      $idMembre = $_GET['id'];
      $commentaire = htmlspecialchars($_POST['commentaire']);

      // Requête envoie commentaire 
      // Param : Id de l'utilisateur qui envoie, id du membre qui reçoit le commentaire, le commentaire
      $ins = $bdd->prepare('INSERT INTO commentaires (idMembreSender, idMembre, commentaire) VALUES (?,?,?)');
      $ins->execute(array($idMembreSender,$idMembre,$commentaire));
      $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
   } else {
      $c_msg = "Erreur: Tous les champs doivent être complétés";
   }
}
?>


<!-- AFFICHAGE STATUT ENVOIE COMMENTAIRE-->

<?php if(isset($c_msg)) { echo $c_msg; } // MESSAGE ERREUR ?>
<br /><br />

<?php
   $membreId = $_GET['id'];
   // RECUPERE LES COMMENTAIRE 
   $commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE idMembre = ? ORDER BY id DESC');
   $commentaires->execute(array($membreId));  
?>

<?php while($c = $commentaires->fetch()) { ?>

   <!-- RECUPERATION DE LUTILISATEUR QUI A ENVOYE LE MESSAGE -->
   <?php 
   $membreSenderId = $c['idMembreSender'];
   // RECUPERE LES COMMENTAIRE 
   $reqGetMembreSender = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $reqGetMembreSender->execute(array($membreSenderId)); 
   $membreSender = $reqGetMembreSender->fetch(); 
   ?>
   <!-- -->

<b>  <?= $membreSender['pseudo'] ?> :</b> <?= $c['commentaire']?><br /> 

<?php 


} 


?>

<!-- FIN COMMENTAIRE ------->

<?php

?>


     


      </section>   


      
   </body>
</html>

<?php   
} 
?>
