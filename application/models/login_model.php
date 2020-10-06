<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function acceso_usuario($email) {
        $consulta = "select u.id_usuario, u.nombre, u.apellido_1, u.apellido_2, u.email,
        u.estatus, u.contraseña from
        usuarios u 
        where  u.email like BINARY '$email'";
        $query = $this->db->query($consulta);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

}
