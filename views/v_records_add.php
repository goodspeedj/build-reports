<form id="record-add" method="POST" action="/records/p_add">

  <label for="component_id">Component</label>
  <select name="component_id">

  <?php foreach ($components as $component): ?>
    <option><?= $component['name']; ?></option>
  <?php endforeach; ?>

  </select>

  <br />

  <label for="build_num">Build Number</label>
  <input type="text" name="build_num" placeholder="Build #" required>

  <br />

  <label for="job_name">Job Name</label>
  <input type="text" name="job_name" placeholder="Job Name" required>

  <br />

  <label for="status">Status</label>
  <select name="status">
    <option>Stable</option>
    <option>Unstable</option>
    <option>Failed</option>
  </select>

  <label for="duration">Duration</label>
  <input type="text" name="duration" placeholder="Build Time" required>
  <br />
  <button type="submit" class="btn">Submit</button>
</form>