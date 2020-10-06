<?php
class Tablas extends CI_Controller{

    public function __construct() {
        parent::__construct();
       
        $this->load->model('model_general');
        $this->load->model('model_gastos_vehiculos');
        $this->load->model('model_gastos_viaticos');
        $this->load->model('model_gastos_UDN');
        $this->load->model('model_gastos_fletes');
        $this->load->model('model_gastos_servicios');
        $this->load->model('model_gastos_almacen');
        
    }

    public function index() {
        $data              = array();
        $data['side_bar']  = $this->load->view('fragments/side_bar_fragment', $data, TRUE);
        $data['top_bar']   = $this->load->view('fragments/top_bar_fragment', $data, TRUE);
        $data['work_area'] = $this->load->view('work_area/tabla_costos_view', $data, TRUE);
        $data['titulo']    = "Tablas | Intelo";
        $data['my_jquery'] = "tablas.js";
        $this->load->view("main_view", $data, FALSE);
    }

   


    public function mostrar_vehiculos() {
        $datos_vehiculos = $this->model_gastos_vehiculos->select_vehiculos();
        if ($datos_vehiculos != null && $datos_vehiculos != '') {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrando datos de la tabla";
            $json['response_data'] = $datos_vehiculos;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos en la tabla";
        }
        echo json_encode($json);
    }

    public function mostrar_viaticos() {
        $datos_viaticos = $this->model_gastos_viaticos->select_viaticos();
        if ($datos_viaticos != null && $datos_viaticos != '') {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrando datos de la tabla";
            $json['response_data'] = $datos_viaticos;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos en la tabla";
        }
        echo json_encode($json);
    }


    public function mostrar_gastosudn() {
        $datos_gastosudn = $this->model_gastos_UDN->select_gastosudn();
        if ($datos_gastosudn != null && $datos_gastosudn != '') {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrando datos de la tabla";
            $json['response_data'] = $datos_gastosudn;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos en la tabla";
        }
        echo json_encode($json);
    }

    public function mostrar_fletes() {
        $datos_fletes = $this->model_gastos_fletes->select_fletes();
        if ($datos_fletes != null && $datos_fletes != '') {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrando datos de la tabla";
            $json['response_data'] = $datos_fletes;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos en la tabla";
        }
        echo json_encode($json);
    }

    public function mostrar_servudn() {
        $datos_servudn = $this->model_gastos_servicios->select_servudn();
        if ($datos_servudn != null && $datos_servudn != '') {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrando datos de la tabla";
            $json['response_data'] = $datos_servudn;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos en la tabla";
        }
        echo json_encode($json);
    }

    public function mostrar_almacen() {
        $datos_almacen = $this->model_gastos_almacen->select_almacen();
        if ($datos_almacen != null && $datos_almacen != '') {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrando datos de la tabla";
            $json['response_data'] = $datos_almacen;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos en la tabla";
        }
        echo json_encode($json);
    }

  
}
