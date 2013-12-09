<div class="container">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <!-- Displays the user profile edit form -->
    <?php if (isset($user_details)): ?>

      <h3>Profile for <?=$user_details['first_name']?> <?=$user_details['last_name'] ?></h3>
     
      <form id="profile-edit" method="POST" action="/users/p_edit">
      
        <div class="form-group">
          <input type="hidden" value="<?=$user_details['user_id'] ?>" name="user_id">

          <label for="first_name">First Name</label>
          <input id="first_name" type="text" class="form-control" value="<?=$user_details['first_name'] ?>" name="first_name" required>
          
          <label for="last_name">Last Name</label>
          <input id="last_name" type="text" class="form-control" value="<?=$user_details['last_name'] ?>" name="last_name" required>
          
          <label for="email">Email</label>
          <input id="email" type="email" class="form-control" value="<?=$user_details['email'] ?>" name="email" required>
          
          <label for="password">Password</label>
          <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

          <label for="role_id">role</label>
          <select class="form-control" name="role_id">
          <?php if($user_details['role_id'] == 1): ?>
            <option selected value="1">User</option>
            <option value="2">Administrator</option>
          <?php else: ?>
            <option value="1">User</option>
            <option selected value="2">Administrator</option>
          <?php endif; ?>
          </select>

        </div>

        <div class="col-sm-4"></div>
        <div class="col-sm-4 center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-4"></div>
     
      </form>

    <?php else: ?>
      <h3>No user has been specified</h3>
    <?php endif; ?>

    <script>
      $("#profile-edit").validate();
    </script>
  </div>
  <div class="col-md-4"></div>
</div>
