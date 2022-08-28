<?php $search = $bdd->query('SELECT pseudo FROM membres ORDER BY id DESC');

if(isset($_GET['q']) AND !empty($_GET['q'])){

    $q = htmlspecialchars($_GET['q']);

    $q_array = explode('', $q);

    $search = $bdd->query('SELECT pseudo, CONCAT(pseudo, description_profil) 
    FROM membres WHERE pseudo LIKE "%'.$q.'%" ORDER BY id DESC');
   

    if($search->rowCount() == 0 ){
        // SI AUCUN RESULTAT ON RECHERCHE PLUS LARGE
        var_dump('ok')
    
        $search = $bdd->query('SELECT pseudo FROM membres WHERE CONCAT(pseudo,description_profil) 
        LIKE "%'.$q.'%" ORDER BY id DESC');
    }


}

?>

<div style="border: 5px solid red; height: auto;"> <!-- Bar de recherche -->

<form method="get">

<input type="search" name="q" placeholder="Recherche..." />
<input type="submit" value="valider" />

</form>
<?php if($search->rowCount() > 0){ ?>

    <UL> <?php while($a = $search->fetch()) { ?>
     

        <!-- Reultat recherche -->
    <li><!--<a href="profil.php?id=<//?= $articles['id'] ?>">-->
        <a href=""><?= $a ['pseudo']?></a>
     <br> </li>
    
<?php } ?>
</UL>

<!-- requete si aucun resultat -->
<?php } else { ?> 

    Aucun résultat pour <?= $q ?> ...

<?php } ?>

</div> <!-- Fin Bar de recherche -->