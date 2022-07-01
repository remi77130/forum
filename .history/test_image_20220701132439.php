<?php

require 'require/database.php';


?>





<?php if(!empty($FILES)){


   
$img = $_FILES['img']; // ACCESS PHOTO ALBUM
echo substr($img['name'],-3);
move_uploaded_file($img['tmp_name'],"membres/img_membres".$img['name']); /// INFO FICHIER FILES


}




?>