<?php
  if(isset($_POST['submit_commentaire'])) {
   if(isset($_POST['commentaire']) AND !empty($_SESSION['id']) 
   AND !empty($_POST['commentaire'])) {
      
      $idMembreSender = $_SESSION['id'];
      $idMembre = $_GET['id'];
      $commentaire = htmlspecialchars($_POST['commentaire']);
      // Requête envoie commentaire 
      // Param : Id de l'utilisateur qui envoie, id du membre qui reçoit le commentaire, le commentaire
      $ins = $bdd->prepare('INSERT INTO commentaires (idMembreSender, idMembre, commentaire) VALUES (?,?,?)');
      $ins->execute(array($idMembreSender,$idMembre,$commentaire));
      $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
      echo "<script>window.location.href=''</script>";
   } else {
      $c_msg = "Erreur: Tous les champs doivent être complétés";
   }
}
?>


<!-- AFFICHAGE STATUT ENVOIE COMMENTAIRE-->

<?php if(isset($c_msg)) { echo $c_msg; } // MESSAGE ERREUR ?>
<br /><br />

<?php
   $membreId = $_GET['id'];
   // RECUPERE LES COMMENTAIRE 
   $commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE idMembre = ? ORDER BY id DESC');
   $commentaires->execute(array($membreId));  
?>

<?php while($c = $commentaires->fetch()) { ?>

   <!-- RECUPERATION DE LUTILISATEUR QUI A ENVOYE LE MESSAGE -->
   <?php 
   $membreSenderId = $c['idMembreSender'];
   // RECUPERE LES COMMENTAIRE 
   $reqGetMembreSender = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $reqGetMembreSender->execute(array($membreSenderId)); 
   $membreSender = $reqGetMembreSender->fetch(); 
   ?>
   <!-- -->

   <div style="border: 5px solid red;">
   <strong>  <?= $membreSender['pseudo'] ?> </strong> <br> <?= $c['commentaire']?><br /> <br>

   </div>


<?php 

}
?>