<?php 

require 'require/database.php';




if(isset($_SESSION['id'])) //autorisation affichage page si compte existe
{
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
        
        header('Location: profil.php?id='.$_SESSION['id']);


}
?>

<form method="Post">

<label>Ici pour :</label>

<select name="" id="">
    <option value=""></option>
    <option value=""></option>
</select>

</form>