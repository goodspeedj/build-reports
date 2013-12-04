<?php
class records_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        if(!$this->user) {
            Router::redirect('/users/login');
        }
    } 
}