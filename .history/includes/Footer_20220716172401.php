<h2>
    le Footer

</h2>
<div>
    <?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur.php';
    ajouter_vue();
    
    ?>
    il ya <?= nombre_vues()?> visite sur le site 
</div>