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
        $sql = "SELECT DISTINCT status, 
                       COUNT(status) AS count,
                       FROM_UNIXTIME(created, '%Y-%m-%d') AS date
                FROM builds
                GROUP BY status, date";

        $data = DB::instance(DB_NAME)->select_rows($sql);

        $this->template->content->data = $data;

        // Display the view
        echo $this->template;
    }
}
