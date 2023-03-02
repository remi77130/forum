<!-- Page de recherche de profil -->
<?php
require_once __DIR__ . "/../model/repository/user.repository.php";

if(!empty($_POST['reset']) || !empty($_POST['search'])){
    $_GET['page'] = 1;
}

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$page_counter = 1;
$step = 50;
if(!isset($_SESSION['filter']) || !empty($_POST['reset'])){
    $_SESSION['filter'] = null;
}
if(!isset($_SESSION['conditions']) || !empty($_POST['reset'])){
    $_SESSION['conditions'] = null;
}
if (!empty($_POST['search']) && empty($_POST['reset'])) {
    $_SESSION['filter'] = $_POST;
}
$conditions = array(); // Tableau de condition contenant les filtres

// DEPARTEMENT :
// On récupère l'ID du département pour chercher les profils
//ayant l'ID département récupéré dans le filtre
if (!empty($_SESSION['filter']['departement'])) {
    $departement_code = htmlspecialchars($_SESSION['filter']['departement']) ?? "-1";
    if ($departement_code != -1) {
        $reqdpt = $bdd->prepare("SELECT *
        FROM departement
        WHERE departement_code = ?");
        $reqdpt->execute([$departement_code]);
        $departmnt = $reqdpt->fetch();
        $dpcode = $departmnt['departement_code'];
        $dpnom = $departmnt['departement_nom'];
        $conditions[] = "departement.departement_nom='$dpcode'";
    }
}

// RECHERCHE SUR LA SITUATION ///
if (!empty($_SESSION['filter']['situation'])) {
    $situation = htmlspecialchars($_SESSION['filter']['situation']);
    $conditions[] = "situation='$situation'";
}

// RECHERCHE SUR LA SEXUALITE ///
if (!empty($_SESSION['filter']['sexualite'])) {
    $sexualite = htmlspecialchars($_SESSION['filter']['sexualite']);
    $conditions[] = "sexualite='$sexualite'";
}



// RECHERCHE SUR LA nationality ///
if (!empty($_SESSION['filter']['nationality'])) {
    $nationality = htmlspecialchars($_SESSION['filter']['nationality']);
    $conditions[] = "nationality='$nationality'";
}

// RECHERCHE SUR LA COULEUR DE CHEVEUX ///
if (!empty($_SESSION['filter']['cheveux_color'])) {
    $cheveux_color = htmlspecialchars($_SESSION['filter']['cheveux_color']);
    $conditions[] = "cheveux_color='$cheveux_color'";
}


// RECHERCHE SUR AGE

if (!empty($_SESSION['filter']['age_min']) || !empty($_SESSION['filter']['age_max'])) {
    $ageMin = 0;
    if (!empty($_SESSION['filter']['age_min'])) {
        $ageMin = intval(htmlspecialchars($_SESSION['filter']['age_min']));
    }

    $ageMax = 99;
    if (!empty($_SESSION['filter']['age_max'])) {
        $ageMax = intval(htmlspecialchars($_SESSION['filter']['age_max']));
    }
    $conditions[] = "age>='$ageMin' AND age<='$ageMax'";
}

// RECHERCHE SUR POIDS
if (!empty($_SESSION['filter']['poids_min']) || !empty($_SESSION['filter']['poids_max'])) {
    $poids_min = 0;
    if (!empty($_SESSION['filter']['poids_min'])) {
        $poids_min = intval(htmlspecialchars($_SESSION['filter']['poids_min']));
    }

    $poids_max = 150;
    if (!empty($_SESSION['filter']['poids_max'])) {
        $poids_max = intval(htmlspecialchars($_SESSION['filter']['poids_max']));
    }
    $conditions[] = "poids>='$poids_min' AND poids<='$poids_max'";
}


// RECHERCHE SUR LA TAILLE
if (!empty($_SESSION['filter']['taille_min']) || !empty($_SESSION['filter']['taille_max'])) {
    $taille_min = 135;
    if (!empty($_SESSION['filter']['taille_min'])) {
        $taille_min = intval(htmlspecialchars($_SESSION['filter']['taille_min']));
    }

    $taille_max = 205;
    if (!empty($_SESSION['filter']['taille_max'])) {
        $taille_max = intval(htmlspecialchars($_SESSION['filter']['taille_max']));
    }
    $conditions[] = "taille>='$taille_min' AND taille<='$taille_max'";
}



// Declaration variable, init à 0 si femme/homme non coché : Cela permet d'avoir tous les profils femmes/homme
$femme = 0;
$homme = 0;
if (!empty($_SESSION['filter']['femme'])) {
    $femme = intval(htmlspecialchars($_SESSION['filter']['femme']));
}

if (!empty($_SESSION['filter']['homme'])) {
    $homme = intval(htmlspecialchars($_SESSION['filter']['homme']));
}

if ($femme == 1 && $homme == 0) {
    $conditions[] = "sexe='Femme'";
}

if ($homme == 1 && $femme == 0) {
    $conditions[] = "sexe='Homme'";
}

if (!empty($_SESSION['filter']['pseudo'])) {
    $pseudo = htmlspecialchars($_SESSION['filter']['pseudo']);
    $conditions[] = "pseudo LIKE '%$pseudo%'";
}
$_SESSION['conditions'] = $conditions;
$users = UserRepository::findUsers($_SESSION['conditions'], $current_page, $step);
$users_counter = UserRepository::countUsers($_SESSION['conditions']);
$page_counter = ceil($users_counter / $step);
?>