<?php 

session_start();
require 'require/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
while ($row = $stmt->fetch())
{
  ?>

  <tr>

  <td><?php echo $row-> departement ; ?></td>
  </tr>

  <?php } ?>




<form style="text-align: center;" method="POST" enctype="multipart/form-data">

    <div>
    <input type="text" name="pseudo" maxlength="10" minlength="3" 
    placeholder="Pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
  </div>

  <div>
    <input type="number" name="age" placeholder="Age">
  </div>  
  
  <div>
    <select name="sexe">
    <option value="Homme">Homme</option>
    <option value="Femme">Femme</option>
    </select>
  </div>

  
<div class="dpt"> <!-- Select departement -->

<label  for="inputdepart">Département</label>

<select id="inputdepart" name="inputdepart" require>

<option value="">Selectionnez un département</option>

</select>



<div> <!-- Selectionnez une ville-->

<label for="inuputville">Ville</label>
<select name="inuputville" id="inuputville" required>



</select>
</div>








</body>
</html>