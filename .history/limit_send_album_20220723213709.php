
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
