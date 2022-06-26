<?php       


require('database.php');
include('includes/head.php');
require('profil.php');
require ('editProfil/profil.php');








// AFFICHAGE DE LA PHOTO

if (empty($userinfo['img/membres']))
{
?>
<img src="membres\img_membres/<?php echo $userinfo['image_membre']; ?>" alt="img/users" width="150">
<?php

}
?> 