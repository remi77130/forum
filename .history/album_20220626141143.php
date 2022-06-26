<?php       


require('database.php');
include('profil.php');
include('includes/head.php');








// AFFICHAGE DE LA PHOTO

if (empty($userinfo['img/membres']))
{
?>
<img src="membres\img_membres/<?php echo $userinfo['image_membre']; ?>" alt="img/users" width="150">
<?php

}
?> 