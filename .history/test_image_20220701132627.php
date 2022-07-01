<?php

require 'require/database.php';


?>





<?php if(!empty($FILES)){


   
$img = $_FILES['img']; // ACCESS PHOTO ALBUM
echo substr($img['name']);
move_uploaded_file($img['tmp_name'],"membres/img_membres".$img['name']); /// INFO FICHIER FILES


}




?>



<label>Ajouter des photo ALBUM</label> <br>
               <input type="file" name="img"> <br> <br>