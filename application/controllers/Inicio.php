<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inicio extends CI_Controller {
    public function __construct() {
        parent::__construct();
        //Do your magic here
        //$this->load->model('administrador_model');
    }
    public function index() {
        $data = array();
        $data['my_jquery'] = "login.js";
        $data['titulo']    = "Login | Intelo";
        $this->load->view('work_area/login_view',$data);
        
        
       
    }

}
