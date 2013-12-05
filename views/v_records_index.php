<table id="records">
  <thead>
    <tr>
      <th>Product</th>
      <th>Component</th>
      <th>Build Number</th>
      <th>Job Name</th>
      <th>Status</th>
      <th>Build Time</th>
    </tr>
  </thead>
  <tbody>

  <!-- loop through the records -->
  <?php foreach ($records as $row): ?>
    <tr>
      <td><?= $row['prod_name']; ?></td>
      <td><?= $row['comp_name']; ?></td>
      <td><?= $row['build_num']; ?></td>
      <td><?= $row['job_name']; ?></td>
      <td><?= $row['status']; ?></td>
      <td><?= $row['duration']; ?></td>
    </tr>
  <?php endforeach; ?>
  
  </tbody>
</table>