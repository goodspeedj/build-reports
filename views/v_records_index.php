<!-- loop through the records -->
<?php foreach ($records as $row): ?>

  <?php echo $row['products.name'] . " " . $row['components.name'] . " " . $row['versions.version'] . " " . $row['versions.status'] ?>

<?php endforeach; ?>