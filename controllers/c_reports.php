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

        // Get the build records
        $sql = "SELECT FROM_UNIXTIME(created, '%m/%d/%y') AS date,
                       status, 
                       COUNT(status) AS count
                FROM builds
                GROUP BY date, status
                ORDER BY date DESC";

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
