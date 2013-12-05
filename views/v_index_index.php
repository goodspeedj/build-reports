<h3>Welome to the Build Tracker</h3>
<div class="left">
  <p>&nbsp;</p>
  <p>Javascript Libraries used for this project include:</p>
  <ul>
    <li>Bootstrap</li>
    <li>Bootstrap File Style</li>
    <li>jQuery</li>
    <li>jQuery Validate</li>
  </ul>
  <p>&nbsp;</p>

<!-- Check to see if the user is already logged in -->
<?php if($user): ?>
  
  <p>Hello <?= $user->first_name;?>, welcome back.</p>

<?php else: ?> 

  <p>Please <a href="/users/login">Login</a> or <a href="/users/signup">Sign up</a></p>

<?php endif; ?>

</div>