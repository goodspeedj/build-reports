<h4>Build Records</h4>
<table id="records" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Product</th>
      <th>Component</th>
      <th>Build Number</th>
      <th>Job Name</th>
      <th>Status</th>
      <th>Duration</th>
      <th>Coverage</th>
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
      <td>
        <?php if (clean($row['status_id']) == 1): ?>
          Stable
        <?php elseif (clean($row['status_id']) == 2): ?>
          Unstable
        <?php else: ?>
          Failed
        <?php endif; ?>
      </td>
      <td><?= clean($row['duration']); ?></td>
      <td><?= clean($row['coverage']); ?>&#37;</td>
      <td><?= clean(date("Y-m-d H:i:s", $row['created'])); ?></td>
    </tr>
  <?php endforeach; ?>
  
  </tbody>
</table>
