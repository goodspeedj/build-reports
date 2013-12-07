<!-- Display the user login form -->
<form id="form-signin" method="post" action="/users/p_login">

  <h3 class="form-signin-heading">Please sign in</h3>
  <input type="email" name="email" placeholder="Email address" required>
  <br />
  <input type="password" name="password" placeholder="Password" required>
    
  <!-- Check for bad user name / password -->
  <?php if(isset($err)): ?>

    <div class='profile alert alert-danger'>
      Login failed, please check credentials.
    </div>
    <br>

  <?php endif; ?>



  <p><a href="/users/signup">Register for account</a></p>
  <p>&nbsp;</p>
    
  <button class="btn" type="submit">Log in</button>
  
</form>

<script>
  $("#form-signin").validate();
</script>