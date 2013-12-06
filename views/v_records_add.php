<form id="record-add" method="POST" action="/records/p_add">
  <select name="product">

  <?php foreach ($products as $product): ?>
    <option><?= $product['name']; ?></option>
  <?php endforeach; ?>

  </select>

  <select name="component">

  <?php foreach ($components as $component): ?>
    <option><?= $component['name']; ?></option>
  <?php endforeach; ?>

  </select>

  <input type="text" name="build_num" placeholder="Build #" required>
  <input type="text" name="job_name" placeholder="Job Name" required>

  <select name="status">
    <option>Stable</option>
    <option>Unstable</option>
    <option>Failed</option>
  </select>

  <input type="text" name="duration" placeholder="Build Time" required>

</form>