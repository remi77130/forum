<select id="region" class="form-control linked-select" data-target="#department" data-source="/list.php?type=department&filter=$id">
  <option value="0">Sélectionnez votre région</option>
    <?php
    $regions = $pdo->query('SELECT id, name FROM regions');
    foreach($regions as $region) {
      ?>
      <option value="<?= $region['id'] ?>"><?= $region['name']; ?></option>
      <?php
    }
    ?>
</select>
<select id="department" class="form-control linked-select" data-target="#city" data-source="/list.php?type=city&filter=$id" style="display: none;">
  <option value="0">Sélectionnez votre département</option>
</select>
<select id="city" name="city" class="form-control" style="display: none;">
  <option value="0">Sélectionnez votre ville</option>
</select>