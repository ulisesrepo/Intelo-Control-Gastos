<?php
class CaratulaGastos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_empleados');
    }

    public function index()
    {
        $data      = array();
        $arraydata = array(
            'id_empleados' => '3',
            'nombre'       => 'Ulises',
            'apellidos'    => 'Maya Castillo',
            'sucursal'     => 'Acceso 3',

        );
        $this->session->set_userdata($arraydata);
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
        $datos_empresa = $this->model_empleados->select_empresa_caratula($fecha_comprobacion);
        if (!is_null($datos_empresa)) {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrar datos de Usuario";
            $json['response_data'] = $datos_empresa;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos de los Usuarios";
        }
        echo json_encode($json);
    }
    public function cargar_gastos_caratula(){
        $datos_gastos =$this->model_empleados->select_caratula_vehiculos();

    }
}
