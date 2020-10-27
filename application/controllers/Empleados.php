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

    public function mostrar_empleados() {
        $datos_empleados = $this->model_empleados->select_empleados();
        if ($datos_empleados != null && $datos_empleados != '') {
            $json['response_code'] = 200;
            $json['response_text'] = "Mostrando datos de la tabla";
            $json['response_data'] = $datos_empleados;
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No hay datos en la tabla";
        }
        echo json_encode($json);
    }

    public function eliminar_empleado() {
        // $this->form_validation->set_rules('id_empleado', 'Id Empresa', 'trim|required|xss_clean|min_length[1]');
        if ($this->form_validation->run()) {
            $id_empleado = $this->input->post('id_empleado');
            if ($this->model_empleados->delete_empleado($id_empleado)) {
                $json['response_code'] = 200;
                $json['response_text'] = "Se elimino el Empleado con Exito";
            } else {
                $json['response_code'] = 500;
                $json['response_text'] = "No se elimino el Empleado";
            }
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = "No se pudo realiza la operación.";
        }
        echo json_encode($json);
    }


}
