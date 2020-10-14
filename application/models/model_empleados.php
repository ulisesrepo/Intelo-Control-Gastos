<?php

class model_empleados extends CI_Model
{

    public function insert_empleados($array_data)
    {
        $nombre               = $array_data['nombre'];
        $apellido_1           = $array_data['apellido_1'];
        $apellido_2           = $array_data['apellido_2'];
        $email                = $array_data['email'];
        $password             = $array_data['password'];
        $sql_insert_empleados = "insert into empleados values(null,'"
            . $nombre . "','"
            . $apellido_1 . "','"
            . $apellido_2 . "','"
            . $email . "','"
            . $password . "')";
        
        return $this->db->query($sql_insert_empleados);
    }

    public function existe_email($email)
    {
        $sql_consulta = "select id_empleados from empleados where email like BINARY '$email'";
        $query        = $this->db->query($sql_consulta);
        return ($query->num_rows() == 1) ? $query->row() : null;
    }

    // public function exist_email_update($email, $id_empleado) {
    //     $sql_select = "
    //         select id_empleados
    //         from Empleados
    //         where
    //             email like binary '$email'
    //              and id_empleados not in (" . $id_empleado . ")";
    //     $query = $this->db->query($sql_select);
    //     return ($query->num_rows() == 1) ? $query->row() : null;
    // }

    // public function exist_tel_update($tel_cel, $id_empleado) {
    //     $sql_select = "
    //         select id_empleados
    //         from Empleados
    //         where
    //             tel_cel like binary '$tel_cel'
    //              and id_empleados not in (" . $id_empleado . ")";
    //     $query = $this->db->query($sql_select);
    //     return ($query->num_rows() == 1) ? $query->row() : null;
    // }

    // public function update_empleado($email, $app_activa, $tel_cel, $id_empleado) {
    //     $sql_update = "
    //         update Empleados set
    //         email = '" . $email . "',
    //         app_activa = " . $app_activa . ",
    //         tel_cel = '" . $tel_cel . "'
    //         where id_empleados = " . $id_empleado;
    //     return $this->db->query($sql_update);
    // }

    // public function delete_empleado($id_empleado) {
    //     $sql_update = "
    //         update
    //             Empleados set
    //                 estatus = 0,
    //                 app_activa = 0
    //         where id_empleados = " . $id_empleado;
    //     return $this->db->query($sql_update);
    // }

    // public function delete_empleado_producto($id_empleado_producto) {
    //     $sql_update = "update Empleado_producto set estatus = 0 where id_empleado_producto = " . $id_empleado_producto;
    //     return $this->db->query($sql_update);
    // }
}
