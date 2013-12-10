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


    public function data() {

    	// Setup the view
        $this->template->content = View::instance('v_reports_data');
        $this->template->title   = "Build Reports";

        // Get the build records
        $sql = "SELECT components.name AS comp_name, 
                       products.name AS prod_name, 
                       builds.build_num, 
                       builds.status,
                       builds.created, 
                       builds.duration,
                       builds.job_name
                FROM builds
                INNER JOIN components
                    ON builds.component_id = components.component_id
                INNER JOIN products
                    ON components.product_id = products.product_id
                ORDER BY builds.created";

        $data = DB::instance(DB_NAME)->select_rows($sql);

        $this->template->content->data = $data;

        // Display the view
        echo $this->template;
    }
}