<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?= APP_NAME ?></a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">

      <!-- 
          Determine which navbar button is highlighted 
      -->
      <?php if (($_SERVER['REQUEST_URI'] == "/index/index") || ($_SERVER['REQUEST_URI'] == "/index") || ($_SERVER['REQUEST_URI'] == "/")): ?>
        <li class="active">
      <?php else: ?>
        <li>
      <?php endif; ?>
          <a href="/">Home</a>
        </li>

      <?php if($_SERVER['REQUEST_URI'] == "/records/index"): ?>
        <li class="active">
      <?php else: ?>
        <li>
      <?php endif; ?>
          <a href="/records/index">Records</a>
        </li>

        <li class="dropdown">
          <a href="/reports/index" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/reports/statusByDate">Builds by Status</a></li>
            <li><a href="/reports/scatter">Builds by Date/Duration</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">

      <?php if($user): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $user->first_name ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/users/profile">View Profile</a></li>
            <li><a href="/users/edit">Edit Profile</a></li>
          </ul>
        </li>
      <?php endif; ?>

      <!-- Only display the admin link for admin users -->
      <?php if($user && $user->role_id == 2): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/admin/add_product">Add Product</a></li>
            <li><a href="/admin/edit_product">Edit Product</a></li>
            <li class="divider"></li>
            <li><a href="/admin/add_component">Add Component</a></li>
            <li><a href="/admin/edit_component">Edit Component</a></li>
            <li class="divider"></li>
            <li><a href="/records/add">Add Build</a></li>
          </ul>
        </li>
      <?php endif; ?>

        <li>

      <?php if(!$user): ?>
        <a href="/users/login">Login</a>
      <?php else: ?>
        <a href="/users/logout">Logout</a>
      <?php endif; ?>

        </li>
      </ul>
    </div>
  </div>
</div>