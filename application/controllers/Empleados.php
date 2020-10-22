<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empleados extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_empleados');
        // if (!$this->session->userdata('is_login')) {
        //     redirect(base_url());
        // }
        // $this->load->model('model_empleados');

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data              = array();
        $data['side_bar']  = $this->load->view('fragments/side_bar_fragment', $data, true);
        $data['top_bar']   = $this->load->view('fragments/top_bar_fragment', $data, true);
        $data['work_area'] = $this->load->view('work_area/empleados_view', $data, true);
        $data['titulo']    = "Gestion Empleados | Intelo";
        $data['my_jquery'] = "empleados.js";
        $this->load->view("main_view", $data, false);

    }

    public function guardar_empleados()
    {

        $this->input->post('nombre');
        $this->form_validation->set_rules('apellido_1_usu', 'Email de usuario', 'trim|required|xss_clean');
        if($this->form_validation->run()){
            echo 'entro al if';
        } else {
            echo 'no entro al if';
        }
        $array_nuevo_empleado                = array();
        $array_nuevo_empleado['nombre']      = $this->input->post('nombre');
        $array_nuevo_empleado['apellidos']  = $this->input->post('apellidos');
        $array_nuevo_empleado['email']       = $this->input->post('email');
        $array_nuevo_empleado['password'] = sha1($this->input->post('password'));
        $array_nuevo_empleado['sucursal']       = $this->input->post('sucursal');

        $exist_email = $this->model_empleados->existe_email($this->input->post('email'));
        if(is_null($exist_email)){
            if ($this->model_empleados->insert_empleados($array_nuevo_empleado)) {
                $json['response_code'] = 200;
                $json['response_text'] = "Guardado con Exito";
            } else {
                $json['response_code'] = 500;
                $json['response_text'] = "No se pudo registrar el Usuario";
            }
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "El Email de este usuario ya se encuentra registrado";
        }

        echo json_encode($json);
    }

    // public function agregar_empleados($array_empleados)
    // {
    //     $nombre   = $array_empleados->nombre;
    //     $apellido_1  = $array_empleados->apellido_1;
    //     $apellido_2        = $array_empleados->apellido_2;
    //     $email  = $array_empleados->email;
    //     $array_data = array(
    //         'nombre'         => $nombre,
    //         'apellido_1'     => $apellido_1,
    //         'apellido_2'     => $apellido_2,
    //         'email'          => $email,
    //     );
    //     $id_empleados = $this->model_empleados->insert_empleados($array_data);
    //     if ($id_empleados > 0) {
    //         return $id_empleados;
    //     } else {
    //         return 0;
    //     }
    // }

}
