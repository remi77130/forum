
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
 