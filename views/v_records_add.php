<div class="container">
  <div class="col-md-3"></div>
  <div class="col-md-6">

    <form class="form-horizontal" id="record-add" method="POST" action="/records/p_add">
      <div class="form-group">

        <label class="col-sm-3" for="component_id">Component</label>
        <div class="col-sm-9">
          <select class="form-control" name="component_id">

          <?php foreach ($components as $component): ?>
            <option><?= $component['name']; ?></option>
          <?php endforeach; ?>

          </select>
        </div>

        <br /><br />

        <label class="col-sm-3" for="build_num">Build Number</label>
        <div class="col-sm-9">
          <input class="form-control" type="text" name="build_num" placeholder="Build #" required>
        </div>

        <br /><br />

        <label class="col-sm-3" for="job_name">Job Name</label>
        <div class="col-sm-9">
          <input class="form-control" type="text" name="job_name" placeholder="Job Name" required>
        </div>

        <br /><br />

        <label class="col-sm-3" for="status">Status</label>
        <div class="col-sm-9">
          <select class="form-control" name="status">
            <option>Stable</option>
            <option>Unstable</option>
            <option>Failed</option>
          </select>
        </div>

        <br /><br />

        <label class="col-sm-3" for="duration">Duration</label>
        <div class="col-sm-9">
          <input class="form-control" type="text" name="duration" placeholder="Build Time" required>
        </div>

        <p>&nbsp;</p>

        <div class="col-sm-4"></div>
        <div class="col-sm-4 center">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
        <div class="col-sm-4"></div>
      </div>
    </form>
  </div>
  <div class="col-md-3"></div>
</div>