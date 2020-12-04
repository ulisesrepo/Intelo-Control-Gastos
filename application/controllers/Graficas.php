<?php
class Graficas extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
    }

    public function index() {
        $data              = array();
        $data['side_bar']  = $this->load->view('fragments/side_bar_fragment', $data, TRUE);
        $data['top_bar']   = $this->load->view('fragments/top_bar_fragment', $data, TRUE);
        $data['work_area'] = $this->load->view('work_area/grafica_costos_view', $data, TRUE);
        $data['titulo']    = "Graficas | Intelo";
        $data['my_jquery']    = "bienvenida.js";
        $this->load->view("main_view", $data, FALSE);
    }

  
}




