<div class="container">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <!-- New user sign up form -->
    <h3>Sign up</h3>

    <form id="form-signup" method="POST" action="/users/p_signup">
      <div class="form-group">

        <input type="text" class="form-control" name="first_name" placeholder="First Name" required><br />
        <input type="text" class="form-control" name="last_name" placeholder="Last Name" required><br />
        <input type="email" class="form-control" name="email" placeholder="Email address" required><br />
        <input type="password" class="form-control" name="password" placeholder="Password" required><br />

        <!-- Error checking -->
        <?php if(isset($errors) && isset($source)): ?>

          <?php if ($source == 'email'): ?>
            <p>&nbsp;</p>
            <div class='profile alert alert-danger'>
              Email address is already registered.
            </div>
            <br>
          <?php endif; ?>

        <?php endif; ?>

        <p>&nbsp;</p>
        <div class="col-sm-4"></div>
            <div class="col-sm-4 center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-4"></div>

      </div>
     
    </form>
  </div>
  <div class="col-md-4"></div>
</div>

<script>
  $("#form-signup").validate();
</script>