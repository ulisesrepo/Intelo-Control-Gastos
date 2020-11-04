<?php

class model_empleados extends CI_Model
{

    public function insert_empleados($array_data)
    {
        $nombre               = $array_data['nombre'];
        $apellidos           = $array_data['apellidos'];
        $email                = $array_data['email'];
        $password             = $array_data['password'];
        $sucursal             = $array_data['sucursal'];
        $id_usuario             = $array_data['id_usuario'];
        $sql_insert_empleados = "insert into empleados values(null,'"
            . $nombre . "','"
            . $apellidos . "','"
            . $email . "','"
            . $password . "','"
            . $sucursal . "',1,'"
             . $id_usuario . "')";
        
        return $this->db->query($sql_insert_empleados);
    }

    public function select_empleados()
    {
        $sql_consulta = "
            Select
                e.id_empleados,
                e.nombre,
                e.apellidos,
                e.sucursal,
                e.estatus,
                u.id_usuario
            from
                usuarios u
                inner join empleados e on u.id_usuario = e.id_usuario";
            
        $query = $this->db->query($sql_consulta);
        return ($query->num_rows() <= 0) ? null : $query->result();
    }

    public function existe_email($email)
    {
        $sql_consulta = "select id_empleados from empleados where email like BINARY '$email'";
        $query        = $this->db->query($sql_consulta);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

    public function exist_email_update($email, $id_empleado) {
        $sql_consulta = "
            select id_empleados 
            from empleados 
            where email like BINARY '$email' and id_empleados not in ('.$id_empleado.')";
        $query        = $this->db->query($sql_consulta);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

    public function return_password($id_empleado) {
        $sql_consulta = "select password from empleados where id_empleados = '.$id_empleado'";
        $query        = $this->db->query($sql_consulta);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

    public function delete_empleado($id_empleado) {
        $sql_update = "
            update
                empleados set
                    estatus = 0
            where id_empleados = " . $id_empleado;
        return $this->db->query($sql_update);
    }

    public function activate_empleado($id_empleado) {
        $sql_update = "
            update
                empleados set
                    estatus = 1
            where id_empleados = " . $id_empleado;
        return $this->db->query($sql_update);
    }

    public function update_usuario($array) {
        $email       = $array['email'];
        $password    = $array['password'];
        $sucursal     = $array['sucursal'];
        $id_empleado      = $array['id_empleados'];
        $id_usuario  = $array['id_usuario'];

        $sql_update = "update Empleados set email = '" . $email .
            "', password = '" . $password .
            "', sucursal = '" . $sucursal .
            "', id_usuario = '" . $id_usuario .
            "' where id_empleados = '.$id_empleado'";
        return $this->db->query($sql_update);
    }
}
