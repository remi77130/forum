<h2>
    le Footer

</h2>
<div>
    <?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur.php';
    ajouter_vue();
    $vues = nombre_vues();
    
    ?>
    il y a <?= nombre_vues()?> visite<?php if ($vues > 1):?>s <?php endif; ?> sur le site 
</div>