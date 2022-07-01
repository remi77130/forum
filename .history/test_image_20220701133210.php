<?php

require 'require/database.php';


?>





<?php if(!empty($FILES)){


   
$img = $_FILES['img']; // ACCESS PHOTO ALBUM
$ext = strtolower(substr($img['name'],-3));
$allow_ext = array("jpg","png","gif");
if(in_array($ext,$allow_ext)){
    move_uploaded_file($img['tmp_name'],"membres/img_membres".$img['name']); /// INFO FICHIER FILES
}
else{

    $erreur "Votre image n'est pas une image";
}

}




?>



<label>Ajouter des photo ALBUM</label> <br>
<input type="file" name="img"> <br> <br>

<?php
if(isset($erreur){

    echo $erreur
}
?>