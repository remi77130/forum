
   <?php

$q = $bdd->prepare(" UPDATE membres SET Online='1' WHERE pseudo=?");
$q->execute($_GET['id']);

$user = $q->fetch(PDO::FETCH_OBJ);
?>

<div class="user-online-status">
   <span class="user-status <?= $user->Online ? 'is-online' : ''; ?>>"></span>
</div>