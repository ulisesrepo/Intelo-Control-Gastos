<?php
class AnalisisGastos extends CI_Controller{

public function __construct() {
        parent::__construct();
       
        $this->load->model('model_analisis_gastos');
        $this->load->model('model_general');
        $this->load->model('model_gastos_vehiculos');
        $this->load->model('model_gastos_viaticos');
        $this->load->model('model_gastos_UDN');
        $this->load->model('model_gastos_fletes');
        $this->load->model('model_gastos_servicios');
        $this->load->model('model_gastos_almacen');
        $this->load->model('model_gastosFacturables');
        
        
    }

    public function index() {
        $data              = array();
        $data['side_bar']  = $this->load->view('fragments/side_bar_fragment', $data, TRUE);
        $data['top_bar']   = $this->load->view('fragments/top_bar_fragment', $data, TRUE);
        $data['work_area'] = $this->load->view('work_area/analisis_gastos_view', $data, TRUE);
        $data['titulo']    = "Gastos | Intelo";
        $data['my_jquery'] = "gastos.js";
        $this->load->view("main_view", $data, FALSE);
    }


    public function mostrar_analisis_gastos() {
        $datos_analisis = $this->model_analisis_gastos->select_analisis();
        if ($datos_analisis != null && $datos_analisis != '') {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrando datos de la tabla";
            $json['response_data'] = $datos_analisis;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos en la tabla";
        }
        echo json_encode($json);
    }

}