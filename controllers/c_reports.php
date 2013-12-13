<?php
class reports_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        if(!$this->user) {
            Router::redirect('/users/login');
        }
    } 


    /**
     * Pull back the build records from the database
     */
    public function index() {

        // Setup the view
        $this->template->content = View::instance('v_reports_index');
        $this->template->title   = "Build Reports";

        $this->template->content->reports = $reports;

        // Display the view
        echo $this->template;
    }


    public function statusByDate() {

    	// Setup the view
        $this->template->content = View::instance('v_reports_statusByDate');
        $this->template->title   = "Build Reports: Status by Date";

        // Get the build records - date, status and count.  Complext query needed to return
        // 0 counts for all days and all statuses if there are no coresponding records
        $sql = "SELECT 
                  allRecords.date,
                  allRecords.Name,
                  ( SELECT 
                      COUNT(statuses.status_id)
                    FROM statuses, builds, calendar
                    WHERE builds.status_id = statuses.status_id
                      AND FROM_UNIXTIME(builds.created, '%Y-%m-%d') = calendar.date
                      AND calendar.date = allRecords.date
                      AND statuses.name = allRecords.Name
                  ) as Count

                FROM 
                  ( SELECT calendar.date,
                      statuses.status_id,
                      statuses.name
                    FROM
                      calendar,
                      statuses
                    ORDER BY
                      calendar.date,
                      statuses.name  ) allRecords

                LEFT JOIN builds
                  ON builds.status_id =  allRecords.status_id

                LEFT JOIN statuses
                  ON builds.status_id = statuses.status_id

                WHERE allRecords.date BETWEEN 
                  (SELECT MIN(FROM_UNIXTIME(builds.created, '%Y-%m-%d')) FROM builds) 
                AND 
                  (SELECT MAX(FROM_UNIXTIME(builds.created, '%Y-%m-%d')) FROM builds)

                GROUP BY
                  allRecords.date,
                  allRecords.Name

                ORDER BY 
                  allRecords.date,
                  allRecords.Name";


        $data = DB::instance(DB_NAME)->select_rows($sql);

        $this->template->content->data = $data;

        // Display the view
        echo $this->template;
    }


    public function scatter() {

      // Setup the view
        $this->template->content = View::instance('v_reports_scatter');
        $this->template->title   = "Build Reports: Scatterplot";

        // Get the build records
        $sql = "SELECT FROM_UNIXTIME(created, '%Y-%m-%d') as date, status, duration 
                FROM builds;";

        $data = DB::instance(DB_NAME)->select_rows($sql);

        $this->template->content->data = $data;

        // Display the view
        echo $this->template;
    }
}
