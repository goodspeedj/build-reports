p4.go.odspeed.com
=================
Jim Goodspeed - jgoodsp@fas.harvard.edu
CSCI E-15 Project #4


The Build Tracker is an application used to track Continuous Integration software builds.  I created this application as a proof of concept for a tool that I hope to use at work.  In its current form builds can be manually added to the MySQL database through the UI, but in future form our build engine (Jenkins) will automatically write the build information to the database.  In this form the application will be a read only application.  For the purposes of this project the data is randomized dummy data generated with the createSQL.pl perl script.

There are three main sections to the application.  

============
Admin
============
This section is basic administration - editing your user profile and adding new build records.

============
Records
============
This section is a table displaying all of the build records in tabular form.  A user can page through the records, sort the records or search/filter the records.  The Data Tables (http://datatables.net/) javascript library was used for the table layout.


============
Reports
============
This section has two different reports.  The first report is a stacked area chart showing the number builds by date and by status (stable, unstable or failed).

The second report is a scatter plot showing the build date on the X axis and the build duration (time) on the Y axis.  The status of the build is encoded in the color of the dots and the code coverage percentage is encoded by the size of the dots.  Hovering over each dot will show specific information about that particular build.

Both of these reports were generated with the D3 library (http://d3js.org/).

The main goal of these reports is to show trending information over time.  Specifically I would like to know whether the builds taking longer over time, do we have less failures, is our code coverage improving?  Future enhancements would include the ability to filter the reports on a specific sub-set of data.
