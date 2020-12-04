<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListaEmpleados extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_empleados');
        // $this->load->helper(array('form', 'url'));
        // if (!$this->session->userdata('is_login')) {
        //     redirect(base_url());
        // }
    }

    public function index()
    {
        $data              = array();
        $data['side_bar']  = $this->load->view('fragments/side_bar_fragment', $data, true);
        $data['top_bar']   = $this->load->view('fragments/top_bar_fragment', $data, true);
        $data['work_area'] = $this->load->view('work_area/lista_empleados_view', $data, true);
        $data['titulo']    = "Gestion Empleados | Intelo";
        $data['my_jquery'] = "empleados.js";
        $this->load->view("main_view", $data, false);

    }



}
