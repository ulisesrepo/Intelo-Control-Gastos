<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function acceso_usuario($email) {
        $consulta = "select e.id_empleados, e.nombre, e.apellidos, e.email,
            e.password, e.sucursal, u.tipo_usuario, u.id_usuario,
            e.estatus from
            empleados e 
            inner join usuarios as u on u.id_usuario = e.id_usuario 
            where  e.email like BINARY '$email'";
        $query = $this->db->query($consulta);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

}
