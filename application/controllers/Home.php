<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Main_model");
        //Do your magic here
    }

    public function index(){
        $data['title'] = "Error Link";
        $data['link'] = $this->Main_model->get_one("config", ["field" => "web admin"]);

        $this->load->view("pages/blank", $data);
    }
}

/* End of file Home.php */
