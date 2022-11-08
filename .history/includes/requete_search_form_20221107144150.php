<!-- Page de recherche de profil -->
<?php

if(!empty($_POST['search']) && empty($_POST['reset'])) {
    $conditions = array(); // Tableau de condition contenant les filtres
    $requete = "SELECT * FROM membres";

    

    // DEPARTEMENT : 
    // On récupère l'ID du département pour chercher les profils 
    //ayant l'ID département récupéré dans le filtre

    if(!empty($_POST['departement'])) {
        $departement_code = htmlspecialchars($_POST['departement']) ?? "-1";
        if($departement_code!=-1){
            $reqdpt = $bdd->prepare("SELECT *
            FROM departement
            WHERE departement_code = ?");
            $reqdpt->execute([$departement_code]);
            $departmnt = $reqdpt->fetch();
            $dpcode = $departmnt['departement_code'];
            $dpnom = $departmnt['departement_nom'];
            $conditions[] = "departement_nom='$dpcode'";
            
            
        }
        
    }
// RECHERCHE SUR AGE

    if(!empty($_POST['age_min']) || !empty($_POST['age_max']))  {
        $ageMin=0;
        if(!empty($_POST['age_min'])){
            $ageMin = intval(htmlspecialchars($_POST['age_min']));
        }

        $ageMax=99;
        if(!empty($_POST['age_max'])){
            $ageMax = intval(htmlspecialchars($_POST['age_max']));

        }
        $conditions[] = "age>='$ageMin' && age<='$ageMax'";
    }

// RECHERCHE SUR POIDS

    if(!empty($_POST['poids_min']) || !empty($_POST['poids_ax']))  {
        $poids_min=0;
        if(!empty($_POST['poids_min'])){
            $poids_min = intval(htmlspecialchars($_POST['poids_min']));
        }

        $poids_max=150;
        if(!empty($_POST['poids_max'])){
            $poids_max = intval(htmlspecialchars($_POST['poids_max']));

        }
        $conditions[] = "poids>='$poids_min' && poids<='$poids_max'";
    }







    // Declaration variable, init à 0 si femme/homme non coché : Cela permet d'avoir tous les profils femmes/homme
    $femme=0;
    $homme=0;
    
    if(!empty($_POST['femme'])){
        $femme = intval(htmlspecialchars($_POST['femme']));
    }

    if(!empty($_POST['homme'])){
        $homme = intval(htmlspecialchars($_POST['homme']));
    }

    if($femme == 1 && $homme==0) {
        $conditions[] = "sexe='Femme'";
    }

    if($homme == 1 && $femme==0){
        $conditions[] = "sexe='Homme'";
    }

    if(!empty($_POST['pseudo'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $conditions[] = "pseudo LIKE '%$pseudo%'";
    }

    if(count($conditions) > 0) {
        $requete .= " WHERE ". implode(" AND ",$conditions);
    }

   

    $result = $bdd->query($requete);
    $articles = $result->fetchAll();

} else{
    $requser = "SELECT * FROM membres ORDER BY id DESC";
    $requete = $bdd->query($requser);
    $articles = $requete->fetchAll(); 
    
}


?>