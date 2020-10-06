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
        if ($this->form_validation->run()) {
            $usuario       = $this->input->post('user');
            $contrasena    = sha1($this->input->post('password'));
            $datos_usuario = $this->login_model->acceso_usuario($usuario);
            if (!empty($datos_usuario) && $datos_usuario != null) {
                if ($datos_usuario->estatus == 1) {
                    if ($datos_usuario->contraseña == $contrasena) {
                        $array_session = array(
                            'id_usuario'     => $datos_usuario->id_usuario,
                            'nombre_usuario' => $datos_usuario->nombre,
                            'apellido_1'     => $datos_usuario->apellido_1,
                            'apellido_2'     => $datos_usuario->apellido_2,
                            'email'          => $datos_usuario->email,
                            'perfil'         => $datos_usuario->descripcion,
                            'id_perfil'      => $datos_usuario->id_perfil,
                            "is_login"       => true,
                        );

                        $this->session->set_userdata($array_session);
                        $json['response_code']  = 200;
                        $json['response_text']  = 'Bienvenido a Intelo';
                        $json['response_data']  = $datos_usuario->id_perfil;
                        $json['response_data1'] = $datos_usuario->descripcion;
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
                $json['response_text'] = 'No existen datos del Usuario';
            }
        } else {
            $json['response_code'] = 500;
            $json['response_text'] = 'Acceso Denegado';
        }
        echo json_encode($json);
    }

    public function logout() {
        $array_session = array(
            'id_usuario'     => null,
            'nombre_usuario' => null,
            'apellido_1'     => null,
            'apellido_2'     => null,
            'email'          => null,
            'perfil'         => null,
            "is_login"       => false,
        );

        $this->session->unset_userdata($array_session);
        $this->session->sess_destroy($array_session);
        session_cache_expire();
        redirect(base_url());
    }
}
