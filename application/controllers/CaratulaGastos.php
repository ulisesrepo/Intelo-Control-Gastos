<?php
class CaratulaGastos extends CI_Controller{

    public function __construct() {
        parent::__construct();
       
        // $this->load->model('model_general');
         $this->load->model('model_gastos_vehiculos');
        // $this->load->model('model_gastos_viaticos');
    }

    public function index() {
        $data              = array();
        $data['side_bar']  = $this->load->view('fragments/side_bar_fragment', $data, TRUE);
        $data['top_bar']   = $this->load->view('fragments/top_bar_fragment', $data, TRUE);
        $data['work_area'] = $this->load->view('work_area/caratula_gastos_view', $data, TRUE);
        $data['titulo']    = "Caratula Gastos | Intelo";
        // $data['my_jquery'] = "tablas.js";
        $this->load->view("main_view", $data, FALSE);
    }


    public function mostrar_caratula() {
        $datos_vehiculos = $this->model_gastos_vehiculos->select_vehiculos();
        if ($datos_vehiculos != null && $datos_vehiculos != '') {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrar datos de Usuario";
            $json['response_data'] = $datos_vehiculos;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos de los Usuarios";
        }
        echo json_encode($json);
    }

}