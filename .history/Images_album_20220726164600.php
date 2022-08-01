<div class="image_album_profil">

<?php 
for ($i=0;$i<count($tab);$i++)
{
   echo '<div class="image_album_test"><img src="Images_album/'.$tab[$i]["nom"]. '" alt="photo album" title="image"/></div>';
    
}
?>
</div>