<?php
include "verif.php";
require __DIR__ . '/vendor/autoload.php';

$selection =trim($_POST["selection"]);
$numeros=explode(" ",$selection);
// Resultat du tirage dans tableau tirage
$tirage=array();

for($i=0;$i<6;$i++){

do{
    $tr=mt_rand(1,49);
}
while(in_array($tr,$tirage));
$tirage[]=$tr;
}

$bon=0;

    // ON VERIFIE LA CORRESPONDANCE DES NUMEROS, 
    //on verifie si la valeur courante du tableau Tiarage figure 
    //sur le tableau numeros "tirage = resultat du tirage au sort" "numeros = selection 
    //qui a étét faite par user" si c'est le cas on increment la variable $bon
for($i=0;$i<6;$i++){
    if(in_array($tirage[$i],$numeros))

    $bon++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
 
    <title>Tirage</title>
</head>
<body>

<h1>Tirage</h1>

<h2>Vos numéros jouer</h2>
<?php for ($i=0; $i<6;$i++)
{?>
<div class="numeros"><?php echo $numeros[$i] ?></div>
<?php }?>

<h2>Résultat du tirage</h2>
<?php for($i=0;$i<6;$i++){ ?>
<div class="numeros" id="<?php echo $i ?>"><?php echo $tirage[$i] ?></div>

<?php } ?>

<h2 id="resultat">Vous avez eu <span><?php echo $bon ?> </span>(s) numéros</h2>

<a style="color: white;" href="grille.php">Encore</a>


<script>
    document.body.onload = function () {
        num = "<?php echo $selection?>".split(" ");
        res = "<?php echo implode(" ", $tirage)?>".split(" ");
        i = 0;
        j = 0;
        tirer();
    }

    function tirer() {
        t = setTimeout("tirer()", 0);
        if (j < res[i]) {
            j++;
            document.getElementById(i).innerHTML = j;
        } else {
            if (num.indexOf(res[i]) != -1) {
                document.getElementById(i).style.borderColor = "#EA2";
                document.getElementById(i).style.backgroundColor = "#EA2";
                document.getElementById(i).style.color = "#000";
            }
            j = 0;
            if (i < 5)
                i++;
            else {
                clearTimeout(t);
                document.getElementById("resultat").style.visibility = "visible";
            }
        }
    }
</script>
</body>
</html>