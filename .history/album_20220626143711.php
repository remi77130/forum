<?php

include "profil.php";
include "database.php";


?>


<a href="album.php">
   
<?php 

if (empty($userinfo['img/membres']))
{
?>
<img src="membres\img_membres/
<?php echo $userinfo['image_membre']; ?>" alt="img/users"width="50" height="50"  >
<?php

}
?> 

</a>