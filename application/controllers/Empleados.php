<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
        $this->load->model('empleados_model');
    }
    
}