<!-- New user sign up form -->
<h3>Sign up</h3>

<form id="form-signup" method="POST" action="/users/p_signup">

  <input type="text" name="first_name" placeholder="First Name" required><br />
  <input type="text" name="last_name" placeholder="Last Name" required><br />
  <input type="email" name="email" placeholder="Email address" required><br />
  <input type="password" name="password" placeholder="Password" required><br />


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
  <button class="btn" type="submit">Sign up</button>
 
</form>

<script>
  $("#form-signup").validate();
</script>