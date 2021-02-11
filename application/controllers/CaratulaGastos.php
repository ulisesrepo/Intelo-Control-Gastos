<?php
class CaratulaGastos extends CI_Controller
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
        $data      = array();
        $data['id_empleados'] = $this->session->userdata('id_empleados');
        $data['nombre']       = $this->session->userdata('nombre');
        $data['apellidos']    = $this->session->userdata('apellidos');
        $data['sucursal']     = $this->session->userdata('sucursal');
        $data['titulo']       = "Caratula Gastos | Intelo";
        $data['my_jquery']    = "caratula.js";
        $data['side_bar']     = $this->load->view('fragments/side_bar_fragment', $data, true);
        $data['top_bar']      = $this->load->view('fragments/top_bar_fragment', $data, true);
        $data['work_area']    = $this->load->view('work_area/caratula_gastos_view', $data, true);
        $this->load->view("main_view", $data, false);
    }

    public function cargar_gastos_empleado($fecha_comprobacion)
    {
        $id_empleado   = $this->session->userdata('id_empleados');
        $datos_empresa = $this->model_empleados->select_empresa_caratula($fecha_comprobacion, $id_empleado);
        if (!is_null($datos_empresa)) {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrar datos de Gastos";
            $json['response_data'] = $datos_empresa;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos de gastos en esta fecha";
        }
        echo json_encode($json);
    }

    public function cargar_gastos_caratula($id_general)
    {
        $json = array();
        $array = array();
        $datos_empresa_vehiculos = $this->model_empleados->select_caratula_vehiculos($id_general);
        $datos_empresa_viaticos = $this->model_empleados->select_caratula_viaticos($id_general);
        $datos_empresa_gastosudn = $this->model_empleados->select_caratula_gastosudn($id_general);
        $datos_empresa_fletes = $this->model_empleados->select_caratula_fletes($id_general);
        $datos_empresa_servudn = $this->model_empleados->select_caratula_servudn($id_general);

        if(!is_null($datos_empresa_vehiculos)){
            $array['vehiculos'] = $datos_empresa_vehiculos;
        }
        if(!is_null($datos_empresa_viaticos)){
            $array['viaticos'] = $datos_empresa_viaticos;
        }
        if(!is_null($datos_empresa_gastosudn)){
            $array['gastos_udn'] = $datos_empresa_gastosudn;
        }
        if(!is_null($datos_empresa_fletes)){
            $array['fletes'] = $datos_empresa_fletes;
        }
        if(!is_null($datos_empresa_servudn)){
            $array['servicios_udn'] = $datos_empresa_servudn;
        }
        $json['response_code'] = 200;
        $json['response_text'] = "Mostrar datos de Usuario";
        $json['response_data'] =  $array;
        echo json_encode($json);
      
    }

}
