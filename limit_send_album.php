
<?php
function is_valid_image($filename){
   $type = exif_imagetype( $filename );
   switch( $type ) {
      case 1:
         $isimage = @imagecreatefromgif( $filename );
         return $isimage;
         break;
      case 2: 
         $isimage = @imagecreatefromjpeg( $filename );
         return $isimage;
         break;
      case 3:
         echo "png : ";
         $isimage = @imagecreatefrompng( $filename );
         return $isimage;
         break;
   }
   return false;
}

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

      // Si le fichier a été enregistré
      if(is_valid_image($temp_name) && move_uploaded_file($temp_name, $path.$image_name)){
         //$req = $bdd->prepare("INSERT INTO images(nom,taille,type,bin) VALUES (?, ?, ?, ?)");
         $req = $bdd->prepare("INSERT INTO images(id,nom,taille,type) VALUES (?, ?, ?, ?)");
         $req->execute(array($id1,$image_name,$_FILES["image"]["size"], 
         $_FILES["image"]["type"]));
      }else{
         $erreur = "Une erreur s'est produite lors de l'importation de votre image";
      }
   }
   header( "Refresh:0");
}
 ?>
 