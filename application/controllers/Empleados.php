<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
        $this->load->model('empleados_model');
    }

    public function index() {
        $data['side_bar']  = $this->load->view('fragments/side_bar_fragment', $data, TRUE);
        $data['top_bar']   = $this->load->view('fragments/top_bar_fragment', $data, TRUE);
        $data['work_area'] = $this->load->view('work_area/empleados_view', $data, TRUE);
        $data['titulo']    = "Gestion Empleados | Intelo";
        $this->load->view("main_view", $data, FALSE);
        // if ($this->session->userdata('id_perfil') == 1) {
        //     $data                = array();
        //     $nombre_usuario      = $this->session->userdata('nombre_usuario');
        //     $apellido_1          = $this->session->userdata('apellido_1');
        //     $apellido_2          = $this->session->userdata('apellido_2');
        //     $email               = $this->session->userdata('email');
        //     $perfil              = $this->session->userdata('perfil');
        //     $id_perfil           = $this->session->userdata('id_perfil');
        //     $id_empresa          = $this->session->userdata('id_empresa');
        //     $data['titulo']      = $perfil;
        //     $data['u_nombre']    = $nombre_usuario . ' ' . $apellido_1 . ' ' . $apellido_2;
        //     $data['u_email']     = $email;
        //     $data['u_perfil']    = $perfil;
        //     $data['u_id_perfil'] = $id_perfil;
        //     $data['header']      = $this->load->view('header', $data, TRUE);
        //     $this->load->view('empleados_view', $data);
        // } else {
        //     redirect(base_url());
        // }
    }
    
}