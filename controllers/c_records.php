<?php
class records_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        if(!$this->user) {
            Router::redirect('/users/login');
        }
    } 

    public function index() {

    	// Setup the view
        $this->template->content = View::instance('v_records_index');
        $this->template->title   = "Build Records";

        // Get the build records
        $sql = "SELECT components.name, products.name, versions.version, versions.status
        		FROM versions
        		INNER JOIN components
        			ON versions.component_id = components.component_id
        		INNER JOIN products
        			ON components.product_id = products.product_id
        		ORDER BY versions.created";

        $records = DB::instance(DB_NAME)->select_rows($sql);

        $this->template->content->records = $records;

        // Display the view
        echo $this->template;
    }
}