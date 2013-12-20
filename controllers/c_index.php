<?php

class index_controller extends base_controller {
    
    /*-------------------------------------------------------------------------------------------------

    -------------------------------------------------------------------------------------------------*/
    public function __construct() {
        parent::__construct();
    } 
        
    /*-------------------------------------------------------------------------------------------------
    Accessed via http://localhost/index/index/
    -------------------------------------------------------------------------------------------------*/
    public function index() {

        // JavaScript includes
        $client_files_body = Array(
            "/js/jquery-2.0.3.min.js",
            "/js/bootstrap.min.js"
        );
        $this->template->client_files_body = Utils::load_client_files($client_files_body);  
        
        # Any method that loads a view will commonly start with this
        # First, set the content of the template with a view file
            $this->template->content = View::instance('v_index_index');
            
        # Now set the <title> tag
            $this->template->title = "Build Records";
                                        
        # Render the view
            echo $this->template;

    } # End of method
    
    
} # End of class
