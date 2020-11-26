<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function acceso_usuario($email) {
        $consulta = "select e.id_empleados, e.nombre, e.apellidos,e.email, e.password, e.sucursal,
        e.estatus from
        empleados e 
        where  e.email like BINARY '$email'";
        $query = $this->db->query($consulta);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

}
