<!DOCTYPE html>
<html>
<head>
  <title><?php if(isset($title)) echo $title; ?></title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="/css/p4-main.css">               

  <!-- Controller Specific JS/CSS -->
  <?php if(isset($client_files_head)) echo $client_files_head; ?>
  
</head>

<body class="background-img">  
  <div id="wrap">

    <!-- 
      Show or hide the nav bar.  Based on example from Piazza post #339
      https://piazza.com/class/hktc23zr2apnf?cid=339
    -->
    <?php if(!$hide_navbar): ?>
      <?=$navbar;?>
    <?php endif; ?>

    <!-- Display main content -->
    <div class="container">
      <div class="row">
        <div class="span3"></div>
        <div class="span6 pagination-centered">
          <?php if(isset($content)) echo $content; ?>
          <?php if(isset($client_files_body)) echo $client_files_body; ?>
        </div>
        <div class="span3"></div>
      </div>
    </div>

  </div>

  <!-- Display the footer -->
  <div class="container">
    <div id="footer" class="navbar navbar-fixed-bottom">
      <span class="footer-text">Jim Goodspeed</span>
      <span class="footer-text">
        <a href="mailto:jgoodsp@fas.harvard.edu">jgoodsp@fas.harvard.edu</a>
      </span>
      <span class="footer-text">CSCI E-15 Project &#35;4</span>
      <span class="footer-text">
        <a href="https://github.com/goodspeedj/p2.go.odspeed.com">GitHub Repo</a>
      </span>
    </div>
  </div>
  
  <script src="/js/jquery-2.0.3.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/bootstrap-filestyle.min.js"></script>
  <script src="/js/jquery.validate.js"></script>
</body>
</html>