<!DOCTYPE html>
<html>
<head>
  <title>Select ville</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">

  <a class="navbar-brand" href="#">Select Ajax</a>

</nav>

<div class="container">
  <h1>Select Ajax</h1>
  <p>
    L'objectif est de lier 3 selects afin que l'utilisateur puisse sélectionner sa ville.
  </p>
  <form action="">
    <div class="row">
      
      <div class="col-sm-4">
        <div class="form-group">
          <select id="region" class="form-control linked-select" data-target="#department" 
          data-source="/list.php?type=department&filter=$id">
            <option value="0">Sélectionnez votre région</option>
            <?php
              require 'autoload.php';
             // $pdo = Config::getPDO();
              $regions = $bdd->query('SELECT id, name FROM regions');

              // Resultat regions
              foreach($regions as $region) {
                ?>
             
                <option value="<?= $region['id'] ?>"><?= $region['name']; ?></option>
                <?php
              }
              ?>
          </select>
        </div>
      </div>







      <div class="col-sm-4">
        <div class="form-group">
          <select id="department" class="form-control linked-select" data-target="#city" 
          data-source="/list.php?type=city&filter=$id" style="display: none;">
            <option value="0">Sélectionnez votre département</option>
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <select id="city" name="city" class="form-control" style="display: none;">
            <option value="0">Sélectionnez votre ville</option>
          </select>
        </div>
      </div>
    </div>
  </form>
</div>
<script src="/js/main.js"></script>

</body>
</html>
