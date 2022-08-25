<?php

$type = empty($_GET['type']) ? 'department' : $_GET['type'];

if ($type === 'department') {
    $table = 'departments';
    $foreign = 'region_id';
} else if ($type === 'city') {
    $table = 'cities';
    $foreign =  'department_id';
} else {
    throw new Exception('Unknown type ' . $type);
}

$query = $bdd->prepare("SELECT id, name FROM $table WHERE $foreign = ?");
$query->execute([$_GET['filter']]);
$items = $query->fetchAll();
header('Content-Type: application/json');
echo json_encode(array_map(function ($item) {
    return [
        'label' => $item['name'],
        'value' => $item['id']
    ];
}, $items));

?>

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


<script>let $selects = document.querySelectorAll('.linked-select')
$selects.forEach(function ($select) {
  new LinkedSelect($select)
})</script>