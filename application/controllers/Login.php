<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('login_model');
        
    }

    public function acceso_usuario(Type $var = null) {
        $this->form_validation->set_rules("user", "Correo del Usuario", "trim|required|xss_clean");
        $this->form_validation->set_rules("password", "Contraseña del Usuario", "trim|required|xss_clean");
        // if ($this->form_validation->run()) {
            $usuario       = $this->input->post('user');
            $contrasena    = sha1($this->input->post('password'));
            $datos_usuario = $this->login_model->acceso_usuario($usuario);
            if (!empty($datos_usuario) && $datos_usuario != null) {
                if ($datos_usuario->estatus == 1) {
                    if ($datos_usuario->password == $contrasena) {
                        $array_session = array(
                            'id_empleados'     => $datos_usuario->id_empleados,
                            'nombre' => $datos_usuario->nombre,
                            'apellidos'     => $datos_usuario->apellidos,
                            'email'     => $datos_usuario->email,
                            'sucursal'          => $datos_usuario->sucursal,
                            "is_login"       => true,
                        );
                            console.log(array_session);
                        $this->session->set_userdata($array_session);
                        $json['response_code']  = 200;
                        $json['response_text']  = 'Bienvenido a Intelo';
                    } else {
                        $json['response_code'] = 500;
                        $json['response_text'] = 'Usuario y/o Contraseña son incorrectas';
                    }
                } else {
                    $json['response_code'] = 500;
                    $json['response_text'] = 'Este usuario ya no tiene permiso de Acceso a Aplicacion';
                }
            } else {
                $json['response_code'] = 500;
                $json['response_text'] = 'No existe el correo de este Usuario';
            }
        // } else {
        //     $json['response_code'] = 500;
        //     $json['response_text'] = 'Acceso Denegado';
        // }
        echo json_encode($json);
    }

    public function logout() {
        $array_session = array(
            'id_empleados'     => null,
            'nombre' => null,
            'apellidos'     => null,
            'email'     => null,
            'sucursal'          => null,
            "is_login"       => false,
        );

        $this->session->unset_userdata($array_session);
        $this->session->sess_destroy($array_session);
        session_cache_expire();
        redirect(base_url());
    }
}
