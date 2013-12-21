<h3>Welome to the Build Tracker</h3>
<div class="left">

  <h4>Overview</h4>
    The Build Tracker is an application used to track Continuous Integration software builds.  
    I created this application as a proof of concept for a tool that I hope to use at work.  
    In its current form builds can be manually added to the MySQL database through the UI, but 
    in future form our build engine (Jenkins) will automatically write the build information 
    to the database.  For the purposes of this project the data is randomized dummy data generated 
    with the createSQL.pl perl script, located in the root of the project.

  <h4>Admin</h4>
    This section is basic administration - editing your user profile and adding new build records.
    There are two types of user in this application: normal users and administrators.  When signing
    up for an account a user defaults to the user role, but by going into the 'Edit Profile' page a 
    user can elevate their privileges to Admin.  The Admin role will allow them to add build records
    to the database.  I left the ability for users to change their own permissions for facilitating 
    testing by the graders.
  <p>&nbsp;</p>
  <p>
    For testing you can create new accounts and change your own privileges or use the following 
    accounts:
  </p>
  <ul>
    <li>Regular User: jt@harvard.edu (password = joe)</li>
    <li>Admin User: ja@harvard.edu (password = joe)</li>
  </ul>

  <h4>Records</h4>
    This section is a table displaying all of the build records in tabular form.  A user can page 
    through the records, sort the records or search/filter the records.  The Data Tables 
    (http://datatables.net/) javascript library was used for the table layout.

  <h4>Reports</h4>
    This section has two different reports.  The first report is a stacked area chart showing the 
    number builds by date and by status (stable, unstable or failed).
  <p>&nbsp;</p>
  <p>
    Both of these reports were generated with the D3 library (http://d3js.org/).
  </p>
  <p>
    The main goal of these reports is to show trending information over time.  Specifically I would 
    like to know whether the builds taking longer over time, do we have less failures, is our code 
    coverage improving?  Future enhancements would include the ability to filter the reports on a 
    specific sub-set of data.
  </p>

  <p>&nbsp;</p>
  <h4>Javascript Libraries used for this project:</h4>
  <ul>
    <li><a href="http://getbootstrap.com/">Bootstrap:</a> Layout Design</li>
    <li><a href="http://jquery.com/">jQuery:</a> Client side JavaScript Library</li>
    <li><a href="http://jqueryvalidation.org/">jQuery Validate:</a> Form Validation</li>
    <li><a href="http://d3js.org/">D3:</a> Data Driven Documents</li>
    <li><a href="http://datatables.net/">Data Tables:</a> Table Layout</li>
    <li><a href="https://github.com/DataTables/Plugins/tree/master/integration/bootstrap/3">Data Tables Bootstrap:</a> Table Layout with Bootstrap style</li>
    <li><a href="http://momentjs.com/">Moment:</a> Date Time Library</li>
  </ul>
  <p>&nbsp;</p>

<!-- Check to see if the user is already logged in -->
<?php if($user): ?>
  
  <p>Hello <?= $user->first_name;?>, welcome back.</p>

<?php else: ?> 

  <p>Please <a href="/users/login">Login</a> or <a href="/users/signup">Sign up</a></p>

<?php endif; ?>

</div>