<table id="records" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Product</th>
      <th>Component</th>
      <th>Build Number</th>
      <th>Job Name</th>
      <th>Status</th>
      <th>Build Time</th>
      <th>Created</th>
    </tr>
  </thead>
  <tbody>

  <!-- loop through the records -->
  <?php foreach ($records as $row): ?>
    <tr>
      <td><?= clean($row['prod_name']); ?></td>
      <td><?= clean($row['comp_name']); ?></td>
      <td><?= clean($row['build_num']); ?></td>
      <td><?= clean($row['job_name']); ?></td>
      <td><?= clean($row['status']); ?></td>
      <td><?= clean($row['duration']); ?></td>
      <td><?= clean(date("Y-m-d H:i:s", $row['created'])); ?></td>
    </tr>
  <?php endforeach; ?>
  
  </tbody>
</table>